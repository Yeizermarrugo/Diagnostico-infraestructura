<?php

namespace App\Http\Controllers;

use App\Exports\PostulacionesExport;
use App\Http\Requests\StorePostulacionRequest;
use App\Mail\PostulacionRecibida;
use App\Models\Postulacion;
use App\Models\PostulacionEquipoMiembro;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PostulacionController extends Controller
{
    /**
     * Aplica los filtros de búsqueda compartidos entre search() y exportExcel().
     */
    private function applyFilters(Builder $query, Request $request): Builder
    {
        $term = $request->query('q', '');
        $departamento = $request->query('departamento');
        $tipoEntidad = $request->query('tipo_entidad');
        $categoriaTerritorial = $request->query('categoria_territorial');
        $puntajeMin = $request->query('puntaje_min');
        $puntajeMax = $request->query('puntaje_max');
        $fechaInicio = $request->query('fecha_inicio');
        $fechaFin = $request->query('fecha_fin');

        if ($term !== '') {
            $query->where(function (Builder $q) use ($term) {
                $q->where('nombre_entidad', 'LIKE', "%{$term}%")
                    ->orWhere('nombres_apellidos', 'LIKE', "%{$term}%")
                    ->orWhere('numero_documento', 'LIKE', "%{$term}%")
                    ->orWhere('correo_institucional', 'LIKE', "%{$term}%");
            });
        }

        if ($departamento) {
            $query->where('departamento', $departamento);
        }

        if ($tipoEntidad) {
            $query->where('tipo_entidad', $tipoEntidad);
        }

        if ($categoriaTerritorial) {
            $query->where('categoria_territorial', $categoriaTerritorial);
        }

        if ($puntajeMin !== null && $puntajeMin !== '') {
            $query->where('puntaje_total', '>=', (int) $puntajeMin);
        }

        if ($puntajeMax !== null && $puntajeMax !== '') {
            $query->where('puntaje_total', '<=', (int) $puntajeMax);
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
        $postulaciones = Postulacion::orderBy('created_at', 'desc')->paginate(100);

        $stats = [
            'total' => Postulacion::count(),
            'con_carta' => Postulacion::whereNotNull('carta_compromiso_path')->count(),
            'promedio_puntaje' => (float) Postulacion::avg('puntaje_total'),
            'hoy' => Postulacion::whereDate('created_at', today())->count(),
            'entidades_prioritarias' => Postulacion::where('p19_categoria_territorial', 4)->count(),
            'entidades_distintas' => Postulacion::distinct('nombre_entidad')->count('nombre_entidad'),
        ];

        $departamentos = Postulacion::distinct()->orderBy('departamento')->pluck('departamento');
        $tiposEntidad = Postulacion::distinct()->orderBy('tipo_entidad')->pluck('tipo_entidad');
        $categoriasTerritoriales = Postulacion::distinct()->orderBy('categoria_territorial')->pluck('categoria_territorial');

        return view('dashboard', compact('postulaciones', 'stats', 'departamentos', 'tiposEntidad', 'categoriasTerritoriales'));
    }

    public function chartData()
    {
        $porDia = Postulacion::where('created_at', '>=', now()->subDays(30)->startOfDay())
            ->selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $porDepartamento = Postulacion::selectRaw('departamento, COUNT(*) as total')
            ->groupBy('departamento')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $porTipoEntidad = Postulacion::selectRaw('tipo_entidad, COUNT(*) as total')
            ->groupBy('tipo_entidad')
            ->orderByDesc('total')
            ->get();

        $porCategoriaTerritorial = Postulacion::selectRaw('categoria_territorial, COUNT(*) as total')
            ->groupBy('categoria_territorial')
            ->orderBy('categoria_territorial')
            ->get();

        $histogramaPuntaje = Postulacion::selectRaw(
            "CASE
                WHEN puntaje_total <= 21 THEN '0-21'
                WHEN puntaje_total <= 42 THEN '22-42'
                WHEN puntaje_total <= 63 THEN '43-63'
                ELSE '64-84'
            END as rango, COUNT(*) as total"
        )
            ->groupBy('rango')
            ->orderBy('rango')
            ->get();

        $promedioPorDepartamento = Postulacion::selectRaw('departamento, ROUND(AVG(puntaje_total), 1) as promedio, COUNT(*) as total')
            ->groupBy('departamento')
            ->orderByDesc('promedio')
            ->limit(10)
            ->get();

        return response()->json([
            'por_dia' => $porDia,
            'por_departamento' => $porDepartamento,
            'por_tipo_entidad' => $porTipoEntidad,
            'por_categoria_territorial' => $porCategoriaTerritorial,
            'histograma_puntaje' => $histogramaPuntaje,
            'promedio_por_departamento' => $promedioPorDepartamento,
        ]);
    }

    public function descargarCarta(Postulacion $postulacion)
    {
        if (!$postulacion->carta_compromiso_path || !Storage::disk('public')->exists($postulacion->carta_compromiso_path)) {
            abort(404, 'Carta de compromiso no encontrada.');
        }

        return Storage::disk('public')->download(
            $postulacion->carta_compromiso_path,
            'carta-compromiso-' . $postulacion->numero_documento . '.pdf'
        );
    }

    public function checkDocumento(Request $request)
    {
        $numero = preg_replace('/[^0-9]/', '', $request->query('numero_documento', ''));
        $entidad = trim((string) $request->query('nombre_entidad', ''));

        $existe = false;

        if ($numero !== '') {
            $existe = Postulacion::where('numero_documento', $numero)->exists();
        }

        if (!$existe && $entidad !== '') {
            $existe = Postulacion::where('nombre_entidad', $entidad)->exists();
        }

        return response()->json(['exists' => $existe]);
    }

    public function search(Request $request)
    {
        $query = $this->applyFilters(Postulacion::query(), $request);

        $postulaciones = $query->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();

        return response()->json($postulaciones);
    }

    public function store(StorePostulacionRequest $request)
    {
        $datos = $request->validated();
        $equipo = $datos['equipo'];
        unset($datos['equipo'], $datos['carta_compromiso']);

        $duplicada = Postulacion::where('nombre_entidad', $datos['nombre_entidad'])
            ->orWhere('numero_documento', $datos['numero_documento'])
            ->first();

        if ($duplicada) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'nombre_entidad' => 'Ya existe una postulación registrada para esta entidad o este número de documento.',
                ]);
        }

        try {
            $postulacion = DB::transaction(function () use ($request, $datos, $equipo) {
                $datos['carta_compromiso_path'] = $request->file('carta_compromiso')->store('cartas_compromiso', 'public');

                $postulacion = Postulacion::create($datos);

                foreach (array_values($equipo) as $index => $miembro) {
                    if (!filled($miembro['nombre_completo'] ?? null)) {
                        continue;
                    }

                    PostulacionEquipoMiembro::create([
                        'postulacion_id' => $postulacion->id,
                        'orden' => $index + 1,
                        'nombre_completo' => $miembro['nombre_completo'],
                        'cargo' => $miembro['cargo'],
                        'dependencia' => $miembro['dependencia'],
                        'correo_institucional' => strtolower(trim($miembro['correo_institucional'])),
                        'telefono' => $miembro['telefono'],
                    ]);
                }

                return $postulacion;
            });
        } catch (\Exception $e) {
            Log::error('Error al guardar postulación: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect('/')->with('error', 'Hubo un problema al guardar la postulación. Intenta nuevamente.');
        }

        try {
            Mail::to($postulacion->correo_institucional)->send(new PostulacionRecibida($postulacion));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de confirmación de postulación: ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Gracias por diligenciar el Formulario de Información Complementaria para la Selección de Entidades Beneficiarias del Proyecto IA para el Estado. La información registrada será revisada por el equipo del proyecto como parte del proceso de evaluación y selección. Recuerde que el diligenciamiento de este formulario no implica la selección automática de la entidad como beneficiaria. Una vez finalizada la etapa de revisión, se informarán los resultados y pasos a seguir a través de los canales oficiales del proyecto.');
    }

    public function exportExcel(Request $request)
    {
        ini_set('memory_limit', '512M');

        $query = $this->applyFilters(Postulacion::with('equipoMiembros'), $request);

        $postulaciones = $query->orderBy('created_at', 'desc')->get();
        $fecha = now()->format('Ymd_His');

        return Excel::download(new PostulacionesExport($postulaciones), "postulaciones_{$fecha}.xlsx");
    }
}
