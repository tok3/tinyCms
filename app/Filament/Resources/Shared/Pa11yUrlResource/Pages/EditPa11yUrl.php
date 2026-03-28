<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class EditPa11yUrl extends EditRecord
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
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),

            Actions\DeleteAction::make()
                ->modalHeading('URL entfernen')
                ->modalDescription('Möchten Sie diese URL wirklich aus dem Monitoring entfernen?')
                ->modalSubmitActionLabel('Entfernen')
                ->modalCancelActionLabel('Zurück'),
        ];
    }
    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Speichern');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Zur Übersicht')
            ->url(Pa11yUrlResource::getUrl('index'));
    }
}
