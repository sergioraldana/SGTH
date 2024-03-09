<?php

namespace App\Filament\Resources\PuestoResource\Pages;

use App\Filament\Resources\PuestoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPuesto extends ViewRecord
{
    protected static string $resource = PuestoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
