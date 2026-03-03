<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class AlunoTurma extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $table = 'aluno_turma';

    protected $fillable = [
        'projeto_id',
        'aluno_id',
        'turma_id',
        'data_inicio',
        'data_fim',
        'created_by',
        'updated_by'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}