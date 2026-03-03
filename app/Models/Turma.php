<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class Turma extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'nome',
        'nivel',
        'ativa'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma')->withPivot('data_inicio', 'data_fim')
            ->withTimestamps();
    }
    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'turma_professor')
            ->withTimestamps();
    }
    public function aulas()
    {
        return $this->hasMany(Aula::class);
    }
    public function horarios()
    {
        return $this->hasMany(TurmaHorario::class);
    }
}
