<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramaCapacitacionResource\Pages;
use App\Filament\Resources\ProgramaCapacitacionResource\RelationManagers;
use App\Models\ProgramaCapacitacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramaCapacitacionResource extends Resource
{
    protected static ?string $model = ProgramaCapacitacion::class;


    protected static ?string $navigationLabel = 'Programas de capacitación';

    protected static ?string $modelLabel = 'Programa de capacitación';

    protected static ?string $pluralModelLabel = 'Programas de capacitación';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->nullable(),
                Forms\Components\Datepicker::make('fecha_inicio')
                    ->label('Fecha de inicio')
                    ->closeOnDateSelection()
                    ->required(),
                Forms\Components\Datepicker::make('fecha_fin')
                    ->label('Fecha de fin')
                    ->closeOnDateSelection()
                    ->required(),
                Forms\Components\Select::make('modalidad')
                    ->label('Modalidad')
                    ->options([
                        'Presencial' => 'Presencial',
                        'Virtual' => 'Virtual',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('instructor_entidad')
                    ->label('Instructor o entidad')
                    ->required(),
                Forms\Components\Select::make('competencia_id')
                    ->label('Competencia')
                    ->searchable()
                    ->relationship('competencia', 'competencia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción'),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->label('Fecha de inicio'),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->label('Fecha de fin'),
                Tables\Columns\TextColumn::make('modalidad')
                    ->label('Modalidad'),
                Tables\Columns\TextColumn::make('instructor_entidad')
                    ->label('Instructor o entidad'),
                Tables\Columns\TextColumn::make('competencia_id.competencia')
                    ->label('Competencia'),
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
            'index' => Pages\ListProgramaCapacitacions::route('/'),
            'create' => Pages\CreateProgramaCapacitacion::route('/create'),
            'view' => Pages\ViewProgramaCapacitacion::route('/{record}'),
            'edit' => Pages\EditProgramaCapacitacion::route('/{record}/edit'),
        ];
    }
}
