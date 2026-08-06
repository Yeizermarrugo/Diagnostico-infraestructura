<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->id();

            // Sección 1. Identificación de la entidad postulante
            $table->string('nombre_entidad');
            $table->string('tipo_entidad');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('categoria_territorial');
            $table->string('pagina_web');
            $table->string('enlace_pdt')->nullable();

            // Sección 2. Datos de quien diligencia el formulario
            $table->string('nombres_apellidos');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('cargo');
            $table->string('dependencia');
            $table->string('tipo_vinculacion');
            $table->string('correo_institucional');
            $table->string('correo_alternativo')->nullable();
            $table->string('telefono');

            // Sección 3. Instrumento unificado de autodiagnóstico F1+E6 (escala 1-5 por pregunta)
            // A1. Dirección y gobierno institucional
            $table->unsignedTinyInteger('p1_lineamientos_gestion_datos_ia');
            $table->unsignedTinyInteger('p2_responsable_datos_designado');
            $table->unsignedTinyInteger('p3_instancia_prioriza_casos_uso');
            $table->unsignedTinyInteger('p4_instrumentos_valoran_riesgos');
            $table->unsignedTinyInteger('p5_persona_responsable_administracion_datos');
            $table->unsignedTinyInteger('p6_documenta_ajustes_gestion_datos');
            // A2. Gestión de datos
            $table->unsignedTinyInteger('p7_inventario_datos_fuentes');
            $table->unsignedTinyInteger('p8_procedimientos_limpieza_datos');
            $table->unsignedTinyInteger('p9_datos_estandarizados_interoperables');
            $table->unsignedTinyInteger('p10_gestiona_accesos_trazabilidad');
            $table->unsignedTinyInteger('p11_datos_formatos_homogeneos');
            $table->unsignedTinyInteger('p12_informacion_documentada_estructurada');
            $table->unsignedTinyInteger('p13_actividades_basicas_organizacion_datos');
            $table->unsignedTinyInteger('p14_documenta_metadatos_iniciales');
            $table->unsignedTinyInteger('p15_catalogo_institucional_datos');
            $table->unsignedTinyInteger('p16_datos_abiertos_organizados');
            // A3. Base tecnológica
            $table->unsignedTinyInteger('p17_dispone_apis');
            $table->unsignedTinyInteger('p18_capacidad_almacenamiento_procesamiento');
            $table->unsignedTinyInteger('p19_herramientas_analisis_visualizacion');
            $table->unsignedTinyInteger('p20_mecanismos_seguimiento_sistemas_ia');
            $table->unsignedTinyInteger('p21_intercambio_semantico_datos');
            $table->unsignedTinyInteger('p22_mecanismos_compartir_datos_modelos');
            // A4. Seguridad y privacidad
            $table->unsignedTinyInteger('p23_controles_seguridad_riesgos');
            $table->unsignedTinyInteger('p24_gestiona_datos_personales_privacidad');
            $table->unsignedTinyInteger('p25_controla_perfiles_accesos_monitoreo');
            $table->unsignedTinyInteger('p26_medidas_continuidad_respaldo_incidentes');
            // A5. Capacidades del equipo humano
            $table->unsignedTinyInteger('p27_perfiles_roles_datos_tecnologia');
            $table->unsignedTinyInteger('p28_funcionarios_certificados_capacitados');
            $table->unsignedTinyInteger('p29_articula_trabajo_interdisciplinario');
            $table->unsignedTinyInteger('p30_promueve_nuevas_iniciativas_ia');
            $table->unsignedTinyInteger('p31_participa_redes_ecosistema_ia');
            // A6. Procesos y valor público
            $table->unsignedTinyInteger('p32_piloto_ia_implementado');
            $table->unsignedTinyInteger('p33_procesos_reglas_negocio_claras');
            $table->unsignedTinyInteger('p34_mide_reporta_resultados_ia');
            $table->unsignedTinyInteger('p35_gestiona_cambio_organizacional');
            $table->unsignedTinyInteger('p36_mas_de_un_sistema_ia_funcionamiento');
            $table->unsignedTinyInteger('p37_mide_efectos_sistemas_ia');
            $table->unsignedTinyInteger('p38_implementa_modelos_predictivos_avanzados');

            // Puntajes calculados (persistidos para poder ordenar/filtrar en el dashboard)
            $table->unsignedTinyInteger('puntaje_a1')->nullable();
            $table->unsignedTinyInteger('puntaje_a2')->nullable();
            $table->unsignedTinyInteger('puntaje_a3')->nullable();
            $table->unsignedTinyInteger('puntaje_a4')->nullable();
            $table->unsignedTinyInteger('puntaje_a5')->nullable();
            $table->unsignedTinyInteger('puntaje_a6')->nullable();
            $table->unsignedSmallInteger('puntaje_total')->nullable();

            // Autorización de tratamiento de datos personales (Ley 1581 de 2012)
            $table->boolean('autoriza_tratamiento_datos_personales');

            $table->timestamps();

            $table->index('numero_documento');
            $table->index('departamento');
            $table->index('tipo_entidad');
            $table->index('categoria_territorial');
            $table->index('puntaje_total');
        });
    }

    public function down()
    {
        Schema::dropIfExists('postulaciones');
    }
};
