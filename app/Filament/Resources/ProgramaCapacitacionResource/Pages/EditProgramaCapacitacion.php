<?php

namespace App\Filament\Resources\ProgramaCapacitacionResource\Pages;

use App\Filament\Resources\ProgramaCapacitacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramaCapacitacion extends EditRecord
{
    protected static string $resource = ProgramaCapacitacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
