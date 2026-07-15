<?php

namespace App\Exports;

use App\Models\Postulacion;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostulacionesExport implements FromArray, WithHeadings
{
    protected $postulaciones;

    public function __construct($postulaciones)
    {
        $this->postulaciones = $postulaciones;
    }

    public function array(): array
    {
        $data = [];

        foreach ($this->postulaciones as $postulacion) {
            $cartaUrl = $postulacion->carta_compromiso_path
                ? route('postulaciones.carta', $postulacion)
                : 'No';

            $equipo = $postulacion->equipoMiembros
                ->map(fn ($m) => "{$m->nombre_completo} ({$m->cargo}, {$m->dependencia}, {$m->correo_institucional}, {$m->telefono})")
                ->implode('; ');

            $data[] = [
                $postulacion->id,
                // Sección 1
                $postulacion->nombre_entidad,
                $postulacion->tipo_entidad,
                $postulacion->departamento,
                $postulacion->municipio,
                $postulacion->categoria_territorial,
                $postulacion->pagina_web,
                $postulacion->enlace_pdt,
                // Sección 2
                $postulacion->nombres_apellidos,
                $postulacion->tipo_documento,
                $postulacion->numero_documento,
                $postulacion->cargo,
                $postulacion->dependencia,
                $postulacion->tipo_vinculacion,
                $postulacion->correo_institucional,
                $postulacion->correo_alternativo,
                $postulacion->telefono,
                $postulacion->es_contacto_comunicacion,
                // Sección 3 (niveles 1-4)
                $postulacion->p19_categoria_territorial,
                $postulacion->p20_dependencia_tic,
                $postulacion->p21_personal_datos_sistemas,
                $postulacion->p22_pdt_transformacion_digital,
                $postulacion->p23_estabilidad_internet,
                $postulacion->p24_velocidad_internet,
                $postulacion->p25_equipos_computo,
                $postulacion->p26_participacion_talleres_virtuales,
                $postulacion->p27_programas_previos_mintic,
                $postulacion->p28_furag_igd,
                $postulacion->p29_datos_abiertos,
                $postulacion->p30_sistemas_informacion_decisiones,
                $postulacion->p31_personal_formacion_gd,
                $postulacion->p32_firma_carta_compromiso,
                $postulacion->p33_autoridad_conoce_postulacion,
                $postulacion->p34_autoridad_compromete_participacion,
                $postulacion->p35_autoridad_garantiza_equipo_canal,
                $postulacion->p36_problematica_clara_pertinente,
                $postulacion->p37_datos_fuentes_disponibles,
                $postulacion->p38_relacion_meta_pdt,
                $postulacion->p39_beneficio_esperado_claro,
                $postulacion->puntaje_d1,
                $postulacion->puntaje_d2,
                $postulacion->puntaje_d3,
                $postulacion->puntaje_d4,
                $postulacion->puntaje_d5,
                $postulacion->puntaje_total,
                // Sección 4
                $postulacion->participo_convocatoria_previa,
                $postulacion->disponibilidad_actividades,
                $postulacion->disponibilidad_seguimiento,
                // Sección 5
                $postulacion->declara_veracidad ? 'Sí' : 'No',
                $postulacion->entiende_no_seleccion_automatica ? 'Sí' : 'No',
                $postulacion->autoriza_verificacion_info ? 'Sí' : 'No',
                $postulacion->acepta_formalizar_compromisos ? 'Sí' : 'No',
                $postulacion->autoriza_tratamiento_datos_personales ? 'Sí' : 'No',
                // Anexo
                $cartaUrl,
                $equipo,
                $postulacion->created_at,
            ];
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre Entidad',
            'Tipo Entidad',
            'Departamento',
            'Municipio',
            'Categoría Territorial',
            'Página Web',
            'Enlace PDT',
            'Nombres y Apellidos',
            'Tipo Documento',
            'Número Documento',
            'Cargo',
            'Dependencia',
            'Tipo Vinculación',
            'Correo Institucional',
            'Correo Alternativo',
            'Teléfono',
            'Es Contacto de Comunicación',
            'P19 Categoría Territorial',
            'P20 Dependencia TIC',
            'P21 Personal Datos/Sistemas',
            'P22 PDT Transformación Digital',
            'P23 Estabilidad Internet',
            'P24 Velocidad Internet',
            'P25 Equipos de Cómputo',
            'P26 Participación Talleres Virtuales',
            'P27 Programas Previos MinTIC',
            'P28 FURAG/IGD',
            'P29 Datos Abiertos',
            'P30 Sistemas de Información',
            'P31 Personal con Formación GD',
            'P32 Firma Carta Compromiso',
            'P33 Autoridad Conoce Postulación',
            'P34 Autoridad Compromete Participación',
            'P35 Autoridad Garantiza Equipo/Canal',
            'P36 Problemática Clara/Pertinente',
            'P37 Datos/Fuentes Disponibles',
            'P38 Relación con Meta PDT',
            'P39 Beneficio Esperado Claro',
            'Puntaje D1',
            'Puntaje D2',
            'Puntaje D3',
            'Puntaje D4',
            'Puntaje D5',
            'Puntaje Total',
            'Participó Convocatoria Previa',
            'Disponibilidad Actividades',
            'Disponibilidad Seguimiento',
            'Declara Veracidad',
            'Entiende No Selección Automática',
            'Autoriza Verificación Info',
            'Acepta Formalizar Compromisos',
            'Autoriza Tratamiento Datos Personales',
            'Carta de Compromiso (archivo)',
            'Equipo de Trabajo',
            'Fecha de Postulación',
        ];
    }
}
