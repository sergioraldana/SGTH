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
        Schema::create('grado_competencia', function (Blueprint $table) {
            $table->id();
            $table->char('grado', 1)->default('D');
            $table->tinyInteger('porcentaje')->default(25);
            $table->foreignId('competencia_id')->constrained('competencias')->cascadeOnDelete();
            $table->mediumText('descripcion');
            $table->json('comportamientos')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grado_competencia');
    }
};
