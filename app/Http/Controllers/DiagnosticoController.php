<?php

namespace App\Http\Controllers;

use App\Exports\DiagnosticosExport;
use App\Http\Requests\StoreDiagnosticoRequest;
use App\Mail\DiagnosticoRecibido;
use App\Models\Diagnostico;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DiagnosticoController extends Controller
{
    /**
     * Aplica los filtros de búsqueda compartidos entre search() y exportExcel().
     */
    private function applyFilters(Builder $query, Request $request): Builder
    {
        $term = $request->query('q', '');
        $ordenEntidad = $request->query('orden_entidad');
        $sectorPublico = $request->query('sector_publico');
        $etapaIa = $request->query('etapa_uso_ia');
        $fechaInicio = $request->query('fecha_inicio');
        $fechaFin = $request->query('fecha_fin');

        if ($term !== '') {
            $query->where(function (Builder $q) use ($term) {
                $q->where('nombre_entidad', 'LIKE', "%{$term}%")
                    ->orWhere('nombre_responsable', 'LIKE', "%{$term}%")
                    ->orWhere('cargo_responsable', 'LIKE', "%{$term}%");
            });
        }

        if ($ordenEntidad) {
            $query->where('orden_entidad', $ordenEntidad);
        }

        if ($sectorPublico) {
            $query->where('sector_publico', $sectorPublico);
        }

        if ($etapaIa) {
            $query->where('etapa_uso_ia', $etapaIa);
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
        $diagnosticos = Diagnostico::orderBy('created_at', 'desc')->paginate(100);

        $stats = [
            'total' => Diagnostico::count(),
            'entidades_distintas' => Diagnostico::distinct('nombre_entidad')->count('nombre_entidad'),
            'hoy' => Diagnostico::whereDate('created_at', today())->count(),
            'con_area_ia' => Diagnostico::where('tiene_area_ia', true)->count(),
            'con_proyectos_produccion' => Diagnostico::where('proyectos_ia_ejecucion', 'Sí, en producción')->count(),
        ];

        $ordenesEntidad = Diagnostico::distinct()->orderBy('orden_entidad')->pluck('orden_entidad');
        $sectoresPublicos = Diagnostico::distinct()->orderBy('sector_publico')->pluck('sector_publico');
        $etapasIa = Diagnostico::distinct()->orderBy('etapa_uso_ia')->pluck('etapa_uso_ia');

        return view('dashboard', compact('diagnosticos', 'stats', 'ordenesEntidad', 'sectoresPublicos', 'etapasIa'));
    }

    public function chartData()
    {
        $porDia = Diagnostico::where('created_at', '>=', now()->subDays(30)->startOfDay())
            ->selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        $porOrdenEntidad = Diagnostico::selectRaw('orden_entidad, COUNT(*) as total')
            ->groupBy('orden_entidad')
            ->orderByDesc('total')
            ->get();

        $porSectorPublico = Diagnostico::selectRaw('sector_publico, COUNT(*) as total')
            ->groupBy('sector_publico')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $porEtapaIa = Diagnostico::selectRaw('etapa_uso_ia, COUNT(*) as total')
            ->groupBy('etapa_uso_ia')
            ->orderBy('etapa_uso_ia')
            ->get();

        $porModeloTecnologico = Diagnostico::selectRaw('modelo_tecnologico_predominante, COUNT(*) as total')
            ->groupBy('modelo_tecnologico_predominante')
            ->orderByDesc('total')
            ->get();

        $likertCampos = array_column(config('diagnostico.likert'), 'campo');
        $selectPromedios = implode(', ', array_map(fn ($c) => "ROUND(AVG({$c}), 2) as {$c}", $likertCampos));
        $promediosLikert = $likertCampos ? Diagnostico::selectRaw($selectPromedios)->first() : null;

        $promedioLikert = collect(config('diagnostico.likert'))->map(fn ($afirmacion) => [
            'campo' => $afirmacion['campo'],
            'texto' => $afirmacion['texto'],
            'promedio' => $promediosLikert ? (float) $promediosLikert->{$afirmacion['campo']} : 0,
        ]);

        return response()->json([
            'por_dia' => $porDia,
            'por_orden_entidad' => $porOrdenEntidad,
            'por_sector_publico' => $porSectorPublico,
            'por_etapa_ia' => $porEtapaIa,
            'por_modelo_tecnologico' => $porModeloTecnologico,
            'promedio_likert' => $promedioLikert,
        ]);
    }

    public function checkEntidad(Request $request)
    {
        $entidad = trim((string) $request->query('nombre_entidad', ''));

        $existe = $entidad !== '' && Diagnostico::where('nombre_entidad', $entidad)->exists();

        return response()->json(['exists' => $existe]);
    }

    public function search(Request $request)
    {
        $query = $this->applyFilters(Diagnostico::query(), $request);

        $diagnosticos = $query->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();

        return response()->json($diagnosticos);
    }

    public function store(StoreDiagnosticoRequest $request)
    {
        $datos = $request->validated();

        $duplicado = Diagnostico::where('nombre_entidad', $datos['nombre_entidad'])->first();

        if ($duplicado) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'nombre_entidad' => 'Ya existe un diagnóstico registrado para esta entidad.',
                ]);
        }

        if ($request->hasFile('recursos_tecnologicos_archivo')) {
            $datos['recursos_tecnologicos_archivo'] = $request->file('recursos_tecnologicos_archivo')
                ->store('diagnostico_archivos', 'public');
        } else {
            unset($datos['recursos_tecnologicos_archivo']);
        }

        try {
            $diagnostico = DB::transaction(fn () => Diagnostico::create($datos));
        } catch (\Exception $e) {
            Log::error('Error al guardar diagnóstico: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return redirect('/')->with('error', 'Hubo un problema al guardar el diagnóstico. Intenta nuevamente.');
        }

        try {
            $mail = Mail::to($diagnostico->correo_responsable);

            if ($admin = env('MAIL_ADMIN_ADDRESS')) {
                $mail->cc($admin);
            }

            $mail->send(new DiagnosticoRecibido($diagnostico));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo de confirmación de diagnóstico: ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Gracias por diligenciar el Formulario de Diagnóstico de Infraestructura Computacional en Inteligencia Artificial y Big Data. La información registrada permitirá dimensionar la demanda actual y futura de infraestructura, e identificar las necesidades específicas de su entidad dentro del Proyecto IA para el Estado.');
    }

    public function descargarArchivo(Diagnostico $diagnostico): StreamedResponse
    {
        abort_if(!$diagnostico->recursos_tecnologicos_archivo, 404);
        abort_if(!Storage::disk('public')->exists($diagnostico->recursos_tecnologicos_archivo), 404);

        return Storage::disk('public')->download($diagnostico->recursos_tecnologicos_archivo);
    }

    public function exportExcel(Request $request)
    {
        ini_set('memory_limit', '512M');

        $query = $this->applyFilters(Diagnostico::query(), $request);

        $diagnosticos = $query->orderBy('created_at', 'desc')->get();
        $fecha = now()->format('Ymd_His');

        return Excel::download(new DiagnosticosExport($diagnosticos), "diagnosticos_{$fecha}.xlsx");
    }
}
