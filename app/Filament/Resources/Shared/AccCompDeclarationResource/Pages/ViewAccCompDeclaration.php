<?php

namespace App\Filament\Resources\Shared\AccCompDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccCompDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAccCompDeclaration extends ViewRecord
{
    protected static string $resource = AccCompDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
