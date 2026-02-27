<?php

namespace App\Filament\Resources\TarefaVoluntarias\Pages;

use App\Filament\Resources\TarefaVoluntarias\TarefaVoluntariaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTarefaVoluntarias extends ListRecords
{
    protected static string $resource = TarefaVoluntariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
