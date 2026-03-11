<?php

namespace App\Filament\Resources\SolicitacaoMatriculas\Pages;

use App\Filament\Resources\SolicitacaoMatriculas\SolicitacaoMatriculaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSolicitacaoMatriculas extends ListRecords
{
    protected static string $resource = SolicitacaoMatriculaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
