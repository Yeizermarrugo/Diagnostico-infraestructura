<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionEquipoMiembro extends Model
{
    protected $fillable = [
        'postulacion_id',
        'orden',
        'nombre_completo',
        'cargo',
        'dependencia',
        'correo_institucional',
        'telefono',
    ];

    public function postulacion()
    {
        return $this->belongsTo(Postulacion::class);
    }
}
