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
        Schema::create('colaboradores', function (Blueprint $table) {

            //Información Personal
            $table->id();
            $table->string('dpi', 13)->unique(); // Campo DPI con restricción de 13 caracteres y único
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['M', 'F']);
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo']);
            $table->tinyInteger('hijos')->default(0);
            $table->json('contacto_emergencia');

            //Información de Contacto
            $table->string('direccion');
            $table->string('telefono', 8)->unique();
            $table->string('correo_personal')->unique();
            $table->string('correo_laboral')->unique();

            //Información Laboral
            $table->foreignId('puesto_id')->nullable()->constrained('puestos')->nullOnDelete();
            $table->date('fecha_ingreso');
            $table->date('fecha_baja')->nullable();
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->string('foto')->nullable();
            $table->enum('tipo_contrato', ['Temporal', 'Permanente']);

            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
