<?php

namespace App\Filament\Resources\Shared\EztextResource\Pages;

use App\Filament\Resources\Shared\EztextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListEztexts extends ListRecords
{
    protected static string $resource = EztextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getHeading(): string|Htmlable
    {
        return new HtmlString(
            '<div class="flex items-center gap-3" style="margin-top:0.8em;width:50%;">'
            . file_get_contents(public_path('assets/img/produkte/leichte-sprache.svg'))
            . '</div>'
        );
    }

}
