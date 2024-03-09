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
        Schema::create('asignacion_competencias_puestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puesto_id')->constrained('puestos')->cascadeOnDelete();
            $table->foreignId('grado_requerido')->constrained('grado_competencia')->cascadeOnDelete();
            $table->foreignId('grado_actual')->constrained('grado_competencia')->cascadeOnDelete();
            $table->date('fecha_evaluacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_competencias_puestos');
    }
};
