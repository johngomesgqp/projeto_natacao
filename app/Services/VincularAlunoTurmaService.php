<?php
namespace App\Services;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VincularAlunoTurmaService
{
    public function vincular(int $alunoId, int $turmaId, \DateTimeInterface $dataInicio): void
    {
        $aluno = Aluno::findOrFail($alunoId);
        $turma = Turma::findOrFail($turmaId);

        // Valida multi-tenant: aluno e turma do mesmo projeto
        if ($aluno->projeto_id !== $turma->projeto_id) {
            throw new \Exception("Aluno e Turma não pertencem ao mesmo projeto!");
        }

        DB::transaction(function () use ($aluno, $turma, $dataInicio) {
            // Fecha vínculos ativos
            $aluno->turmas()->wherePivot('data_fim', null)->update(['data_fim' => Carbon::now()]);

            // Vincula aluno à nova turma
            $aluno->turmas()->attach($turma->id, ['data_inicio' => $dataInicio, 'data_fim' => null]);
        });
    }
}