<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColaboradorResource\Pages;
use App\Filament\Resources\ColaboradorResource\RelationManagers;
use App\Models\Colaborador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColaboradorResource extends Resource
{
    protected static ?string $model = Colaborador::class;

    protected static ?string $modelLabel = 'Colaborador';

    protected static ?string $pluralModelLabel = 'Colaboradores';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('dpi')
                    ->label('DPI')
                    ->numeric()
                    ->unique()
                    ->minLength(13)
                    ->maxLength(13)
                    ->required(),
                Forms\Components\TextInput::make('nombres')
                    ->label('Nombres')
                    ->string()
                    ->required(),
                Forms\Components\TextInput::make('apellidos')
                    ->label('Apellidos')
                    ->string()
                    ->required(),
                Forms\Components\Datepicker::make('fecha_nacimiento')
                    ->label('Fecha de nacimiento')
                    ->closeOnDateSelection()
                    ->required(),
                Forms\Components\Select::make('genero')
                    ->label('Género')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ])
                    ->required(),
                Forms\Components\Select::make('estado_civil')
                    ->label('Estado civil')
                    ->options([
                        'Soltero' => 'Soltero',
                        'Casado' => 'Casado',
                        'Divorciado' => 'Divorciado',
                        'Viudo' => 'Viudo',
                    ])
                    ->required(),
        Forms\Components\TextInput::make('hijos')
                    ->label('Hijos')
                    ->default(0)
                    ->numeric()
                    ->required(),
                Forms\Components\Repeater::make('contacto_emergencia')
                    ->label('Contacto de emergencia')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->label('Nombre')
                            ->string()
                            ->required(),
                        Forms\Components\TextInput::make('telefono')
                            ->label('Teléfono')
                            ->numeric()
                            ->required(),
                    ]),
                Forms\Components\Textarea::make('direccion')
                    ->label('Dirección')
                    ->required(),
                Forms\Components\TextInput::make('telefono')
                    ->label('Teléfono')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('correo_personal')
                    ->label('Correo personal')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('correo_laboral')
                    ->label('Correo laboral')
                    ->email()
                    ->required(),
                Forms\Components\Datepicker::make('fecha_ingreso')
                    ->label('Fecha de ingreso')
                    ->closeOnDateSelection()
                    ->required(),
                Forms\Components\Datepicker::make('fecha_baja')
                    ->label('Fecha de baja')
                    ->closeOnDateSelection()
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'Activo' => 'Activo',
                        'Inactivo' => 'Inactivo',
                    ])
                    ->default('Activo')
                    ->required(),
                Forms\Components\Select::make('puesto_id')
                    ->label('Puesto')
                    ->relationship('puesto', 'puesto')
                    ->required(),
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->required(),
                Forms\Components\Select::make('tipo_contrato')
                    ->label('Tipo de contrato')
                    ->options([
                        'Temporal' => 'Temporal',
                        'Permanente' => 'Permanente',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dpi')
                    ->label('DPI')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombres')
                    ->label('Nombres')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('apellidos')
                    ->label('Apellidos')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('puesto.puesto')
                    ->label('Puesto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListColaboradors::route('/'),
            'create' => Pages\CreateColaborador::route('/create'),
            'view' => Pages\ViewColaborador::route('/{record}'),
            'edit' => Pages\EditColaborador::route('/{record}/edit'),
        ];
    }
}
