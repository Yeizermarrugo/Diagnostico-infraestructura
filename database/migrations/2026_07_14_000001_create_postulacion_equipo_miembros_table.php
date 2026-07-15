<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('postulacion_equipo_miembros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postulacion_id')->constrained('postulaciones')->cascadeOnDelete();
            $table->unsignedTinyInteger('orden');
            $table->string('nombre_completo');
            $table->string('cargo');
            $table->string('dependencia');
            $table->string('correo_institucional');
            $table->string('telefono');
            $table->timestamps();

            $table->unique(['postulacion_id', 'orden']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('postulacion_equipo_miembros');
    }
};
