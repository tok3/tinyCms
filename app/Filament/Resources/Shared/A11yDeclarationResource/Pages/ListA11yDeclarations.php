<?php

namespace App\Filament\Resources\Shared\A11yDeclarationResource\Pages;

use App\Filament\Resources\Shared\A11yDeclarationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListA11yDeclarations extends ListRecords
{
    protected static string $resource = A11yDeclarationResource::class;

    protected function getHeaderActions(): array
    {
        if (auth()->user()->is_admin) {
            return []; // Admin sieht keinen Create-Button
        }

        return [
            Actions\CreateAction::make(),
        ];
    }
}
