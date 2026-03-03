<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function professores()
    {
        return $this->hasMany(Professor::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
