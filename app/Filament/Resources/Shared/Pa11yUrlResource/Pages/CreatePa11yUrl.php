<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions; // 🔥 DAS FEHLT BEI DIR
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class CreatePa11yUrl extends CreateRecord
{
    protected static string $resource = Pa11yUrlResource::class;

    public function getHeading(): string|Htmlable
    {
        return new HtmlString(
            '<div class="flex items-center gap-3" style="margin-top:0.8em;width:50%; color:#262629;">'
            . file_get_contents(public_path('assets/css/svgs/firmament-logo.svg'))
            . '</div>'
        );
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('create')
                ->label('Speichern')
                ->submit('create'),

            Actions\Action::make('back')
                ->label('Zur Übersicht')
                ->url(Pa11yUrlResource::getUrl('index'))
                ->color('gray'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return Pa11yUrlResource::getUrl('index');
    }

}
