<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class Aluno extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'nome',
        'data_nascimento',
        'nome_responsavel',
        'telefone_responsavel',
        'ativo'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'aluno_turma')
            ->withPivot('data_inicio', 'data_fim')
            ->withTimestamps();
    }

    public function presencas()
    {
        return $this->hasMany(PresencaAluno::class);
    }
}
