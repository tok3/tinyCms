<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Dashboard\Pages\UpgradeProductPage;
use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\HtmlString;

class ListPa11yUrls extends ListRecords
{
    protected static string $resource = Pa11yUrlResource::class;

    public function getTitle(): string
    {
        return __('Firmament Urls');
    }

    protected function getHeaderActions(): array
    {
        $company = Filament::getTenant();

        if ( \Auth::user()->is_admin == 1)
        {
            $currentUrls = 0;
            $maxUrls = 1000000;

        }
        else
        {
            $currentUrls = $company->pa11yUrls()->count();
            $maxUrls = $company->max_urls;

        }

        if ($currentUrls >= $maxUrls)
        {
            // Wenn das Limit erreicht ist, zeige den Upgrade‑Button an
            return [
                Action::make('create_url')
                    ->label('Upgrade')
                    ->icon('heroicon-o-plus')
                    ->modalHeading('Limit erreicht')
                    ->modalContent(fn() => new HtmlString('Sie haben das URL-Limit von ' . $maxUrls . ' für Ihren aktuellen Plan erreicht. <br>Für Upgrade-Optionen und weitere Informationen klicken Sie auf den Button.'))
                    ->modalActions([
                        Action::make('upgrade_now')
                            ->label('Upgrade und Informationen ...')
                            ->url(UpgradeProductPage::getUrl())
                            ->openUrlInNewTab()
                            ->extraAttributes(['class' => 'ml-auto']),
                    ]),
            ];
        }

        // Sonst zeige den normalen Button an
        return [
            Action::make('create_url')
                ->label('Neue URL hinzufügen')
                ->icon('heroicon-o-plus')
                ->url(Pa11yUrlResource::getUrl('create')),
        ];
    }
}
