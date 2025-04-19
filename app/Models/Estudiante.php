<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use MoonShine\Models\MoonshineUser;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'carnet',
        'edad',
        'genero',
        'paralelo_id',
    ];

    // app/Models/Estudiante.php

    protected static function booted()
    {
        static::saved(function ($estudiante) {
            $email = strtolower($estudiante->nombre . '.' . $estudiante->apellido . '@gmail.com');
            $user = Auth::guard('moonshine')->user();
            // dd($estudiante);
            if (!MoonshineUser::where('email', $email)->exists()) {
                MoonshineUser::create([
                    'moonshine_user_role_id' => 2,
                    'name' => $estudiante->nombre . ' ' . $estudiante->apellido,
                    'email' => $email,
                    'password' => Hash::make($estudiante->carnet),
                    'id_estudiante' => $estudiante->id,
                ]);


                Log::info("Usuario creado exitosamente para estudiante: {$estudiante->nombre} {$estudiante->apellido}");
            }
        });
    }
}
