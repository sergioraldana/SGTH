<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaCapacitacion extends Model
{
    use HasFactory;

    protected $table = 'programas_capacitacion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'modalidad',
        'instructor_entidad',
        'competencia_id',
    ];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class);
    }
}
