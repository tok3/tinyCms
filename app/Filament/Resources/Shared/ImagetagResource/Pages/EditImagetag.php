<?php

namespace App\Filament\Resources\Shared\ImagetagResource\Pages;

use App\Filament\Resources\Shared\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImagetag extends EditRecord
{
    protected static string $resource = ImagetagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            //Actions\DeleteAction::make(),
        ];
    }
}
