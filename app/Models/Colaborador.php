<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';

    protected $fillable = [
        'dpi',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'estado_civil',
        'hijos',
        'contacto_emergencia',
        'direccion',
        'telefono',
        'correo_personal',
        'correo_laboral',
        'fecha_ingreso',
        'fecha_baja',
        'estado',
        'puesto_id',
        'foto',
        'tipo_contrato',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_ingreso' => 'date',
        'fecha_baja' => 'date',
        'contacto_emergencia' => 'array',
    ];

    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class);
    }

}
