<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'juegos_estudiantes';

    protected $fillable = [
        'puntaje',
        'intentos',
        'estudiante_id',
        'juego_id',
        'fecha_juego',
    ];

}
