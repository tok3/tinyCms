<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPa11yUrls extends ListRecords
{
    protected static string $resource = Pa11yUrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
