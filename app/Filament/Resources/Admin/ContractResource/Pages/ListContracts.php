<?php

namespace App\Filament\Resources\Admin\ContractResource\Pages;

use App\Filament\Resources\Admin\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContracts extends ListRecords
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
      //      Actions\CreateAction::make(),
        ];
    }
}
