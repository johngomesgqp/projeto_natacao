<?php

namespace App\Filament\Resources\TarefaVoluntarias\Pages;

use App\Filament\Resources\TarefaVoluntarias\TarefaVoluntariaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTarefaVoluntaria extends ViewRecord
{
    protected static string $resource = TarefaVoluntariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
