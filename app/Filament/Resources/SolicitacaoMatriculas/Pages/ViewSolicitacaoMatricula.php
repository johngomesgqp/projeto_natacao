<?php

namespace App\Filament\Resources\SolicitacaoMatriculas\Pages;

use App\Filament\Resources\SolicitacaoMatriculas\SolicitacaoMatriculaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSolicitacaoMatricula extends ViewRecord
{
    protected static string $resource = SolicitacaoMatriculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
