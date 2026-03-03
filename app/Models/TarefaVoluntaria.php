<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class TarefaVoluntaria extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'aula_id',
        'descricao',
        'concluida'
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    public function responsavel()
    {
        return $this->morphTo();
    }
}
