<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();

            // Sección I. Identificación de la entidad (P1-7)
            $table->string('nombre_entidad');
            $table->string('orden_entidad');
            $table->string('sector_publico');
            $table->string('nombre_responsable');
            $table->string('cargo_responsable');
            $table->boolean('tiene_area_ia');
            $table->string('num_funcionarios_ti');
            $table->string('presupuesto_anual_ti');

            // Sección II. Estado actual de infraestructura (P8-23)
            $table->string('tiene_centro_servidores_propio');
            $table->string('usa_nube');
            $table->string('modelo_tecnologico_predominante');
            $table->string('modelo_tecnologico_otros')->nullable();
            $table->text('recursos_tecnologicos_descripcion');
            $table->string('recursos_tecnologicos_archivo')->nullable();
            $table->string('dispone_gpu');
            $table->json('tecnologias_gestion');
            $table->string('tecnologias_gestion_otros')->nullable();
            $table->json('herramientas_bigdata');
            $table->string('herramientas_bigdata_otros')->nullable();
            $table->json('arquitectura_almacenamiento');
            $table->string('arquitectura_almacenamiento_otros')->nullable();
            $table->json('sistemas_analisis_ia');
            $table->string('sistemas_analisis_ia_otros')->nullable();
            $table->text('mecanismos_respaldo_continuidad');
            $table->text('indicadores_rendimiento_infraestructura');
            $table->string('conoce_marco_interoperabilidad');
            $table->string('usa_lcii');
            $table->string('datos_estandarizados');
            $table->string('usa_xroad');
            $table->string('usa_scd');

            // Sección III. Proyectos de IA y Big Data (P24-33)
            $table->string('etapa_uso_ia');
            $table->string('politica_gobierno_datos');
            $table->string('proyectos_ia_ejecucion');
            $table->string('num_proyectos_ia');
            $table->json('tipos_aplicaciones_ia');
            $table->string('tipos_aplicaciones_ia_otros')->nullable();
            $table->text('soluciones_ia_proyectadas');
            $table->string('cancelo_proyectos_ia_por_infra');
            $table->boolean('tiene_laboratorios_alianzas_ia');
            $table->boolean('participa_redes_innovacion');
            $table->boolean('proyectos_cofinanciados');

            // Sección IV. Necesidades futuras de infraestructura (P34-45)
            $table->text('volumen_datos_esperado');
            $table->string('frecuencia_procesamiento');
            $table->string('frecuencia_procesamiento_otra')->nullable();
            $table->text('estimacion_capacidad_gpu');
            $table->text('estimacion_cpu_ram');
            $table->text('estimacion_almacenamiento');
            $table->boolean('requiere_almacenamiento_alta_velocidad');
            $table->boolean('requiere_bases_datos_especiales');
            $table->text('nivel_velocidad_respuesta');
            $table->string('sla_disponibilidad_esperado');
            $table->boolean('requiere_autoescalado');
            $table->string('crecimiento_demanda_esperado');
            $table->unsignedTinyInteger('prioridad_gpu');
            $table->unsignedTinyInteger('prioridad_almacenamiento');
            $table->unsignedTinyInteger('prioridad_conectividad');
            $table->unsignedTinyInteger('prioridad_talento');
            $table->unsignedTinyInteger('prioridad_herramientas');

            // Sección V. Integración, seguridad y costos (P46-49)
            $table->text('necesidades_integracion');
            $table->text('requerimientos_seguridad');
            $table->text('restricciones_nube');
            $table->text('inversion_proyectada');

            // Valoración de barreras — Escala Likert 1-5 (P50-59)
            $table->unsignedTinyInteger('likert_infraestructura_suficiente');
            $table->unsignedTinyInteger('likert_presupuesto_adecuado');
            $table->unsignedTinyInteger('likert_contratacion_facilita');
            $table->unsignedTinyInteger('likert_personal_suficiente');
            $table->unsignedTinyInteger('likert_marco_regulatorio_favorece_nube');
            $table->unsignedTinyInteger('likert_soberania_datos_obstaculo');
            $table->unsignedTinyInteger('likert_gobernanza_datos_clara');
            $table->unsignedTinyInteger('likert_conectividad_adecuada');
            $table->unsignedTinyInteger('likert_ciberseguridad_suficiente');
            $table->unsignedTinyInteger('likert_falta_interoperabilidad_limita');

            // Sección VII. Riesgos de seguridad de los sistemas de IA (P60-62)
            $table->string('conoce_lineamientos_mspi_ia');
            $table->string('analisis_riesgos_ia_especifico');
            $table->string('clasificacion_datos_mspi');

            // Sección VIII. Barreras específicas (P63-67)
            $table->text('barreras_tecnologicas');
            $table->text('barreras_normativas');
            $table->text('barreras_organizacionales');
            $table->text('barreras_financieras');
            $table->text('dificultades_interoperabilidad_xroad');

            // Sección IX. Casos de éxito y recomendaciones (P68-70)
            $table->text('elementos_prioritarios_habilitar');
            $table->text('casos_exito');
            $table->text('observaciones_adicionales');

            // Autorización de tratamiento de datos personales (Ley 1581 de 2012)
            $table->boolean('autoriza_tratamiento_datos_personales');

            $table->timestamps();

            $table->index('nombre_entidad');
            $table->index('orden_entidad');
            $table->index('sector_publico');
            $table->index('etapa_uso_ia');
        });
    }

    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
};
