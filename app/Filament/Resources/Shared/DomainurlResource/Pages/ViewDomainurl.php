<?php

namespace App\Filament\Resources\Shared\DomainurlResource\Pages;

use App\Filament\Resources\Shared\DomainurlResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDomainurl extends ViewRecord
{
    protected static string $resource = DomainurlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
