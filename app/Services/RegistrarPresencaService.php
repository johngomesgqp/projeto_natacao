<?php
namespace App\Services;

use App\Models\Aula;
use App\Models\PresencaAluno;
use App\Models\PresencaProfessor;

class RegistrarPresencaService
{
    public function registrarAluno(int $aulaId, int $alunoId, bool $presente, ?string $observacao = null): void
    {
        PresencaAluno::updateOrCreate(
            ['aula_id' => $aulaId, 'aluno_id' => $alunoId],
            ['presente' => $presente, 'observacao' => $observacao]
        );
    }

    public function registrarProfessor(int $aulaId, int $professorId, bool $presente): void
    {
        PresencaProfessor::updateOrCreate(
            ['aula_id' => $aulaId, 'professor_id' => $professorId],
            ['presente' => $presente]
        );
    }
}