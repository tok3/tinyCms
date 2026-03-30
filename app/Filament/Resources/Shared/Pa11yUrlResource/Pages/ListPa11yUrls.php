<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Dashboard\Pages\UpgradeProductPage;
use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use App\Filament\Resources\CompanyResource;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Actions as FormActions;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Http\Client\Response;
use App\Http\Controllers\CrawlController;
use Illuminate\Http\Request;

class ListPa11yUrls extends ListRecords
{
    use InteractsWithActions;

    protected static string $resource = Pa11yUrlResource::class;

    public function getTitle(): string
    {
        return __('Firmament Urls');
    }

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
        $company = Filament::getTenant();

        if (\Auth::user()->is_admin == 1)
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
            return [
                Action::make('create_url')
                    ->label('URL hinzufügen')
                    ->icon('heroicon-o-squares-plus')
                    ->extraAttributes(['id' => 'addUrlButton'])
                    ->modalHeading('Limit erreicht')
                    ->modalContent(fn() => new HtmlString(
                        view('partials.upgrade-modal', [
                            'recommendedPlan' => null,
                            'coupon' => null,
                            'maxUrl' => $maxUrls,
                            'isTrial' => auth()->user()?->isTrial(),
                        ])->render()
                    ))
                    ->modalActions([
                        Action::make('upgrade_now')
                            ->label('Paket erweitern')
                            ->url(UpgradeProductPage::getUrl())
                            ->openUrlInNewTab()
                            ->extraAttributes([
                                'class' => 'ml-auto',
                                'id' => 'upgradeButton'
                            ]),
                    ]),

                // 🔥 CRAWLER BUTTON (NEU)
                Action::make('crawlSites')
                    ->label('URLs automatisch erfassen')
                    ->icon('heroicon-o-sparkles')
                    ->color('primary')
                    ->extraAttributes(['id' => 'crawlButton'])
                    ->modalHeading('Limit erreicht')
                    ->modalContent(fn() => new HtmlString(
                        view('partials.upgrade-modal', [
                            'recommendedPlan' => null,
                            'coupon' => null,
                            'maxUrl' => $maxUrls,
                            'isTrial' => auth()->user()?->isTrial(),
                        ])->render()
                    ))
                    ->modalActions([
                        Action::make('upgrade_now')
                            ->label('Paket erweitern')
                            ->url(UpgradeProductPage::getUrl())
                            ->openUrlInNewTab()
                            ->extraAttributes([
                                'class' => 'ml-auto',
                                'id' => 'upgradeButton'
                            ]),
                    ]),
            ];
        }
        if (\Auth::user()->is_admin != 1)
        {
            return [
                Action::make('create_url')
                    ->label('URL hinzufügen')
                    ->icon('heroicon-o-squares-plus')
                    ->url(Pa11yUrlResource::getUrl('create'))
                    ->extraAttributes(['id' => 'addUrlButton']),

                Action::make('crawlSites')
                    ->label('URLs automatisch erfassen')
                    ->icon('heroicon-o-sparkles')
                    ->color('primary')
                    ->form(fn(Form $form): array => $this->getCrawlFormSchema($form))
                    ->action(function (array $data) {
                        $this->startCrawling($data);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Automatische URL-Erfassung starten')
                    ->ModalIcon('heroicon-o-sparkles')
                    ->modalDescription('
                                        Geben Sie hier Ihre Domain ein.
                                        Dir URLs dieser Domain werden automatisch erfasst und regelmäßig überwacht.

                                        Die Anzahl der URLs richtet sich nach Ihrem aktuellen Limit.
                                        ')

                    ->modalSubmitActionLabel('Erfassung starten')
                    ->extraAttributes(['id' => 'crawlButton']),

            ];
        }

        if (\Auth::user()->is_admin == 1)
        {
            return [
                Action::make('create_url')
                    ->label('URL hinzufügen')
                    ->icon('icon-feature-2')
                    ->url(Pa11yUrlResource::getUrl('create'))
                    ->extraAttributes(['id' => 'addUrlButton']),
            ];
        }
    }

    public function getCrawlFormSchema(Form $form): array
    {
        return [
            TextInput::make('domain')
                ->label('Domain')
                ->required()
                ->placeholder('https://ihre-domain.de')
                ->maxLength(255)
                ->url(), // Validates as URL
            //->prefix('https://'),
            /* TextInput::make('maxPages')
                 ->label('Max Pages')
                 ->required()
                 ->numeric()
                 ->minValue(1)
                 ->maxValue(1000) // Adjust limit as needed
                 ->default(10),
                 */
        ];
    }

    protected function startCrawling(array $data): void
    {
        // Get current tenant/company ID (adjust based on your multi-tenancy setup)
        //$companyId = $this->getTenant()?->id ?? auth()->user()->active_company_id; // Example; customize
        $companyId = Filament::getTenant(); //?? auth()->user()->active_company_id; // Example; customize
        //\Log::info($companyId->id); die();
        // Call CrawlController@startCrawl via POST
        /*$response = \Illuminate\Support\Facades\Http::post(route('start.crawl'), [
            'domain' => $data['domain'],
            'id' => $companyId->id,
            //'maxPages' => (int) $data['maxPages'],
        ]);
        */

        // Direct controller call
        $controller = new CrawlController();
        $request = new Request([
            'domain' => $data['domain'],
            'id' => $companyId->id,
            //'maxPages' => $data['maxPages'],

        ]);
        $response = $controller->startCrawl($request);

        if ($response['status'] == 'ok')
        {
            // Success notification (info field/modal)
            Notification::make()
                ->title('Crawler gestarted')
                ->body('Crawling initiert für ' . $data['domain'] . '  Der Vorgang kann einige Minuten dauern. Bitte laden Sie dann diese Seite erneut.')
                ->success()
                ->send();
        }
        else
        {
            // Error notification
            \Log::error('Fehler beim Crawlen: ' . $response['data'] . ' Company: ' . $companyId . ' Domain: ' . $data['domain']);
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: ' . $response['data'])
                ->danger()
                ->send();
        }
    }


}
