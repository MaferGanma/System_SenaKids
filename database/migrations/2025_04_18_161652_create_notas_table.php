<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); // id auto incremental
            $table->string('nombre_usuario'); // Nombre del usuario
            $table->integer('calificacion'); // Calificación
            $table->date('fecha'); // Fecha de la calificación
            $table->timestamps(); // Tiempos de creación y actualización
            $table->unsignedBigInteger('id_user')->nullable(); // id_user como relación opcional
            $table->string('tema'); // Tema sin valor por defecto
            $table->string('actividad'); // Actividad sin valor por defecto
            $table->integer('intentos')->nullable(); // Intentos, no obligatorio

            // Si necesitas establecer relaciones, puedes hacerlo aquí
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
