<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'competencia',
        'descripcion',
        'tipo',
        'activa',
    ];


    public function grados(): HasMany
    {
        return $this->hasMany(GradoCompetencia::class);
    }
}
