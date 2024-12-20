<?php

namespace App\Filament\Resources\Admin\ReferrerResource\Pages;

use App\Filament\Resources\Admin\ReferrerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReferrer extends EditRecord
{
    protected static string $resource = ReferrerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
