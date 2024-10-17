<?php

namespace App\Filament\Resources\Admin\MollieSubscriptionResource\Pages;

use App\Filament\Resources\Admin\MollieSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMollieSubscriptions extends ListRecords
{
    protected static string $resource = MollieSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
