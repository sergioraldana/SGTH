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
        Schema::create('evaluaciones_capacitacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programa_capacitacion_id')->constrained('programas_capacitacion');
            $table->foreignId('competencia_puesto_id')->constrained('asignacion_competencias_puestos');
            $table->foreignId('colaborador_id')->constrained('colaboradores');
            $table->enum('nivel_reaccion', ['muy_bueno', 'bueno', 'regular', 'malo'])->nullable();
            $table->float('nivel_aprendizaje', 4, 2)->nullable();
            $table->enum('nivel_comportamiento', ['mejora_significativa', 'mejora_moderada', 'sin_cambio'])->nullable();
            $table->enum('nivel_resultados', ['impacto_positivo', 'neutral', 'impacto_negativo'])->nullable();
            $table->boolean('cierre_brecha')->default(false); // false = no cerrada, true = cerrada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones_capacitacion');
    }
};
