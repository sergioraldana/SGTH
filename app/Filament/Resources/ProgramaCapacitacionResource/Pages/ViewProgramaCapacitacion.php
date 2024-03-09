<?php

namespace App\Filament\Resources\ProgramaCapacitacionResource\Pages;

use App\Filament\Resources\ProgramaCapacitacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProgramaCapacitacion extends ViewRecord
{
    protected static string $resource = ProgramaCapacitacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
