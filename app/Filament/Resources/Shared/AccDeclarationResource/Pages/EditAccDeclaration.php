<?php

namespace App\Filament\Resources\Shared\AccDeclarationResource\Pages;

use App\Filament\Resources\Shared\AccDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccDeclaration extends EditRecord
{
    protected static string $resource = AccDeclarationResource::class;

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
