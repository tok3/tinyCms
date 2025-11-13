<?php

namespace App\Filament\Resources\Shared\CompanyResource\Pages;

use App\Filament\Resources\Shared\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Livewire\Attributes\On;
use Filament\Notifications\Notification;
use App\Http\Controllers\CrawlController;
use Illuminate\Http\Request;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;



    public function getTitle(): string
    {
        return 'Firmendaten bearbeiten ';
    }
    protected function getHeaderActions(): array
    {
        if (auth()->user()->is_admin != 1)
        {

            return []; // no actions when user not is admin to prevent tenants from deleting itself

        }

        return [


            Actions\DeleteAction::make(),

            ];
    }

     protected function getFormActions(): array
    {
        return [
            Actions\Action::make('crawlSites')
                ->label('Domain crawlen')
                ->icon('heroicon-o-squares-plus')
                ->color('primary')
                ->form([
                    \Filament\Forms\Components\TextInput::make('domain')
                        ->label('Domain')
                        ->required()
                        ->placeholder('https://example.com')
                        ->maxLength(255)
                        ->url(),
                ])
                ->action(function (array $data): void {
                    $companyId = $this->record->id;
                    static::startCrawling($data, $companyId);
                })
                ->modalHeading('Site Crawler starten')
                ->modalDescription('Domainnamen eingeben.')
                ->modalSubmitActionLabel('Crawler starten'),
        ];
    }

    protected static function startCrawling(array $data, ?int $companyId): void
    {
        if (!$companyId) {
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: Kein Unternehmen ausgewählt.')
                ->danger()
                ->send();
            return;
        }

        // Generate unique crawl ID
        $crawlId = 'crawl_' . $companyId . '_' . now()->timestamp;

        // Direct controller call
        $controller = new CrawlController();
        $request = new Request([
            'id' => $companyId,
            'domain' => $data['domain'],
            //'id' => $crawlId,
            // 'maxPages' => $data['maxPages'] ?? 10, // Uncomment if maxPages enabled
        ]);

        try {
            $response = $controller->startCrawl($request);

            if ($response['status'] === 'ok') {
                Notification::make()
                    ->title('Crawler gestartet')
                    ->body('Crawling initiiert für ' . $data['domain'] . '. Der Vorgang kann einige Minuten dauern. Bitte laden Sie dann diese Seite erneut.')
                    ->success()
                    ->send();
            } else {
                \Log::error('Fehler beim Crawlen: ' . $response['data'] . ' Company: ' . $companyId . ' Domain: ' . $data['domain']);
                Notification::make()
                    ->title('Crawl Fehler')
                    ->body('Fehler: ' . $response['data'])
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            \Log::error('Exception beim Crawlen: ' . $e->getMessage() . ' Company: ' . $companyId . ' Domain: ' . $data['domain']);
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }



}
