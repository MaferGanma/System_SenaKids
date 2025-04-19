<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'juego';
    protected $fillable = [
        'tema_juego',
        'nombre_juego',
    ];
}
