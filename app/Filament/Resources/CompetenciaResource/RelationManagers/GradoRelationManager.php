<?php

namespace App\Filament\Resources\CompetenciaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradoRelationManager extends RelationManager
{
    protected static string $relationship = 'grados';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ToggleButtons::make('grado')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'ND' => 'ND',
                    ])
                    ->helperText('ND = No Desarrollada')
                    ->live()
                    ->grouped()
                    ->required(),
                Forms\Components\Select::make('porcentaje')
                    ->options([
                        '25' => '25%',
                        '50' => '50%',
                        '75' => '75%',
                        '100' => '100%',
                    ])
                    ->default(fn () => '100')
                    ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\Repeater::make('comportamientos')
                    ->simple(
                        Forms\Components\Textarea::make('comportamiento')
                            ->rows(4)
                            ->label('Comportamiento')
                            ->required()
                    )
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('grado')
            ->columns([
                Tables\Columns\TextColumn::make('grado')
                    ->size(TextColumnSize::Large)
                    ->weight(FontWeight::Bold)
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'A' => 'success',
                        'B' => 'primary',
                        'C' => 'warning',
                        'D' => 'danger',
                    })
                    ->label('Grado'),
                Tables\Columns\TextColumn::make('porcentaje'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->wrap()
                    ->label('Descripción'),
                Tables\Columns\TextColumn::make('comportamientos')
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->wrap()
                    ->label('Comportamientos'),
            ])
            ->defaultSort('grado', 'asc')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
