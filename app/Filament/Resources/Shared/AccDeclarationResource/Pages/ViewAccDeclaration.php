<?php

namespace App\Filament\Resources\Shared\AccDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAccDeclaration extends ViewRecord
{
    protected static string $resource = AccDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
