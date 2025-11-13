<?php

namespace App\Filament\Resources\Shared\AccCompDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccCompDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccCompDeclaration extends EditRecord
{
    protected static string $resource = AccCompDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
