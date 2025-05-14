<?php

namespace App\Filament\Resources\Shared\ImagetagResource\Pages;

use App\Filament\Resources\Shared\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImagetag extends ViewRecord
{
    protected static string $resource = ImagetagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
