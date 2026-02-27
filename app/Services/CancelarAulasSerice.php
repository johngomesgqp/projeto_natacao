<?php
namespace App\Services;

use App\Models\Aula;

class CancelarAulaService
{
    public function cancelar(int $aulaId, string $motivo, ?int $usuarioId = null): bool
    {
        $aula = Aula::findOrFail($aulaId);

        if ($aula->status === 'cancelada') {
            return false;
        }

        $aula->status = 'cancelada';
        $aula->motivo_cancelamento = $motivo;
        $aula->save();

        return true;
    }
}