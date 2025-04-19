<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    public function prueba(){
        $user = Auth::guard('moonshine')->user();

        dd($user);
    }


    public function guardarPuntaje(Request $request)
    {
        $user = Auth::guard('moonshine')->user();
        // dd($user);
        // Validar los datos
        $request->validate([
            'id_juego' => 'required',
            'calificacion' => 'required|integer',
        ]);

        // Guardar en la base de datos
        Calificacion::create([
            // 'nombre_usuario' => $user->name,
            'puntaje' => $request->calificacion,
            'intentos' => 2,
            'estudiante_id' => $user->id_estudiante,
            'juego_id' => $request->id_juego,
            'fecha_juego' => now(),
        ]);

        return response()->json(['message' => 'Puntaje guardado correctamente']);
    }
}
