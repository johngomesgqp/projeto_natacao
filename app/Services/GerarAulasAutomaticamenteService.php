<?php
namespace App\Services;

use App\Models\Turma;
use App\Models\TurmaHorario;
use App\Models\Aula;
use Carbon\Carbon;

class GerarAulasAutomaticamenteService
{
    public function gerarParaPeriodo(int $turmaId, \DateTimeInterface $inicio, \DateTimeInterface $fim): int
    {
        $turma = Turma::findOrFail($turmaId);
        $horarios = $turma->horarios()->where('ativo', true)->get();
        $count = 0;

        foreach ($horarios as $horario) {
            $current = Carbon::instance($inicio);
            while ($current <= Carbon::instance($fim)) {
                if ($current->dayOfWeek == $horario->dia_semana) {
                    Aula::create([
                        'projeto_id' => $turma->projeto_id,
                        'turma_id' => $turma->id,
                        'turma_horario_id' => $horario->id,
                        'data' => $current->format('Y-m-d'),
                        'hora_inicio' => $horario->horario,
                        'status' => 'agendada',
                    ]);
                    $count++;
                }
                $current->addDay();
            }
        }

        return $count;
    }
}