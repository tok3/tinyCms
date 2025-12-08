<?php

namespace App\Filament\Resources\Shared\A11yDeclarationResource\Pages;

use App\Filament\Resources\Shared\A11yDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditA11yDeclaration extends EditRecord
{
    protected static string $resource = A11yDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
