<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Actions\Action as FormAction;
use Filament\Actions\StaticAction;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use App\Forms\Components\InfoBox;
use Illuminate\Support\HtmlString;
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

    public function getForm(string $name): ?\Filament\Forms\Form
    {
        return parent::getForm($name)->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return [

            InfoBox::make()
                ->type('info')
                ->content(function ($record) {
                    if (!$record) {
                        return null;
                    }

                    if ($record->correctionInvoice) {
                        $url = \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $record->correctionInvoice->id]);
                        return "<b>Hinweis</b><br>Zu dieser Rechnung existiert eine Korrekturrechnung: <a href=\"{$url}\" class=\"underline\">{$record->correctionInvoice->invoice_number}</a>";
                    }

                    if ($record->ref_to_id !== null && $record->originalInvoice) {
                        $url = \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $record->originalInvoice->id]);
                        return "<b>Hinweis</b><br>Dies ist eine Korrekturrechnung zur Rechnung: <a href=\"{$url}\" class=\"underline\">{$record->originalInvoice->invoice_number}</a><br>Begründung: {$record->data['correction_reason']}";
                    }

                    return null;
                })
                ->visible(fn($record) => $record && ($record->correctionInvoice || $record->ref_to_id !== null)),

            Card::make([
                Group::make([
                    TextInput::make('invoice_number')->label('Rechnungsnummer')->disabled(),
                    TextInput::make('company_id')->label('Kunden-ID')->disabled(),
                    TextInput::make('mollie_payment_id')->label('Mollie Payment ID')->disabled()
                        ->visible(fn($record) => !empty($record?->mollie_payment_id)),
                ])->columns(3)->label('Rechnungsinformationen'),
            ]),

            Card::make([
                Group::make([
                    DatePicker::make('issue_date')->label('Rechnungsdatum')->disabled(),
                    DatePicker::make('due_date')->label('Fälligkeitsdatum')->disabled(),
                    DatePicker::make('payment_date')->label('Zahlungsdatum')->disabled()
                        ->visible(fn($record) => !empty($record?->payment_date)),
                ])->columns(3)->label('Datum'),
            ]),

            Card::make([
                Group::make([
                    TextInput::make('total_net')->label('Nettobetrag')->disabled(),
                    TextInput::make('tax')->label('MwSt.')->disabled(),
                    TextInput::make('total_gross')->label('Bruttobetrag')->formatStateUsing(fn($state) => number_format($state, 2, ',', '.') . ' €')->disabled(),
                    TextInput::make('tax_rate')->label('Steuersatz')->disabled(),
                    TextInput::make('currency')->label('Währung')->disabled(),
                ])->columns(5)->label('Beträge'),
            ]),

            Card::make([
                Textarea::make('payment_terms')->label('Zahlungsbedingungen')->disabled(),
                Textarea::make('data')->label('Zusätzliche Daten')->disabled()
                    ->formatStateUsing(function ($state, $record) {
                        $output = '';
                        if (isset($record->data['items'])) {
                            foreach ($record->data['items'] as $item) {
                                $output .= "- {$item['description']} ({$item['quantity']} × " .
                                    number_format((float)$item['line_total_amount'], 2, ',', '.') . " €)\n";
                            }
                        }
                        return $output;
                    }),
            ])->label('Zusätzliche Informationen'),

            Card::make([
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Entwurf',
                        'sent' => 'Gesendet',
                        'paid' => 'Bezahlt',
                        'canceled' => 'Storniert',
                    ])
                    ->disabled(),
            ])->label('Rechnungsstatus'),
            InfoBox::make()
                ->type('primary')
                ->content(function ($record) {
                    if (!$record) {
                        return null;
                    }

                    $logs = $record->sendLogs()->orderByDesc('created_at')->get();

                    if ($logs->isEmpty()) {
                        return 'Keine Versandprotokolle vorhanden.';
                    }

                    $rows = $logs->map(function ($log) {
                        return "<tr>
                        <td class='border px-2 py-1'>" . $log->created_at->format('d.m.Y H:i') . "</td>
                        <td class='border px-2 py-1'>" . e($log->receiver) . "</td>
                        <td class='border px-2 py-1'>" . e($log->status) . "</td>
                    </tr>";
                    })->implode('');

                    return new HtmlString("
            <table class='text-sm border border-gray-200 mt-2'>
                <thead>
                    <tr class='bg-gray-100'>
                        <th class='border px-2 py-1 text-left'>Gesendet am</th>
                        <th class='border px-2 py-1 text-left'>Empfänger</th>
                        <th class='border px-2 py-1 text-left'>Status</th>
                    </tr>
                </thead>
                <tbody>{$rows}</tbody>
            </table>
        ");
                })
                ->visible(fn($record) => $record !== null && $record->sendLogs()->count() > 0)
        ];
    }

}
