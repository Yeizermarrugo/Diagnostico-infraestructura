<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $table = 'postulaciones';

    /**
     * Campos de la rúbrica (Sección 3) agrupados por ámbito, en el mismo
     * orden que config/instrumento.php. Fuente única de verdad para el
     * cálculo de puntajes por ámbito y el total.
     */
    public const AMBITOS = [
        'A1' => [
            'p1_lineamientos_gestion_datos_ia',
            'p2_responsable_datos_designado',
            'p3_instancia_prioriza_casos_uso',
            'p4_instrumentos_valoran_riesgos',
            'p5_persona_responsable_administracion_datos',
            'p6_documenta_ajustes_gestion_datos',
        ],
        'A2' => [
            'p7_inventario_datos_fuentes',
            'p8_procedimientos_limpieza_datos',
            'p9_datos_estandarizados_interoperables',
            'p10_gestiona_accesos_trazabilidad',
            'p11_datos_formatos_homogeneos',
            'p12_informacion_documentada_estructurada',
            'p13_actividades_basicas_organizacion_datos',
            'p14_documenta_metadatos_iniciales',
            'p15_catalogo_institucional_datos',
            'p16_datos_abiertos_organizados',
        ],
        'A3' => [
            'p17_dispone_apis',
            'p18_capacidad_almacenamiento_procesamiento',
            'p19_herramientas_analisis_visualizacion',
            'p20_mecanismos_seguimiento_sistemas_ia',
            'p21_intercambio_semantico_datos',
            'p22_mecanismos_compartir_datos_modelos',
        ],
        'A4' => [
            'p23_controles_seguridad_riesgos',
            'p24_gestiona_datos_personales_privacidad',
            'p25_controla_perfiles_accesos_monitoreo',
            'p26_medidas_continuidad_respaldo_incidentes',
        ],
        'A5' => [
            'p27_perfiles_roles_datos_tecnologia',
            'p28_funcionarios_certificados_capacitados',
            'p29_articula_trabajo_interdisciplinario',
            'p30_promueve_nuevas_iniciativas_ia',
            'p31_participa_redes_ecosistema_ia',
        ],
        'A6' => [
            'p32_piloto_ia_implementado',
            'p33_procesos_reglas_negocio_claras',
            'p34_mide_reporta_resultados_ia',
            'p35_gestiona_cambio_organizacional',
            'p36_mas_de_un_sistema_ia_funcionamiento',
            'p37_mide_efectos_sistemas_ia',
            'p38_implementa_modelos_predictivos_avanzados',
        ],
    ];

    protected $fillable = [
        // Sección 1. Identificación de la entidad postulante
        'nombre_entidad',
        'tipo_entidad',
        'departamento',
        'municipio',
        'categoria_territorial',
        'pagina_web',
        'enlace_pdt',
        // Sección 2. Datos de quien diligencia el formulario
        'nombres_apellidos',
        'tipo_documento',
        'numero_documento',
        'cargo',
        'dependencia',
        'tipo_vinculacion',
        'correo_institucional',
        'correo_alternativo',
        'telefono',
        // Sección 3. Instrumento unificado de autodiagnóstico (F1 + E6)
        'p1_lineamientos_gestion_datos_ia',
        'p2_responsable_datos_designado',
        'p3_instancia_prioriza_casos_uso',
        'p4_instrumentos_valoran_riesgos',
        'p5_persona_responsable_administracion_datos',
        'p6_documenta_ajustes_gestion_datos',
        'p7_inventario_datos_fuentes',
        'p8_procedimientos_limpieza_datos',
        'p9_datos_estandarizados_interoperables',
        'p10_gestiona_accesos_trazabilidad',
        'p11_datos_formatos_homogeneos',
        'p12_informacion_documentada_estructurada',
        'p13_actividades_basicas_organizacion_datos',
        'p14_documenta_metadatos_iniciales',
        'p15_catalogo_institucional_datos',
        'p16_datos_abiertos_organizados',
        'p17_dispone_apis',
        'p18_capacidad_almacenamiento_procesamiento',
        'p19_herramientas_analisis_visualizacion',
        'p20_mecanismos_seguimiento_sistemas_ia',
        'p21_intercambio_semantico_datos',
        'p22_mecanismos_compartir_datos_modelos',
        'p23_controles_seguridad_riesgos',
        'p24_gestiona_datos_personales_privacidad',
        'p25_controla_perfiles_accesos_monitoreo',
        'p26_medidas_continuidad_respaldo_incidentes',
        'p27_perfiles_roles_datos_tecnologia',
        'p28_funcionarios_certificados_capacitados',
        'p29_articula_trabajo_interdisciplinario',
        'p30_promueve_nuevas_iniciativas_ia',
        'p31_participa_redes_ecosistema_ia',
        'p32_piloto_ia_implementado',
        'p33_procesos_reglas_negocio_claras',
        'p34_mide_reporta_resultados_ia',
        'p35_gestiona_cambio_organizacional',
        'p36_mas_de_un_sistema_ia_funcionamiento',
        'p37_mide_efectos_sistemas_ia',
        'p38_implementa_modelos_predictivos_avanzados',
        'autoriza_tratamiento_datos_personales',
    ];

    protected $casts = [
        'autoriza_tratamiento_datos_personales' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function (Postulacion $postulacion) {
            $total = 0;

            foreach (self::AMBITOS as $ambito => $campos) {
                $subtotal = 0;
                foreach ($campos as $campo) {
                    $subtotal += (int) $postulacion->{$campo};
                }
                $postulacion->{'puntaje_' . strtolower($ambito)} = $subtotal;
                $total += $subtotal;
            }

            $postulacion->puntaje_total = $total;
        });
    }
}
