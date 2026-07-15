<?php

namespace App\Exports;


use App\Models\Inscripcion;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InscripcionesExport implements FromArray, WithHeadings
{
    protected $inscripciones;

    // El parámetro debe estar en el constructor:
    public function __construct($inscripciones)
    {
        $this->inscripciones = $inscripciones;
    }

    public function array(): array
    {
        $data = [];
        foreach ($this->inscripciones as $inscripcion) {
            $certUrl = $inscripcion->cert_laboral
                ? route('inscripciones.certificado', $inscripcion)
                : 'No';

            $data[] = [
                $inscripcion->id,
                $inscripcion->nombres,
                $inscripcion->apellidos,
                $inscripcion->tipo_documento,
                $inscripcion->numero_documento,
                $inscripcion->rango_edad,
                $inscripcion->genero,
                $inscripcion->correo_institucional,
                $inscripcion->correo_personal,
                $inscripcion->telefono,
                $inscripcion->departamento,
                $inscripcion->ciudad,
                $inscripcion->naturaleza_entidad,
                $inscripcion->nombre_entidad,
                $inscripcion->sector_administrativo,
                $inscripcion->cargo,
                $inscripcion->nivel_jerarquico,
                $inscripcion->nivel_estudios,
                $inscripcion->area_formacion,
                $inscripcion->nivel_ia,
                $inscripcion->mspi_conocimiento,
                $inscripcion->mspi_estado_implementacion,
                $inscripcion->mspi_riesgos_identificados,
                implode('; ', $inscripcion->mspi_usa_herramientas_ia ?? []),
                implode('; ', $inscripcion->mspi_procesos_uso_ia ?? []),
                $inscripcion->mspi_procesos_uso_otro,
                implode('; ', $inscripcion->mspi_riesgos_relevantes ?? []),
                $inscripcion->mspi_lineamientos_internos,
                $inscripcion->mspi_preparacion_riesgos,
                implode('; ', $inscripcion->mspi_temas_profundizar ?? []),
                $inscripcion->mspi_pregunta_abierta,
                $inscripcion->terminos ? 'Sí' : 'No',
                $certUrl,
                $inscripcion->created_at,
            ];
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombres',
            'Apellidos',
            'Tipo Documento',
            'Número Documento',
            'Rango Edad',
            'Género',
            'Correo Institucional',
            'Correo Personal',
            'Teléfono',
            'Departamento',
            'Ciudad',
            'Naturaleza Entidad',
            'Nombre Entidad',
            'Sector Administrativo',
            'Cargo',
            'Nivel Jerárquico',
            'Nivel Estudios',
            'Área Formación',
            'Nivel IA',
            'MSPI: Nivel de conocimiento',
            'MSPI: Estado de implementación',
            'MSPI: Riesgos identificados',
            'MSPI: Herramientas de IA que usa',
            'MSPI: Procesos/áreas de uso de IA',
            'MSPI: Otro proceso/área (especifique)',
            'MSPI: Riesgos más relevantes',
            'MSPI: Lineamientos internos',
            'MSPI: Nivel de preparación',
            'MSPI: Temas a profundizar',
            'MSPI: Pregunta abierta',
            'Términos aceptados',
            'Certificación Laboral (archivo)',
            'Fecha de inscripción'
        ];
    }
}
