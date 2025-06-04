<?php

namespace App\Filament\Resources\Shared\EztextResource\Pages;

use App\Filament\Resources\Shared\EztextResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEztext extends ViewRecord
{
    protected static string $resource = EztextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
