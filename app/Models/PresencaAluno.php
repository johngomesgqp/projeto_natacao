<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class PresencaAluno extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'aula_id',
        'aluno_id',
        'presente',
        'observacao',
        'created_by',
        'updated_by'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}