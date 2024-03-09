<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetenciaResource\Pages;
use App\Filament\Resources\CompetenciaResource\RelationManagers;
use App\Models\Competencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompetenciaResource extends Resource
{
    protected static ?string $model = Competencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('competencia')
                        ->label('Competencia')
                        ->unique(ignoreRecord: true)
                        ->required(),
                    Forms\Components\Select::make('tipo')
                        ->label('Tipo')
                        ->options([
                            'Conocimiento' => 'Conocimiento',
                            'Habilidad' => 'Habilidad',
                            'Valor' => 'Valor',
                        ])
                        ->required(),
                    Forms\Components\Toggle::make('estado')
                        ->label('Activa')
                        ->inline(false)
                        ->columnSpan(1)
                        ->default(true)
                        ->required(),
                    Forms\Components\Textarea::make('descripcion')
                        ->label('Descripción')
                        ->rows(6)
                        ->grow()
                        ->columnSpanFull()
                        ->nullable(),
                ])->columns(3),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('competencia')
                    ->label('Competencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->wrap()
                    ->label('Descripción')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado')
                    ->label('Estado')
                    ->boolean()
                    ->searchable(),
            ])
            ->defaultGroup('tipo')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            'grados' => RelationManagers\GradoRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetencias::route('/'),
            'create' => Pages\CreateCompetencia::route('/create'),
            'view' => Pages\ViewCompetencia::route('/{record}'),
            'edit' => Pages\EditCompetencia::route('/{record}/edit'),
        ];
    }
}
