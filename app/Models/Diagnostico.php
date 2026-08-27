<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';

    protected $fillable = [
        // Sección I. Identificación de la entidad
        'nombre_entidad',
        'orden_entidad',
        'sector_publico',
        'nombre_responsable',
        'cargo_responsable',
        'correo_responsable',
        'tiene_area_ia',
        'num_funcionarios_ti',
        'presupuesto_anual_ti',

        // Sección II. Estado actual de infraestructura
        'tiene_centro_servidores_propio',
        'usa_nube',
        'modelo_tecnologico_predominante',
        'modelo_tecnologico_otros',
        'recursos_tecnologicos_descripcion',
        'recursos_tecnologicos_archivo',
        'dispone_gpu',
        'tecnologias_gestion',
        'tecnologias_gestion_otros',
        'herramientas_bigdata',
        'herramientas_bigdata_otros',
        'arquitectura_almacenamiento',
        'arquitectura_almacenamiento_otros',
        'sistemas_analisis_ia',
        'sistemas_analisis_ia_otros',
        'mecanismos_respaldo_continuidad',
        'indicadores_rendimiento_infraestructura',
        'conoce_marco_interoperabilidad',
        'usa_lcii',
        'datos_estandarizados',
        'usa_xroad',
        'usa_scd',

        // Sección III. Proyectos de IA y Big Data
        'etapa_uso_ia',
        'politica_gobierno_datos',
        'proyectos_ia_ejecucion',
        'num_proyectos_ia',
        'tipos_aplicaciones_ia',
        'tipos_aplicaciones_ia_otros',
        'soluciones_ia_proyectadas',
        'cancelo_proyectos_ia_por_infra',
        'tiene_laboratorios_alianzas_ia',
        'participa_redes_innovacion',
        'proyectos_cofinanciados',

        // Sección IV. Necesidades futuras de infraestructura
        'volumen_datos_esperado',
        'frecuencia_procesamiento',
        'frecuencia_procesamiento_otra',
        'estimacion_capacidad_gpu',
        'estimacion_cpu_ram',
        'estimacion_almacenamiento',
        'requiere_almacenamiento_alta_velocidad',
        'requiere_bases_datos_especiales',
        'nivel_velocidad_respuesta',
        'sla_disponibilidad_esperado',
        'requiere_autoescalado',
        'crecimiento_demanda_esperado',
        'prioridad_gpu',
        'prioridad_almacenamiento',
        'prioridad_conectividad',
        'prioridad_talento',
        'prioridad_herramientas',

        // Sección V. Integración, seguridad y costos
        'necesidades_integracion',
        'requerimientos_seguridad',
        'restricciones_nube',
        'inversion_proyectada',

        // Valoración de barreras — Escala Likert 1-5
        'likert_infraestructura_suficiente',
        'likert_presupuesto_adecuado',
        'likert_contratacion_facilita',
        'likert_personal_suficiente',
        'likert_marco_regulatorio_favorece_nube',
        'likert_soberania_datos_obstaculo',
        'likert_gobernanza_datos_clara',
        'likert_conectividad_adecuada',
        'likert_ciberseguridad_suficiente',
        'likert_falta_interoperabilidad_limita',

        // Sección VII. Riesgos de seguridad de los sistemas de IA
        'conoce_lineamientos_mspi_ia',
        'analisis_riesgos_ia_especifico',
        'clasificacion_datos_mspi',

        // Sección VIII. Barreras específicas
        'barreras_tecnologicas',
        'barreras_normativas',
        'barreras_organizacionales',
        'barreras_financieras',
        'dificultades_interoperabilidad_xroad',

        // Sección IX. Casos de éxito y recomendaciones
        'elementos_prioritarios_habilitar',
        'casos_exito',
        'observaciones_adicionales',

        'autoriza_tratamiento_datos_personales',
    ];

    protected $casts = [
        'tiene_area_ia' => 'boolean',
        'autoriza_tratamiento_datos_personales' => 'boolean',
        'tecnologias_gestion' => 'array',
        'herramientas_bigdata' => 'array',
        'arquitectura_almacenamiento' => 'array',
        'sistemas_analisis_ia' => 'array',
        'tipos_aplicaciones_ia' => 'array',
        'tiene_laboratorios_alianzas_ia' => 'boolean',
        'participa_redes_innovacion' => 'boolean',
        'proyectos_cofinanciados' => 'boolean',
        'requiere_almacenamiento_alta_velocidad' => 'boolean',
        'requiere_bases_datos_especiales' => 'boolean',
        'requiere_autoescalado' => 'boolean',
    ];
}
