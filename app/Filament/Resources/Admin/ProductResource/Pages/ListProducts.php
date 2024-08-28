<?php
namespace App\Filament\Resources\Admin\ProductResource\Pages;

use App\Filament\Resources\Admin\ProductResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\CreateAction;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
