<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class TurmaHorario extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'turma_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim',
        'created_by',
        'updated_by'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function aulas()
    {
        return $this->hasMany(Aula::class);
    }
}