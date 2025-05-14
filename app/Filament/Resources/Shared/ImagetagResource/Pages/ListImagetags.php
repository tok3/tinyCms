<?php

namespace App\Filament\Resources\Shared\ImagetagResource\Pages;

use App\Filament\Resources\Shared\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Shared\ImagetagResource\Widgets\ImagetagStatsOverview;

class ListImagetags extends ListRecords
{
    protected static string $resource = ImagetagResource::class;



    protected function getHeaderWidgets(): array
    {
        return [
            ImagetagStatsOverview::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
