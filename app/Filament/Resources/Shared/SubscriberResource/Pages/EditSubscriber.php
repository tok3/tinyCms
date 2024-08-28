<?php

namespace App\Filament\Resources\Shared\SubscriberResource\Pages;

use App\Filament\Resources\Shared\SubscriberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriber extends EditRecord
{
    protected static string $resource = SubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


}
