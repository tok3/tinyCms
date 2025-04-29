<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\StaticAction;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;

use Filament\Forms\Components\Textarea;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;


    protected function getHeaderActions(): array
    {
        $record = $this->record;

        // Button anzeigen nur wenn:
        // - Rechnung nicht storniert
        // - keine ref_to_id → also keine Korrekturrechnung
        // - keine bestehende Korrekturrechnung (one-to-one reverse)
        if (
            $record->status === 'canceled' ||
            $record->ref_to_id !== null ||
            $record->correctionInvoice !== null
        ) {
            return [];
        }

        return [
            Action::make('createCorrection')
                ->label('Korrekturrechnung erstellen')
                ->icon('heroicon-o-arrow-uturn-left')
                ->form([
                    Textarea::make('correction_reason')
                        ->label('Begründung für Korrekturrechnung')
                        ->required()
                        ->rows(4),
                ])
                ->action(function (array $data) {
                    $invoiceService = new \App\Services\InvoiceService();
                    $invoiceService->createCorrectionInvoice($this->record->id, $data['correction_reason']);
                    $invoiceService->sendInvoiceEmail();
                    \Filament\Notifications\Notification::make()
                        ->title('Korrekturrechnung wurde erstellt')
                        ->success()
                        ->send();

                    // Nach Erstellung zur Korrekturrechnung weiterleiten
                    $latest = \App\Models\Invoice::latest('id')->first();

                    return redirect(InvoiceResource::getUrl('edit', ['record' => $latest->id]));
                }),
        ];
    }


    protected function getFormHeader(): array
    {
        $placeholders = [];

        // Hinweis auf existierende Korrekturrechnung
        if ($this->record->correctionInvoice) {
            $url = InvoiceResource::getUrl('edit', ['record' => $this->record->correctionInvoice->id]);
            $placeholders[] = Placeholder::make('correction_notice')
                ->label('Hinweis')
                ->content("Zu dieser Rechnung existiert eine Korrekturrechnung: [{$this->record->correctionInvoice->invoice_number}]($url)");
        }

        // Hinweis wenn selbst eine Korrekturrechnung
        if ($this->record->ref_to_id !== null && $this->record->originalInvoice) {
            $original = $this->record->originalInvoice;
            $url = InvoiceResource::getUrl('edit', ['record' => $original->id]);

            $placeholders[] = Placeholder::make('original_notice')
                ->label('Hinweis')
                ->content("Dies ist eine Korrekturrechnung zur Rechnung: [{$original->invoice_number}]($url)");
        }

        return $placeholders;
    }



    public function getTitle(): string
    {
        return 'Rechnung';
    }
    protected function getActions(): array
    {
        return [

        ];
    }
    public static function canAccess(array $parameters = []): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

}
