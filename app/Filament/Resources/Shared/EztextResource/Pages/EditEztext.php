<?php

namespace App\Filament\Resources\Shared\EztextResource\Pages;

use App\Filament\Resources\Shared\EztextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEztext extends EditRecord
{
    protected static string $resource = EztextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            //Actions\DeleteAction::make(),
        ];
    }
}
