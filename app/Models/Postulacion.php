<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $table = 'postulaciones';

    /**
     * Campos de la rúbrica (Sección 3) agrupados por dimensión, en el mismo
     * orden que config/instrumento.php. Fuente única de verdad para el
     * cálculo de puntajes por dimensión y el total.
     */
    public const DIMENSIONES = [
        'D1' => [
            'p19_categoria_territorial',
            'p20_dependencia_tic',
            'p21_personal_datos_sistemas',
            'p22_pdt_transformacion_digital',
        ],
        'D2' => [
            'p23_estabilidad_internet',
            'p24_velocidad_internet',
            'p25_equipos_computo',
            'p26_participacion_talleres_virtuales',
        ],
        'D3' => [
            'p27_programas_previos_mintic',
            'p28_furag_igd',
            'p29_datos_abiertos',
            'p30_sistemas_informacion_decisiones',
            'p31_personal_formacion_gd',
        ],
        'D4' => [
            'p32_firma_carta_compromiso',
            'p33_autoridad_conoce_postulacion',
            'p34_autoridad_compromete_participacion',
            'p35_autoridad_garantiza_equipo_canal',
        ],
        'D5' => [
            'p36_problematica_clara_pertinente',
            'p37_datos_fuentes_disponibles',
            'p38_relacion_meta_pdt',
            'p39_beneficio_esperado_claro',
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
        'es_contacto_comunicacion',
        // Sección 3. Evaluación de Dimensiones
        'p19_categoria_territorial',
        'p20_dependencia_tic',
        'p21_personal_datos_sistemas',
        'p22_pdt_transformacion_digital',
        'p23_estabilidad_internet',
        'p24_velocidad_internet',
        'p25_equipos_computo',
        'p26_participacion_talleres_virtuales',
        'p27_programas_previos_mintic',
        'p28_furag_igd',
        'p29_datos_abiertos',
        'p30_sistemas_informacion_decisiones',
        'p31_personal_formacion_gd',
        'p32_firma_carta_compromiso',
        'p33_autoridad_conoce_postulacion',
        'p34_autoridad_compromete_participacion',
        'p35_autoridad_garantiza_equipo_canal',
        'p36_problematica_clara_pertinente',
        'p37_datos_fuentes_disponibles',
        'p38_relacion_meta_pdt',
        'p39_beneficio_esperado_claro',
        // Sección 4. Participación en talleres informativos y disponibilidad institucional
        'participo_convocatoria_previa',
        'disponibilidad_actividades',
        'disponibilidad_seguimiento',
        // Sección 5. Declaraciones y autorización
        'declara_veracidad',
        'entiende_no_seleccion_automatica',
        'autoriza_verificacion_info',
        'acepta_formalizar_compromisos',
        'autoriza_tratamiento_datos_personales',
        // Anexo. Carta de manifestación de interés y compromiso institucional
        'carta_compromiso_path',
    ];

    protected $casts = [
        'declara_veracidad' => 'boolean',
        'entiende_no_seleccion_automatica' => 'boolean',
        'autoriza_verificacion_info' => 'boolean',
        'acepta_formalizar_compromisos' => 'boolean',
        'autoriza_tratamiento_datos_personales' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function (Postulacion $postulacion) {
            $total = 0;

            foreach (self::DIMENSIONES as $dimension => $campos) {
                $subtotal = 0;
                foreach ($campos as $campo) {
                    $subtotal += (int) $postulacion->{$campo};
                }
                $postulacion->{'puntaje_' . strtolower($dimension)} = $subtotal;
                $total += $subtotal;
            }

            $postulacion->puntaje_total = $total;
        });
    }

    public function equipoMiembros()
    {
        return $this->hasMany(PostulacionEquipoMiembro::class)->orderBy('orden');
    }

    public function responsableComunicacion()
    {
        return $this->equipoMiembros->firstWhere('orden', 1);
    }
}
