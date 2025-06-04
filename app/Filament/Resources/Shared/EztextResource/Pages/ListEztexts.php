<?php

namespace App\Filament\Resources\Shared\EztextResource\Pages;

use App\Filament\Resources\Shared\EztextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEztexts extends ListRecords
{
    protected static string $resource = EztextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
