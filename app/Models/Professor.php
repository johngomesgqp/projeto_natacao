<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class Professor extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
            'projeto_id',
            'user_id',
            'telefone',
            'ativo'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'turma_professor')->withTimestamps();
    }
    public function presencas()
    {
        return $this->hasMany(PresencaProfessor::class);
    }
}
