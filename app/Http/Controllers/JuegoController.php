<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    public function prueba()
    {
        $user = Auth::guard('moonshine')->user();
        dd($user);
    }


    public function guardarPuntaje(Request $request)
    {
        try {
            $user = Auth::guard('moonshine')->user();

            if (!$user) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }

            // Obtener número de intentos anteriores
            $intentos = Calificacion::where('juego_id', $request->id_juego)
                ->where('estudiante_id', $user->id_estudiante)
                ->count();

            $nuevoIntento = $intentos + 1;

            $request->validate([
                'id_juego' => 'required',
                'calificacion' => 'required|integer',
            ]);

            // Guardar en la base de datos
            Calificacion::create([
                'puntaje' => $request->calificacion,
                'intentos' => $nuevoIntento,
                'estudiante_id' => $user->id_estudiante,
                'juego_id' => $request->id_juego,
                'fecha_juego' => now(),
            ]);

            $this->penalizacion($user->id_estudiante, $request->id_juego, $nuevoIntento);

            return response()->json(['message' => 'Puntaje guardado correctamente']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno', 'detalle' => $e->getMessage()], 500);
        }
    }


    public function penalizacion($id_estudiante, $id_juego, $intentos)
    {

        $user = Auth::guard('moonshine')->user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
        // Por cada intento adicional después del primero, baja 5%
        // $penalizacion = max(0, ($intentos - 1) * 0.05); // 5% por intento extra
        // $puntajeFinal = $calificacion * (1 - $penalizacion);

        $promedio = Calificacion::where('juego_id', $id_juego)
            ->where('estudiante_id', $user->id_estudiante)
            ->avg('puntaje');


        $nota = Nota::where('id_estudiante', $id_estudiante)
            ->where('id_juego', $id_juego)
            ->first();

        if ($nota) {
            // Ya existe: actualizar
            $nota->update([
                'nombre_usuario' => $user->name,
                'calificacion' => $promedio,
                'fecha' => now(),
                'intentos' => $intentos,
            ]);
        } else {
            // No existe: crear
            Nota::create([
                'nombre_usuario' => $user->name,
                'calificacion' => $promedio,
                'fecha' => now(),
                'intentos' => $intentos,
                'id_juego' => $id_juego,
                'id_estudiante' => $id_estudiante,
            ]);
        }
    }


    //INTENTOS
    //ID_ESTUDIANTE
    //ID_JUEGO

    //     Ejemplo:

    // if ($puntajeFinal >= 80 && $intentos <= 2) {
    //     $nivel = 'Avanzado';
    // } elseif ($puntajeFinal >= 50 && $intentos <= 4) {
    //     $nivel = 'Intermedio';
    // } else {
    //     $nivel = 'Básico';
    // }

}
