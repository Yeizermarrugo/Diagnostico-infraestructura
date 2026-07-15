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
            $table->string('es_contacto_comunicacion');

            // Sección 3. Evaluación de Dimensiones (niveles 1-4 por pregunta)
            // D1. Categoría territorial y capacidad institucional
            $table->unsignedTinyInteger('p19_categoria_territorial');
            $table->unsignedTinyInteger('p20_dependencia_tic');
            $table->unsignedTinyInteger('p21_personal_datos_sistemas');
            $table->unsignedTinyInteger('p22_pdt_transformacion_digital');
            // D2. Conectividad y capacidad tecnológica
            $table->unsignedTinyInteger('p23_estabilidad_internet');
            $table->unsignedTinyInteger('p24_velocidad_internet');
            $table->unsignedTinyInteger('p25_equipos_computo');
            $table->unsignedTinyInteger('p26_participacion_talleres_virtuales');
            // D3. Experiencia previa en Gobierno Digital
            $table->unsignedTinyInteger('p27_programas_previos_mintic');
            $table->unsignedTinyInteger('p28_furag_igd');
            $table->unsignedTinyInteger('p29_datos_abiertos');
            $table->unsignedTinyInteger('p30_sistemas_informacion_decisiones');
            $table->unsignedTinyInteger('p31_personal_formacion_gd');
            // D4. Voluntad política y compromiso institucional y de sostenibilidad
            $table->unsignedTinyInteger('p32_firma_carta_compromiso');
            $table->unsignedTinyInteger('p33_autoridad_conoce_postulacion');
            $table->unsignedTinyInteger('p34_autoridad_compromete_participacion');
            $table->unsignedTinyInteger('p35_autoridad_garantiza_equipo_canal');
            // D5. Potencial de impacto territorial
            $table->unsignedTinyInteger('p36_problematica_clara_pertinente');
            $table->unsignedTinyInteger('p37_datos_fuentes_disponibles');
            $table->unsignedTinyInteger('p38_relacion_meta_pdt');
            $table->unsignedTinyInteger('p39_beneficio_esperado_claro');

            // Puntajes calculados (persistidos para poder ordenar/filtrar en el dashboard)
            $table->unsignedTinyInteger('puntaje_d1')->nullable();
            $table->unsignedTinyInteger('puntaje_d2')->nullable();
            $table->unsignedTinyInteger('puntaje_d3')->nullable();
            $table->unsignedTinyInteger('puntaje_d4')->nullable();
            $table->unsignedTinyInteger('puntaje_d5')->nullable();
            $table->unsignedSmallInteger('puntaje_total')->nullable();

            // Sección 4. Participación en talleres informativos y disponibilidad institucional
            $table->string('participo_convocatoria_previa');
            $table->string('disponibilidad_actividades');
            $table->string('disponibilidad_seguimiento');

            // Sección 5. Declaraciones y autorización
            $table->boolean('declara_veracidad');
            $table->boolean('entiende_no_seleccion_automatica');
            $table->boolean('autoriza_verificacion_info');
            $table->boolean('acepta_formalizar_compromisos');
            $table->boolean('autoriza_tratamiento_datos_personales');

            // Anexo. Carta de manifestación de interés y compromiso institucional
            $table->string('carta_compromiso_path');

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
