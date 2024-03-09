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
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('puesto')->unique();
            $table->string('descripcion')->nullable();
            $table->enum('tipo', ['Administrativo', 'Operativo']);
            $table->enum('departamento', ['Administración', 'Ventas', 'Recursos Humanos', 'Producción', 'Logística', 'Mantenimiento']);
            $table->enum('jornada', ['Tiempo Completo', 'Medio Tiempo']);;
            $table->tinyInteger('experiencia')->default(0);
            $table->json('nivel_academico');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
