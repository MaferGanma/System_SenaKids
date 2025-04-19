<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function verModelo()
    {
        return view('numerosAr');  // Asegúrate de que 'modelo' es la vista correcta
    }
}
