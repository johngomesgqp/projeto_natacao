<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'projeto_id',
        'nome',
        'email',
        'password',
        'ativo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    // Relação com Projeto
    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    // Relação com Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // Relação com Professor
    public function professor()
    {
        return $this->hasOne(Professor::class);
    }
    // Garante que sempre temos uma string
    public function getNameAttribute(): string
    {
        return $this->nome ?? 'Usuário';
    }
    // Método obrigatório para Filament, sempre retorna string
    public function getFilamentName(): string
    {
        // Garante que mesmo que nome seja null, sempre retorna string
        return $this->name;
    }
}
