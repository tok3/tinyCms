<?php

namespace App\Filament\Resources\Admin\MolliePaymentResource\Pages;

use App\Filament\Resources\Admin\MolliePaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMolliePayments extends ListRecords
{
    protected static string $resource = MolliePaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
