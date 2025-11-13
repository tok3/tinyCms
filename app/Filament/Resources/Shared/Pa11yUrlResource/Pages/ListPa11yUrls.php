<?php

namespace App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

use App\Filament\Dashboard\Pages\UpgradeProductPage;
use App\Filament\Resources\Shared\Pa11yUrlResource;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
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
                    ->label('Neue URL hinzufügen')
                    ->icon('heroicon-o-sparkles')
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
        if(\Auth::user()->is_admin != 1){
        // Sonst zeige den normalen Button an
        return [
            Action::make('create_url')
                ->label('Neue URL hinzufügen')
                ->icon('icon-feature-2')
                ->url(Pa11yUrlResource::getUrl('create')),
            Action::make('crawlSites')
                ->label('Domain crawlen')
                ->icon('heroicon-o-squares-plus') // Optional: Use a relevant icon
                ->color('primary')
                ->form(fn (Form $form): array => $this->getCrawlFormSchema($form))
                ->action(function (array $data) {
                    $this->startCrawling($data);
                })
                ->requiresConfirmation() // Optional: Add confirmation before crawling
                ->modalHeading('Site Crawler starten')
                ->modalDescription('Domainnamen eingeben.')
                ->modalSubmitActionLabel('Crawler starten'),

        ];
        }
        if(\Auth::user()->is_admin == 1){
            return [
                Action::make('create_url')
                    ->label('Neue URL hinzufügen')
                    ->icon('icon-feature-2')
                    ->url(Pa11yUrlResource::getUrl('create')),
            ];
        }
    }
    public function getCrawlFormSchema(Form $form): array
    {
        return [
            TextInput::make('domain')
                ->label('Domain')
                ->required()
                ->placeholder('https://example.com')
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

        if ($response['status'] == 'ok') {
            // Success notification (info field/modal)
            Notification::make()
                ->title('Crawler gestarted')
                ->body('Crawling initiert für ' . $data['domain'] . '  Der Vorgang kann einige Minuten dauern. Bitte laden Sie dann diese Seite erneut.')
                ->success()
                ->send();
        } else {
            // Error notification
            \Log::error('Fehler beim Crawlen: ' . $response['data'].' Company: '.$companyId.' Domain: '.$data['domain']);
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: ' . $response['data'])
                ->danger()
                ->send();
        }
    }


}
