<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoAprendizaje extends Model
{
    use HasFactory;

    protected $table = 'seguimiento_aprendizaje';

    protected $fillable = [
        'estudiante_id',
        'fecha',
        'observacion',
        'avance',
        'nivel',
    ];
}
