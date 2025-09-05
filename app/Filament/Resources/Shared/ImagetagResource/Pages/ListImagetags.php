<?php

namespace App\Filament\Resources\Shared\ImagetagResource\Pages;

use App\Filament\Resources\Shared\ImagetagResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Shared\ImagetagResource\Widgets\ImagetagStatsOverview;
use App\Filament\Resources\Shared\ImagetagResource\Widgets\ImagetagHeaderInfo;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Support\Htmlable;

class ListImagetags extends ListRecords
{
    protected static string $resource = ImagetagResource::class;


    public function getHeading(): string|Htmlable
    {
        return new HtmlString(
            '<div class="flex items-center gap-3" style="width:80%; color:#262629;">'
            . file_get_contents(resource_path('svg/altstar.svg'))
            . '
    </div>'
        );
    }

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
