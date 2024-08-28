<?php

namespace App\Filament\Resources\User\PromoContentResource\Pages;

use App\Filament\Resources\User\PromoContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromoContents extends ListRecords
{
    protected static string $resource = PromoContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
         //   Actions\CreateAction::make(),
        ];
    }
}
