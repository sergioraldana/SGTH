<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puestos';

    protected $fillable = [
        'puesto',
        'descripcion',
        'tipo',
        'departamento',
        'jornada',
        'experiencia',
        'nivel_academico',
    ];

    protected $casts = [
        'nivel_academico' => 'array',
    ];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }
}
