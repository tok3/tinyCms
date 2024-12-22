<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPa11yUrl extends EditRecord
{
    protected static string $resource = Pa11yUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
