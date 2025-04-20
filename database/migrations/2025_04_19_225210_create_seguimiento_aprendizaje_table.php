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
        Schema::create('seguimiento_aprendizaje', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->timestamp('fecha')->nullable();
            $table->text('observacion')->nullable();
            $table->decimal('avance', 5, 2)->default(0);
            $table->string('nivel', 50)->nullable(); // Básico, Intermedio, Avanzado
            $table->timestamps();

            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_aprendizaje');
    }
};
