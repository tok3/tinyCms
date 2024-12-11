<?php

namespace App\Filament\Resources\Shared\DomainurlResource\Pages;

use App\Filament\Resources\Shared\DomainurlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDomainurls extends ListRecords
{
    protected static string $resource = DomainurlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
