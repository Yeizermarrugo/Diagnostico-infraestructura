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
                // Sección 3 (niveles 1-5)
                $postulacion->p1_lineamientos_gestion_datos_ia,
                $postulacion->p2_responsable_datos_designado,
                $postulacion->p3_instancia_prioriza_casos_uso,
                $postulacion->p4_instrumentos_valoran_riesgos,
                $postulacion->p5_persona_responsable_administracion_datos,
                $postulacion->p6_documenta_ajustes_gestion_datos,
                $postulacion->p7_inventario_datos_fuentes,
                $postulacion->p8_procedimientos_limpieza_datos,
                $postulacion->p9_datos_estandarizados_interoperables,
                $postulacion->p10_gestiona_accesos_trazabilidad,
                $postulacion->p11_datos_formatos_homogeneos,
                $postulacion->p12_informacion_documentada_estructurada,
                $postulacion->p13_actividades_basicas_organizacion_datos,
                $postulacion->p14_documenta_metadatos_iniciales,
                $postulacion->p15_catalogo_institucional_datos,
                $postulacion->p16_datos_abiertos_organizados,
                $postulacion->p17_dispone_apis,
                $postulacion->p18_capacidad_almacenamiento_procesamiento,
                $postulacion->p19_herramientas_analisis_visualizacion,
                $postulacion->p20_mecanismos_seguimiento_sistemas_ia,
                $postulacion->p21_intercambio_semantico_datos,
                $postulacion->p22_mecanismos_compartir_datos_modelos,
                $postulacion->p23_controles_seguridad_riesgos,
                $postulacion->p24_gestiona_datos_personales_privacidad,
                $postulacion->p25_controla_perfiles_accesos_monitoreo,
                $postulacion->p26_medidas_continuidad_respaldo_incidentes,
                $postulacion->p27_perfiles_roles_datos_tecnologia,
                $postulacion->p28_funcionarios_certificados_capacitados,
                $postulacion->p29_articula_trabajo_interdisciplinario,
                $postulacion->p30_promueve_nuevas_iniciativas_ia,
                $postulacion->p31_participa_redes_ecosistema_ia,
                $postulacion->p32_piloto_ia_implementado,
                $postulacion->p33_procesos_reglas_negocio_claras,
                $postulacion->p34_mide_reporta_resultados_ia,
                $postulacion->p35_gestiona_cambio_organizacional,
                $postulacion->p36_mas_de_un_sistema_ia_funcionamiento,
                $postulacion->p37_mide_efectos_sistemas_ia,
                $postulacion->p38_implementa_modelos_predictivos_avanzados,
                $postulacion->puntaje_a1,
                $postulacion->puntaje_a2,
                $postulacion->puntaje_a3,
                $postulacion->puntaje_a4,
                $postulacion->puntaje_a5,
                $postulacion->puntaje_a6,
                $postulacion->puntaje_total,
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
            'P1 Lineamientos Gestión Datos/IA',
            'P2 Responsable de Datos Designado',
            'P3 Instancia Prioriza Casos de Uso',
            'P4 Instrumentos Valoran Riesgos',
            'P5 Persona Responsable Admin. Datos',
            'P6 Documenta Ajustes Gestión Datos',
            'P7 Inventario de Datos/Fuentes',
            'P8 Procedimientos Limpieza de Datos',
            'P9 Datos Estandarizados/Interoperables',
            'P10 Gestiona Accesos/Trazabilidad',
            'P11 Datos en Formatos Homogéneos',
            'P12 Información Documentada/Estructurada',
            'P13 Actividades Básicas Organización Datos',
            'P14 Documenta Metadatos Iniciales',
            'P15 Catálogo Institucional de Datos',
            'P16 Datos Abiertos Organizados',
            'P17 Dispone de APIs',
            'P18 Capacidad Almacenamiento/Procesamiento',
            'P19 Herramientas Análisis/Visualización',
            'P20 Mecanismos Seguimiento Sistemas IA',
            'P21 Intercambio Semántico de Datos',
            'P22 Mecanismos Compartir Datos/Modelos',
            'P23 Controles de Seguridad/Riesgos',
            'P24 Gestiona Datos Personales/Privacidad',
            'P25 Controla Perfiles/Accesos/Monitoreo',
            'P26 Medidas Continuidad/Respaldo/Incidentes',
            'P27 Perfiles/Roles Datos/Tecnología',
            'P28 Funcionarios Certificados/Capacitados',
            'P29 Articula Trabajo Interdisciplinario',
            'P30 Promueve Nuevas Iniciativas IA',
            'P31 Participa en Redes/Ecosistema IA',
            'P32 Piloto de IA Implementado',
            'P33 Procesos/Reglas de Negocio Claras',
            'P34 Mide y Reporta Resultados IA',
            'P35 Gestiona Cambio Organizacional',
            'P36 Más de un Sistema de IA en Funcionamiento',
            'P37 Mide Efectos de Sistemas de IA',
            'P38 Implementa Modelos Predictivos Avanzados',
            'Puntaje A1',
            'Puntaje A2',
            'Puntaje A3',
            'Puntaje A4',
            'Puntaje A5',
            'Puntaje A6',
            'Puntaje Total',
            'Fecha de Postulación',
        ];
    }
}
