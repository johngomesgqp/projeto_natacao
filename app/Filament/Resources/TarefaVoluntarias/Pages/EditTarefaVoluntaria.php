<?php

namespace App\Filament\Resources\TarefaVoluntarias\Pages;

use App\Filament\Resources\TarefaVoluntarias\TarefaVoluntariaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTarefaVoluntaria extends EditRecord
{
    protected static string $resource = TarefaVoluntariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
