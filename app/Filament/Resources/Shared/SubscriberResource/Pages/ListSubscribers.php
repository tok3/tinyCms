<?php

namespace App\Filament\Resources\Shared\SubscriberResource\Pages;

use App\Filament\Resources\Shared\SubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubscribers extends ListRecords
{
    protected static string $resource = SubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
    //        Actions\CreateAction::make(),
        ];
    }
}
