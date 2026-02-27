<?php
namespace App\Services;

use App\Models\User;
use App\Models\Role;

class ProjetoAdminService
{
    /**
     * Retorna todos os admins ativos de um projeto
     */
    public function listarAdminsAtivos(): array
    {
        // Pega todos os usuários que têm a role "admin" do projeto ativo
        return User::whereHas('roles', function ($q) {
            $q->where('slug', 'admin');
        })->where('ativo', true)->get()->toArray();
    }

    /**
     * Verifica se um usuário é admin
     */
    public function isAdmin(User $user): bool
    {
        return $user->roles()->where('slug', 'admin')->exists();
    }
}