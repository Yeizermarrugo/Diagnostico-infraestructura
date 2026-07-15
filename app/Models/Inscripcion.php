<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        // Sección 1: Información Personal
        'nombres',
        'apellidos',
        'tipo_documento',
        'numero_documento',
        'rango_edad',
        'genero',
        // Sección 2: Información de Contacto
        'correo_institucional',
        'correo_personal',
        'telefono',
        'departamento',
        'ciudad',
        // Sección 3: Información Laboral y Profesional
        'naturaleza_entidad',
        'nombre_entidad',
        'sector_administrativo',
        'cargo',
        'nivel_jerarquico',
        // Sección 4: Perfil Académico y Motivaciones
        'nivel_estudios',
        'area_formacion',
        'nivel_ia',
        // Sección 5: Caracterización técnica sobre MSPI, riesgos e IA
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
        // Sección 6: Certificación de Vinculación Laboral
        'cert_laboral',
        // Declaración
        'terminos',
    ];

    protected $casts = [
        'mspi_usa_herramientas_ia' => 'array',
        'mspi_procesos_uso_ia' => 'array',
        'mspi_riesgos_relevantes' => 'array',
        'mspi_temas_profundizar' => 'array',
    ];
}
