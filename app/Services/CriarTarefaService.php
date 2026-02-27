<?php
namespace App\Services;

use App\Models\TarefaVoluntaria;

class CriarTarefaService
{
    public function criar(int $projetoId, string $descricao, ?int $aulaId = null, ?string $responsavelType = null, ?int $responsavelId = null, ?int $createdBy = null): int
    {
        $tarefa = TarefaVoluntaria::create([
            'projeto_id' => $projetoId,
            'descricao' => $descricao,
            'aula_id' => $aulaId,
            'responsavel_type' => $responsavelType,
            'responsavel_id' => $responsavelId,
        ]);

        return $tarefa->id;
    }
}