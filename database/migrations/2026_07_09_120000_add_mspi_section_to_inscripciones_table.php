<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->string('mspi_conocimiento')->nullable()->after('terminos');
            $table->string('mspi_estado_implementacion')->nullable()->after('mspi_conocimiento');
            $table->string('mspi_riesgos_identificados')->nullable()->after('mspi_estado_implementacion');
            $table->json('mspi_usa_herramientas_ia')->nullable()->after('mspi_riesgos_identificados');
            $table->json('mspi_procesos_uso_ia')->nullable()->after('mspi_usa_herramientas_ia');
            $table->string('mspi_procesos_uso_otro')->nullable()->after('mspi_procesos_uso_ia');
            $table->json('mspi_riesgos_relevantes')->nullable()->after('mspi_procesos_uso_otro');
            $table->string('mspi_lineamientos_internos')->nullable()->after('mspi_riesgos_relevantes');
            $table->string('mspi_preparacion_riesgos')->nullable()->after('mspi_lineamientos_internos');
            $table->json('mspi_temas_profundizar')->nullable()->after('mspi_preparacion_riesgos');
            $table->text('mspi_pregunta_abierta')->nullable()->after('mspi_temas_profundizar');
        });
    }

    public function down()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropColumn([
                'mspi_conocimiento',
                'mspi_estado_implementacion',
                'mspi_riesgos_identificados',
                'mspi_usa_herramientas_ia',
                'mspi_procesos_uso_ia',
                'mspi_procesos_uso_otro',
                'mspi_riesgos_relevantes',
                'mspi_lineamientos_internos',
                'mspi_preparacion_riesgos',
                'mspi_temas_profundizar',
                'mspi_pregunta_abierta',
            ]);
        });
    }
};
