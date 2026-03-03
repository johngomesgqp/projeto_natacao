<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class Aula extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'turma_id',
        'turma_horario_id',
        'data',
        'hora_inicio',
        'hora_fim',
        'status',
        'motivo_cancelamento',
        'realizada_em'
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
    public function turmaHorario()
    {
        return $this->belongsTo(TurmaHorario::class);
    }
    public function presencasAlunos()
    {
        return $this->hasMany(PresencaAluno::class);
    }
    public function presencasProfessores()
    {
        return $this->hasMany(PresencaProfessor::class);
    }
    public function tarefas()
    {
        return $this->hasMany(TarefaVoluntaria::class);
    }
    public function reposicaoOriginal()
    {
        return $this->hasOne(Reposicao::class, 'aula_original_id');
    }
    public function reposicao()
    {
        return $this->hasOne(Reposicao::class, 'aula_reposicao_id');
    }
}
