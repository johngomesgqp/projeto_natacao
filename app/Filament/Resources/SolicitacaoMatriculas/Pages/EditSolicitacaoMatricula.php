<?php

namespace App\Filament\Resources\SolicitacaoMatriculas\Pages;

use App\Filament\Resources\SolicitacaoMatriculas\SolicitacaoMatriculaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSolicitacaoMatricula extends EditRecord
{
    protected static string $resource = SolicitacaoMatriculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
