<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect('/admin');
});

Route::get('/alfabeto', function () {
    return view('Tema1.Alfabeto');  // Esta es la vista que se mostrará
})->name('tema1.alfabeto');