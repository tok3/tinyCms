<?php

namespace App\Filament\Resources\Shared\DomainurlResource\Pages;

use App\Filament\Resources\Shared\DomainurlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDomainurl extends EditRecord
{
    protected static string $resource = DomainurlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
