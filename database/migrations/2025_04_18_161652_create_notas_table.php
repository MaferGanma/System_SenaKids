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
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('nombre_usuario'); // VARCHAR(255) NOT NULL
            $table->integer('calificacion'); // INT NOT NULL
            $table->date('fecha'); // DATE NOT NULL
            $table->string('tema'); // VARCHAR(255) NOT NULL
            $table->string('actividad'); // VARCHAR(255) NOT NULL
            $table->integer('intentos')->nullable(); // INT NULL
            $table->integer('minutos')->nullable(); // INT NULL
            $table->integer('segundos')->nullable(); // INT NULL
            $table->timestamps(); // created_at y updated_at
            $table->unsignedBigInteger('id_user')->nullable(); // ID de usuario (opcional)

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
