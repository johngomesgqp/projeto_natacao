<?php
namespace App\Services;

use App\Models\Aula;
use App\Models\Reposicao;
use Carbon\Carbon;

class CriarReposicaoService
{
    public function criar(int $aulaOriginalId, \DateTimeInterface $novaDataHoraInicio, ?\DateTimeInterface $novaDataHoraFim = null): int
    {
        $aulaOriginal = Aula::findOrFail($aulaOriginalId);

        // Cria nova aula de reposição
        $novaAula = Aula::create([
            'projeto_id' => $aulaOriginal->projeto_id,
            'turma_id' => $aulaOriginal->turma_id,
            'data' => $novaDataHoraInicio->format('Y-m-d'),
            'hora_inicio' => $novaDataHoraInicio->format('H:i:s'),
            'hora_fim' => $novaDataHoraFim?->format('H:i:s'),
            'status' => 'agendada',
        ]);

        // Cria reposição
        $reposicao = Reposicao::create([
            'aula_original_id' => $aulaOriginal->id,
            'aula_reposicao_id' => $novaAula->id,
        ]);

        return $novaAula->id;
    }
}