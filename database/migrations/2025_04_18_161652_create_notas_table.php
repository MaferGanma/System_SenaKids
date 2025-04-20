<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->integer('calificacion');
            $table->integer('intentos');
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_juego');
            $table->date('fecha');
            $table->timestamps();
            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade');
            // $table->foreign('id_juego')->references('id')->on('juegos_estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
