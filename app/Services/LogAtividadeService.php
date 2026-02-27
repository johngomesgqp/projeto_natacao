<?php
namespace App\Services;

use App\Models\LogAtividade;
use App\Support\Tenant;

class LogAtividadeService
{
    public function registrarAutomatico(string $acao, object $entidade, ?int $userId = null, ?array $dados = null): void
    {
        LogAtividade::create([
            'projeto_id' => Tenant::id(),
            'user_id' => $userId,
            'acao' => $acao,
            'entidade_type' => get_class($entidade),
            'entidade_id' => $entidade->id,
            'dados' => $dados,
        ]);
    }
}