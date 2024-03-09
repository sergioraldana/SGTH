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
        Schema::create('programas_capacitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('objetivo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable(); // Opcional, por si es un curso auto-gestionado sin fecha fin definida
            $table->tinyInteger('duracion_horas');
            $table->string('modalidad');
            $table->string('instructor_entidad');
            $table->timestamps();
            $table->foreignId('competencia_id')->nullable()->constrained('competencias')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas_capacitacion');
    }
};
