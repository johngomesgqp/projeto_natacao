<?php

namespace App\Filament\Resources\SolicitacaoMatriculas;

use App\Filament\Resources\SolicitacaoMatriculas\Pages\CreateSolicitacaoMatricula;
use App\Filament\Resources\SolicitacaoMatriculas\Pages\EditSolicitacaoMatricula;
use App\Filament\Resources\SolicitacaoMatriculas\Pages\ListSolicitacaoMatriculas;
use App\Filament\Resources\SolicitacaoMatriculas\Pages\ViewSolicitacaoMatricula;
use App\Filament\Resources\SolicitacaoMatriculas\Schemas\SolicitacaoMatriculaForm;
use App\Filament\Resources\SolicitacaoMatriculas\Schemas\SolicitacaoMatriculaInfolist;
use App\Filament\Resources\SolicitacaoMatriculas\Tables\SolicitacaoMatriculasTable;
use App\Models\SolicitacaoMatricula;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SolicitacaoMatriculaResource extends Resource
{
    protected static ?string $model = SolicitacaoMatricula::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SolicitacaoMatriculaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SolicitacaoMatriculaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SolicitacaoMatriculasTable::configure($table);
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
            'index' => ListSolicitacaoMatriculas::route('/'),
            'create' => CreateSolicitacaoMatricula::route('/create'),
            'view' => ViewSolicitacaoMatricula::route('/{record}'),
            'edit' => EditSolicitacaoMatricula::route('/{record}/edit'),
        ];
    }
}
