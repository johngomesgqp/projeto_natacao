<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToProjeto;

class Reposicao extends Model
{
    use SoftDeletes, BelongsToProjeto;

    protected $fillable = [
        'projeto_id',
        'aula_original_id',
        'aula_reposicao_id',
        'motivo',
        'created_by',
        'updated_by'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function aulaOriginal()
    {
        return $this->belongsTo(Aula::class, 'aula_original_id');
    }

    public function aulaReposicao()
    {
        return $this->belongsTo(Aula::class, 'aula_reposicao_id');
    }
}