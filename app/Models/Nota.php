<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';

    protected $fillable = [
        'nombre_usuario',
        'calificacion',
        'fecha',
        'intentos',
        'id_juego',
        'id_estudiante',
        'tema',        // 
        'actividad',   // 
        'minutos',
        'segundos',
        'id_user',     // 
    ];
}
