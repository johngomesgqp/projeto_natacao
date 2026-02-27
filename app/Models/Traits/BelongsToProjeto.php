<?php

namespace App\Models\Traits;

use App\Support\Tenant;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToProjeto
{
    protected static function bootBelongsToProjeto()
    {
        // Adiciona automaticamente WHERE projeto_id = Tenant::id()
        static::addGlobalScope('projeto', function (Builder $builder) {
            if (Tenant::id()) {
                $builder->where('projeto_id', Tenant::id());
            }
        });

        // Ao criar, define projeto_id automaticamente
        static::creating(function ($model) {
            if (!$model->projeto_id) {
                $model->projeto_id = Tenant::id();
            }
        });
    }

    public function projeto()
    {
        return $this->belongsTo(\App\Models\Projeto::class);
    }
}