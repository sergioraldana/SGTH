<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradoCompetencia extends Model
{
    use HasFactory;

    protected $table = 'grado_competencia';

    protected $fillable = [
        'grado',
        'porcentaje',
        'competencia_id',
        'descripcion',
        'comportamientos',
    ];

    protected $casts = [
        'comportamientos' => 'array',
    ];

    public function competencia(): BelongsTo
    {
        return $this->belongsTo(Competencia::class);
    }
}
