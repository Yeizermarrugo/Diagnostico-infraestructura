<?php

namespace App\Http\Controllers;

use App\Exports\InscripcionesExport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Inscripcion;
use App\Mail\InscripcionRecibida;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class InscripcionController extends Controller
{
    /**
     * Aplica los filtros de búsqueda compartidos entre search() y exportExcel().
     */
    private function applyFilters(Builder $query, Request $request): Builder
    {
        $term = $request->query('q', '');
        $departamento = $request->query('departamento');
        $naturalezaEntidad = $request->query('naturaleza_entidad');
        $nivelIa = $request->query('nivel_ia');
        $fechaInicio = $request->query('fecha_inicio');
        $fechaFin = $request->query('fecha_fin');

        if ($term !== '') {
            $query->where(function (Builder $q) use ($term) {
                $q->where('numero_documento', 'LIKE', "%{$term}%")
                    ->orWhere('nombres', 'LIKE', "%{$term}%")
                    ->orWhere('apellidos', 'LIKE', "%{$term}%")
                    ->orWhere('correo_institucional', 'LIKE', "%{$term}%")
                    ->orWhere('correo_personal', 'LIKE', "%{$term}%")
                    ->orWhere('nombre_entidad', 'LIKE', "%{$term}%");
            });
        }

        if ($departamento) {
            $query->where('departamento', $departamento);
        }

        if ($naturalezaEntidad) {
            $query->where('naturaleza_entidad', $naturalezaEntidad);
        }

        if ($nivelIa) {
            $query->where('nivel_ia', $nivelIa);
        }

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio . ' 00:00:00', $fechaFin . ' 23:59:59']);
        } elseif ($fechaInicio) {
            $query->where('created_at', '>=', $fechaInicio . ' 00:00:00');
        } elseif ($fechaFin) {
            $query->where('created_at', '<=', $fechaFin . ' 23:59:59');
        }

        return $query;
    }

    public function index()
    {
        $inscripciones = Inscripcion::orderBy('created_at', 'desc')->paginate(100);

        $stats = [
            'total' => Inscripcion::count(),
            'con_certificado' => Inscripcion::whereNotNull('cert_laboral')->count(),
            'con_correo_institucional' => Inscripcion::whereNotNull('correo_institucional')->count(),
            'entidades_distintas' => Inscripcion::whereNotNull('nombre_entidad')->distinct('nombre_entidad')->count('nombre_entidad'),
            'departamentos_distintos' => Inscripcion::whereNotNull('departamento')->distinct('departamento')->count('departamento'),
            'hoy' => Inscripcion::whereDate('created_at', today())->count(),
            'mspi_formal' => Inscripcion::where('mspi_lineamientos_internos', 'Sí, formalmente adoptados.')->count(),
        ];

        $departamentos = Inscripcion::whereNotNull('departamento')
            ->distinct()
            ->orderBy('departamento')
            ->pluck('departamento');

        $naturalezas = Inscripcion::whereNotNull('naturaleza_entidad')
            ->distinct()
            ->orderBy('naturaleza_entidad')
            ->pluck('naturaleza_entidad');

        $nivelesIa = Inscripcion::whereNotNull('nivel_ia')
            ->distinct()
            ->orderBy('nivel_ia')
            ->pluck('nivel_ia');

        return view('dashboard', compact('inscripciones', 'stats', 'departamentos', 'naturalezas', 'nivelesIa'));
    }

    public function chartData()
    {
        $porDia = Inscripcion::where('created_at', '>=', now()->subDays(30)->startOfDay())
            ->selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $porDepartamento = Inscripcion::whereNotNull('departamento')
            ->selectRaw('departamento, COUNT(*) as total')
            ->groupBy('departamento')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $porNivelIa = Inscripcion::whereNotNull('nivel_ia')
            ->selectRaw('nivel_ia, COUNT(*) as total')
            ->groupBy('nivel_ia')
            ->orderByDesc('total')
            ->get();

        $porGenero = Inscripcion::whereNotNull('genero')
            ->selectRaw('genero, COUNT(*) as total')
            ->groupBy('genero')
            ->orderByDesc('total')
            ->get();

        $porPreparacionMspi = Inscripcion::whereNotNull('mspi_preparacion_riesgos')
            ->selectRaw('mspi_preparacion_riesgos, COUNT(*) as total')
            ->groupBy('mspi_preparacion_riesgos')
            ->orderBy('mspi_preparacion_riesgos')
            ->get();

        return response()->json([
            'por_dia' => $porDia,
            'por_departamento' => $porDepartamento,
            'por_nivel_ia' => $porNivelIa,
            'por_genero' => $porGenero,
            'por_preparacion_mspi' => $porPreparacionMspi,
        ]);
    }

    public function total()
    {
        $total = Inscripcion::count();
        return response()->json(['total' => $total]);
    }

    public function descargarCertificado(Inscripcion $inscripcion)
    {
        if (!$inscripcion->cert_laboral || !Storage::disk('public')->exists($inscripcion->cert_laboral)) {
            abort(404, 'Certificado no encontrado.');
        }

        return Storage::disk('public')->download(
            $inscripcion->cert_laboral,
            'certificado-' . $inscripcion->numero_documento . '.' . pathinfo($inscripcion->cert_laboral, PATHINFO_EXTENSION)
        );
    }

    public function checkDocumento(Request $request)
    {
        $numero = preg_replace('/[^0-9]/', '', $request->query('numero_documento', ''));

        if ($numero === '') {
            return response()->json(['exists' => false]);
        }

        $existe = Inscripcion::where('numero_documento', $numero)->exists();

        return response()->json(['exists' => $existe]);
    }

    public function search(Request $request)
    {
        $query = $this->applyFilters(Inscripcion::query(), $request);

        $inscripciones = $query->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();
        return response()->json($inscripciones);
    }

    public function store(Request $request)
    {
        $dominios_basicos = [
            'gmail.com',
            'outlook.com',
            'hotmail.com',
            'yahoo.com',
            'live.com',
            'icloud.com',
        ];

        $regex_dominios = implode('|', array_map(fn($d) => preg_quote($d), $dominios_basicos));


        if (Inscripcion::count() >= 7323) {
            return redirect()->back()->with('error', 'El cupo máximo de inscripciones ha sido alcanzado.');
        }

        // Validación condicional
        request()->validate([
            // Sección 1: Información Personal
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|digits_between:5,15',
            'numero_documento_confirm' => 'required|same:numero_documento',
            'rango_edad' => 'required|string',
            'genero' => 'required|string',
            // Sección 2: Información de Contacto
            'tiene_correo' => ['required', 'in:si,no'], // No se guarda, sólo para lógica
            'correo_institucional' => [
                request()->tiene_correo === 'si' ? 'required' : 'nullable',
                'email',
                "regex:/^(?!.*@($regex_dominios)$).+$/i", // No permitir dominios básicos
                'max:255',
            ],
            'confirmar_correo_institucional' => [
                request()->tiene_correo === 'si' ? 'required' : 'nullable',
                'email',
                "same:correo_institucional",
                "regex:/^(?!.*@($regex_dominios)$).+$/i", // mismo regex para confirmar también
                'max:255',
            ],
            'correo_personal' => request()->tiene_correo === 'no' ? 'required|email|max:255' : 'nullable|email|max:255',
            'telefono' => 'required|digits_between:7,15',
            'departamento' => 'required|string',
            'ciudad' => 'required|string|max:255',
            // Sección 3: Información Laboral y Profesional
            'naturaleza_entidad' => 'required|string',
            'nombre_entidad' => 'required|string|max:255',
            'sector_administrativo' => 'required|string',
            'cargo' => 'required|string|max:255',
            'nivel_jerarquico' => 'required|string',
            // Sección 4: Perfil Académico y Motivaciones
            'nivel_estudios' => 'required|string',
            'area_formacion' => 'required|string',
            'nivel_ia' => 'required|string',
            // Sección 5: Caracterización técnica sobre MSPI, riesgos e IA
            // Paso inactivado temporalmente en el wizard (ver inscripcion.blade.php);
            // reglas relajadas a nullable para que el envío no falle sin estos campos.
            'mspi_conocimiento' => 'nullable|string',
            'mspi_estado_implementacion' => 'nullable|string',
            'mspi_riesgos_identificados' => 'nullable|string',
            'mspi_usa_herramientas_ia' => 'nullable|array',
            'mspi_usa_herramientas_ia.*' => 'string',
            'mspi_procesos_uso_ia' => 'nullable|array',
            'mspi_procesos_uso_ia.*' => 'string',
            'mspi_procesos_uso_otro' => 'nullable|string|max:255',
            'mspi_riesgos_relevantes' => 'nullable|array',
            'mspi_riesgos_relevantes.*' => 'string',
            'mspi_lineamientos_internos' => 'nullable|string',
            'mspi_preparacion_riesgos' => 'nullable|string',
            'mspi_temas_profundizar' => 'nullable|array',
            'mspi_temas_profundizar.*' => 'string',
            'mspi_pregunta_abierta' => 'nullable|string',
            // Sección 6: Certificación de Vinculación Laboral
            'cert_laboral' => request()->tiene_correo === 'no' ? 'required|file|mimes:pdf,jpg,jpeg,png|max:5120' : 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB
            // Declaración
            'terminos' => 'accepted',
        ], [
            // Sección 1: Información Personal
            'nombres.required' => 'Por favor ingresa tus nombres.',
            'nombres.string' => 'Los nombres deben ser texto.',
            'nombres.max' => 'Los nombres no deben superar 255 caracteres.',

            'apellidos.required' => 'Por favor ingresa tus apellidos.',
            'apellidos.string' => 'Los apellidos deben ser texto.',
            'apellidos.max' => 'Los apellidos no deben superar 255 caracteres.',

            'tipo_documento.required' => 'Selecciona el tipo de documento.',
            'tipo_documento.string' => 'El tipo de documento debe ser texto.',

            'numero_documento.required' => 'Ingresa el número de documento.',
            'numero_documento.digits_between' => 'El número de documento debe tener entre 5 y 15 dígitos.',

            'numero_documento_confirm.required' => 'Confirma el número de documento.',
            'numero_documento_confirm.same' => 'Los números de documento deben coincidir.',

            'rango_edad.required' => 'Selecciona tu rango de edad.',
            'rango_edad.string' => 'El rango de edad debe ser texto.',

            'genero.required' => 'Selecciona tu género.',
            'genero.string' => 'El género debe ser texto.',

            // Sección 2: Información de Contacto
            'tiene_correo.required' => 'Por favor selecciona si tienes correo institucional.',

            'correo_institucional.required' => 'Ingresa tu correo institucional.',
            'correo_institucional.email' => 'El correo institucional debe ser una dirección válida.',
            'correo_institucional.max' => 'El correo institucional no debe superar 255 caracteres.',
            'correo_institucional.regex' => 'El correo institucional no puede ser de dominios comunes como Gmail, Outlook, Hotmail, Yahoo, Live o iCloud.',

            'confirmar_correo_institucional.required' => 'Confirma tu correo institucional.',
            'confirmar_correo_institucional.same' => 'Los correos institucionales deben coincidir.',
            'confirmar_correo_institucional.email' => 'El correo institucional de confirmación debe ser una dirección válida.',
            'confirmar_correo_institucional.max' => 'El correo institucional de confirmación no debe superar 255 caracteres.',
            'confirmar_correo_institucional.regex' => 'El correo institucional de confirmación no puede ser de dominios comunes como Gmail, Outlook, Hotmail, Yahoo, Live o iCloud.',

            'correo_personal.email' => 'El correo personal debe ser una dirección válida.',
            'correo_personal.required' => 'Ingresa tu correo personal.',
            'correo_personal.max' => 'El correo personal no debe superar 255 caracteres.',

            'telefono.required' => 'Ingresa tu número de teléfono.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',

            'departamento.required' => 'Selecciona tu departamento.',
            'departamento.string' => 'El departamento debe ser texto.',

            'ciudad.required' => 'Ingresa tu ciudad.',
            'ciudad.string' => 'La ciudad debe ser texto.',
            'ciudad.max' => 'La ciudad no debe superar 255 caracteres.',

            // Sección 3: Información Laboral y Profesional
            'naturaleza_entidad.required' => 'Selecciona la naturaleza de la entidad.',
            'naturaleza_entidad.string' => 'La naturaleza de la entidad debe ser texto.',

            'nombre_entidad.required' => 'Ingresa el nombre de la entidad.',
            'nombre_entidad.string' => 'El nombre de la entidad debe ser texto.',
            'nombre_entidad.max' => 'El nombre de la entidad no debe superar 255 caracteres.',

            'sector_administrativo.required' => 'Selecciona el sector administrativo.',
            'sector_administrativo.string' => 'El sector administrativo debe ser texto.',

            'cargo.required' => 'Ingresa tu cargo.',
            'cargo.string' => 'El cargo debe ser texto.',
            'cargo.max' => 'El cargo no debe superar 255 caracteres.',

            'nivel_jerarquico.required' => 'Selecciona el nivel jerárquico.',
            'nivel_jerarquico.string' => 'El nivel jerárquico debe ser texto.',

            // Sección 4: Perfil Académico y Motivaciones
            'nivel_estudios.required' => 'Selecciona tu nivel de estudios.',
            'nivel_estudios.string' => 'El nivel de estudios debe ser texto.',

            'area_formacion.required' => 'Selecciona tu área de formación.',
            'area_formacion.string' => 'El área de formación debe ser texto.',

            'nivel_ia.required' => 'Selecciona tu nivel de conocimiento en IA.',
            'nivel_ia.string' => 'El nivel de IA debe ser texto.',

            // Sección 5: Caracterización técnica sobre MSPI, riesgos e IA
            'mspi_conocimiento.required' => 'Responde la pregunta 1 sobre tu nivel de conocimiento del MSPI.',
            'mspi_estado_implementacion.required' => 'Responde la pregunta 2 sobre el estado de implementación del MSPI.',
            'mspi_riesgos_identificados.required' => 'Responde la pregunta 3 sobre riesgos identificados.',
            'mspi_usa_herramientas_ia.required' => 'Marca al menos una opción en la pregunta 4.',
            'mspi_usa_herramientas_ia.min' => 'Marca al menos una opción en la pregunta 4.',
            'mspi_procesos_uso_ia.required' => 'Marca al menos una opción en la pregunta 5.',
            'mspi_procesos_uso_ia.min' => 'Marca al menos una opción en la pregunta 5.',
            'mspi_riesgos_relevantes.required' => 'Marca al menos una opción en la pregunta 6.',
            'mspi_riesgos_relevantes.min' => 'Marca al menos una opción en la pregunta 6.',
            'mspi_lineamientos_internos.required' => 'Responde la pregunta 7 sobre lineamientos internos.',
            'mspi_preparacion_riesgos.required' => 'Responde la pregunta 8 sobre tu nivel de preparación.',
            'mspi_temas_profundizar.required' => 'Marca al menos una opción en la pregunta 9.',
            'mspi_temas_profundizar.min' => 'Marca al menos una opción en la pregunta 9.',

            // Sección 6: Certificación de Vinculación Laboral
            'cert_laboral.required' => 'Adjunta la certificación laboral.',
            'cert_laboral.file' => 'La certificación laboral debe ser un archivo.',
            'cert_laboral.mimes' => 'El archivo debe ser PDF, JPG, JPEG o PNG.',
            'cert_laboral.max' => 'El archivo debe ser menor a 5MB.',

            // Declaración
            'terminos.accepted' => 'Debes aceptar los términos y política de tratamiento de datos.',
        ]);

        // --- SANITIZACIÓN DE DATOS ---
        $datos = [
            'nombres' => strip_tags(trim(request()->nombres)),
            'apellidos' => strip_tags(trim(request()->apellidos)),
            'tipo_documento' => strip_tags(trim(request()->tipo_documento)),
            'numero_documento' => preg_replace('/[^0-9]/', '', request()->numero_documento),
            'rango_edad' => strip_tags(trim(request()->rango_edad)),
            'genero' => strip_tags(trim(request()->genero)),
            'correo_institucional' => request()->tiene_correo === 'si'
                ? strtolower(strip_tags(trim(request()->correo_institucional)))
                : null,
            'correo_personal' => request()->correo_personal
                ? strtolower(strip_tags(trim(request()->correo_personal)))
                : null,
            'telefono' => preg_replace('/[^0-9]/', '', request()->telefono),
            'departamento' => strip_tags(trim(request()->departamento)),
            'ciudad' => strip_tags(trim(request()->ciudad)),
            'naturaleza_entidad' => strip_tags(trim(request()->naturaleza_entidad)),
            'nombre_entidad' => strip_tags(trim(request()->nombre_entidad)),
            'sector_administrativo' => strip_tags(trim(request()->sector_administrativo)),
            'cargo' => strip_tags(trim(request()->cargo)),
            'nivel_jerarquico' => strip_tags(trim(request()->nivel_jerarquico)),
            'nivel_estudios' => strip_tags(trim(request()->nivel_estudios)),
            'area_formacion' => strip_tags(trim(request()->area_formacion)),
            'nivel_ia' => strip_tags(trim(request()->nivel_ia)),
            'mspi_conocimiento' => strip_tags(trim(request()->mspi_conocimiento ?? '')) ?: null,
            'mspi_estado_implementacion' => strip_tags(trim(request()->mspi_estado_implementacion ?? '')) ?: null,
            'mspi_riesgos_identificados' => strip_tags(trim(request()->mspi_riesgos_identificados ?? '')) ?: null,
            'mspi_usa_herramientas_ia' => request()->mspi_usa_herramientas_ia ?? null,
            'mspi_procesos_uso_ia' => request()->mspi_procesos_uso_ia ?? null,
            'mspi_procesos_uso_otro' => strip_tags(trim(request()->mspi_procesos_uso_otro ?? '')) ?: null,
            'mspi_riesgos_relevantes' => request()->mspi_riesgos_relevantes ?? null,
            'mspi_lineamientos_internos' => strip_tags(trim(request()->mspi_lineamientos_internos ?? '')) ?: null,
            'mspi_preparacion_riesgos' => strip_tags(trim(request()->mspi_preparacion_riesgos ?? '')) ?: null,
            'mspi_temas_profundizar' => request()->mspi_temas_profundizar ?? null,
            'mspi_pregunta_abierta' => strip_tags(trim(request()->mspi_pregunta_abierta ?? '')) ?: null,
            'cert_laboral' => null, // Se asigna abajo si hay archivo
            'terminos' => true,
        ];

        // Validación adicional: verificar si ya existe inscripción con el mismo número de documento Y correo institucional (solo si tiene correo)
        if (request()->tiene_correo === 'si') {
            $usuarioExistente = Inscripcion::where('numero_documento', $datos['numero_documento'])
                ->where('correo_institucional', $datos['correo_institucional'])
                ->first();

            if ($usuarioExistente) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'numero_documento' => 'Ya existe una inscripción con este número de documento',
                        'correo_institucional' => 'Ya existe una inscripción con este correo institucional.'
                    ]);
            }
        }

        // Guardar archivo
        if (request()->hasFile('cert_laboral')) {
            $datos['cert_laboral'] = request()->file('cert_laboral')->store('certificados', 'public');
        }

        try {
            // Guardar datos usando Eloquent
            $inscripcion = new Inscripcion();
            $inscripcion->fill($datos);
            Log::info('Datos recibidos para guardar:', $datos);
            $inscripcion->save();
        } catch (\Exception $e) {
            Log::error('Error al guardar inscripción: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect('/')->with('error', 'Hubo un problema al guardar la inscripción. Intenta nuevamente.');
        }

        try {
            // Solo enviar el correo si tiene correo institucional
            if (request()->tiene_correo === 'si' && $datos['correo_institucional']) {
                Mail::to($datos['correo_institucional'])
                    ->send(new InscripcionRecibida($inscripcion));
            } else if ($datos['correo_personal']) {
                Mail::to($datos['correo_personal'])
                    ->send(new InscripcionRecibida($inscripcion));
            }
        } catch (\Exception $e) {
            // El registro ya se guardó; solo se pierde el correo de confirmación.
            Log::error('Error al enviar correo de confirmación de inscripción: ' . $e->getMessage());
        }

        return redirect('/')->with('success', '¡Inscripción enviada correctamente!');
    }


    public function exportExcel(Request $request)
    {
        ini_set('memory_limit', '512M');

        $query = $this->applyFilters(Inscripcion::query(), $request);

        $inscripciones = $query->orderBy('created_at', 'desc')->get();
        $fecha = now()->format('Ymd_His');
        return Excel::download(new InscripcionesExport($inscripciones), "inscripciones_{$fecha}.xlsx");
    }
}
