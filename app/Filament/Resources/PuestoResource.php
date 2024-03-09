<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PuestoResource\Pages;
use App\Filament\Resources\PuestoResource\RelationManagers;
use App\Models\Puesto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PuestoResource extends Resource
{
    protected static ?string $model = Puesto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('puesto')
                    ->label('Puesto')
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->nullable(),
                Forms\Components\Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'Administrativo' => 'Administrativo',
                        'Operativo' => 'Operativo',
                    ])
                    ->required(),
                Forms\Components\Select::make('departamento')
                    ->label('Departamento')
                    ->options([
                        'Administración' => 'Administración',
                        'Ventas' => 'Ventas',
                        'Recursos Humanos' => 'Recursos Humanos',
                        'Producción' => 'Producción',
                        'Logística' => 'Logística',
                        'Mantenimiento' => 'Mantenimiento',
                    ])
                    ->required(),
                Forms\Components\Select::make('jornada')
                    ->label('Jornada')
                    ->options([
                        'Tiempo Completo' => 'Tiempo Completo',
                        'Medio Tiempo' => 'Medio Tiempo',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('experiencia')
                    ->label('Experiencia')
                    ->numeric()
                    ->default(0),
                Forms\Components\Repeater::make('nivel_academico')
                    ->label('Nivel académico')
                    ->schema([
                        Forms\Components\TextInput::make('nivel')
                            ->label('Nivel')
                            ->required(),
                        Forms\Components\TextInput::make('titulo')
                            ->label('Título')
                            ->required()
                    ->required(),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('puesto')
                    ->label('Puesto'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción'),
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo'),
                Tables\Columns\TextColumn::make('departamento')
                    ->label('Departamento'),
                Tables\Columns\TextColumn::make('jornada')
                    ->label('Jornada'),
                Tables\Columns\TextColumn::make('experiencia')
                    ->label('Experiencia'),
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPuestos::route('/'),
            'create' => Pages\CreatePuesto::route('/create'),
            'view' => Pages\ViewPuesto::route('/{record}'),
            'edit' => Pages\EditPuesto::route('/{record}/edit'),
        ];
    }
}
