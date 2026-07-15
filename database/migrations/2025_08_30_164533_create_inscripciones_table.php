<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('rango_edad');
            $table->string('genero');
            $table->string('correo_institucional');
            $table->string('correo_personal');
            $table->string('telefono');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('naturaleza_entidad');
            $table->string('nombre_entidad');
            $table->string('sector_administrativo');
            $table->string('cargo');
            $table->string('nivel_jerarquico');
            $table->string('nivel_estudios');
            $table->string('area_formacion');
            $table->string('nivel_ia');
            $table->string('cert_laboral');
            $table->boolean('terminos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
};
