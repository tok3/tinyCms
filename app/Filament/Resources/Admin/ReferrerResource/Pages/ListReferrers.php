<?php

namespace App\Filament\Resources\Admin\ReferrerResource\Pages;

use App\Filament\Resources\Admin\ReferrerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReferrers extends ListRecords
{
    protected static string $resource = ReferrerResource::class;

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\CreateAction::make(),
        ];
    }
}
