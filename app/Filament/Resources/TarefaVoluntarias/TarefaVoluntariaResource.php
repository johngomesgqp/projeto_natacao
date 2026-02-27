<?php

namespace App\Filament\Resources\TarefaVoluntarias;

use App\Filament\Resources\TarefaVoluntarias\Pages\CreateTarefaVoluntaria;
use App\Filament\Resources\TarefaVoluntarias\Pages\EditTarefaVoluntaria;
use App\Filament\Resources\TarefaVoluntarias\Pages\ListTarefaVoluntarias;
use App\Filament\Resources\TarefaVoluntarias\Pages\ViewTarefaVoluntaria;
use App\Filament\Resources\TarefaVoluntarias\Schemas\TarefaVoluntariaForm;
use App\Filament\Resources\TarefaVoluntarias\Schemas\TarefaVoluntariaInfolist;
use App\Filament\Resources\TarefaVoluntarias\Tables\TarefaVoluntariasTable;
use App\Models\TarefaVoluntaria;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TarefaVoluntariaResource extends Resource
{
    protected static ?string $model = TarefaVoluntaria::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'titulo';

    public static function form(Schema $schema): Schema
    {
        return TarefaVoluntariaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TarefaVoluntariaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TarefaVoluntariasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTarefaVoluntarias::route('/'),
            'create' => CreateTarefaVoluntaria::route('/create'),
            'view' => ViewTarefaVoluntaria::route('/{record}'),
            'edit' => EditTarefaVoluntaria::route('/{record}/edit'),
        ];
    }
}
