<?php

namespace App\Http\Controllers;

use App\Models\Moonshineuser;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuegoController extends Controller
{
    public function guardarPuntaje(Request $request)
{
    // Validar los datos
    $request->validate([
        'nombre_usuario' => 'required|string',
        'calificacion' => 'required|integer',
        'tema' => 'required|string',
        'actividad' => 'required|string',
        'intentos' => 'nullable|integer',
        'minutos' => 'nullable|integer',
        'segundos' => 'nullable|integer',
    ]);

    $user = MoonshineUser::find(auth('moonshine')->id());

    // Buscar si ya existe una nota con ese usuario, tema y actividad
    $notaExistente = Nota::where('nombre_usuario', $user->name)
        ->where('tema', $request->tema)
        ->where('actividad', $request->actividad)
        ->first();

    if ($notaExistente) {
        // Si existe, sumamos 1 a los intentos y actualizamos la calificación
        $notaExistente->update([
            'calificacion' => $request->calificacion,
            'intentos' => ($notaExistente->intentos ?? 0) + 1,
            'fecha' => now(),
            'minutos' => $request->minutos,
            'segundos' => $request->segundos,
        ]);
    } else {
        // Si no existe, creamos una nueva nota
        Nota::create([
            'nombre_usuario' => $user->name,
            'calificacion' => $request->calificacion,
            'tema' => $request->tema,
            'actividad' => $request->actividad,
            'intentos' => 1,
            'fecha' => now(),
            'id_user' => $user->id,
            'minutos' => $request->minutos,
            'segundos' => $request->segundos,
        ]);
    }

    return response()->json(['message' => 'Puntaje guardado correctamente']);
}
}
