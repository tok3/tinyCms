<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'MR'; // MR = Manuelle Rechnung
        $data['currency'] = 'EUR';
        $data['status'] = $data['status'] ?? 'sent';

        // Summen berechnen
        $netto = 0;
        foreach ($data['items'] as $item) {
            $netto += ($item['quantity'] ?? 1) * ($item['line_total_amount'] ?? 0);
        }

        // Steuer prüfen
        $taxRate = config('accounting.tax_rate', 19);
        if (!empty($data['no_vat'])) {
            $taxRate = 0;
            $data['noVat'] = 'Innergemeinschaftliche Dienstleistung gemäß § 3a Abs. 2 UStG – Steuerschuldnerschaft des Leistungsempfängers (§ 13b UStG).
<small style="color:#3b3a3b;font-style: italic;">VAT reverse charge – customer liable under Art. 196 EU VAT Directive.</small>
USt-IdNr. des Kunden: <b>' . $data['vat_id'] . '</b>';
        }

        $tax = round($netto * ($taxRate / 100), 2);
        $brutto = $netto + $tax;

        $data['total_net'] = $netto;
        $data['tax'] = $tax;
        $data['total_gross'] = $brutto;
        $data['tax_rate'] = $taxRate;

        $data['data'] = array_filter([
            'items' => $data['items'],
            'noVat' => $data['noVat'] ?? null,
        ]);

        return $data;
    }



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(5)
                    ->schema([
                        Select::make('company_id')
                            ->label('Firma')
                            ->relationship('company', 'name')
                            ->required(),
                        DatePicker::make('due_date')
                            ->label('Fällig am')
                            ->default(now()->addWeekdays(10)),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Ausstehend',
                                'sent' => 'Gesendet',
                                'paid' => 'Bezahlt',
                                'canceled' => 'Storniert',
                            ])
                            ->default('pending'),
                    ]),
                Grid::make(2)->schema([
                    Checkbox::make('no_vat')
                        ->label('Steuerbefreit (innergemeinschaftliche Leistung)')
                        ->columnSpan(8)
                        ->reactive(),

                    Group::make([
                        TextInput::make('vat_id')
                            ->label('USt-IdNr. des Kunden')
                            ->columnSpan(1)
                            ->placeholder('z. B. FR123456789')
                            ->required(fn ($get) => $get('no_vat'))
                            ->visible(fn ($get) => $get('no_vat')),

                    ]),
                ]),

                Repeater::make('items')
                    ->label('Rechnungspositionen')
                    ->schema([
                        Grid::make(12)->schema([
                            Textarea::make('description')
                                ->label('Beschreibung')
                                ->required()
                                ->columnSpan(8),

                            TextInput::make('quantity')
                                ->label('Menge')
                                ->numeric()
                                ->default(1)
                                ->required()
                                ->columnSpan(2),

                            TextInput::make('line_total_amount')
                                ->label('Einzelpreis (Netto in EUR)')
                                ->numeric()
                                ->required()
                                ->columnSpan(2),
                        ]),
                    ])
                    ->minItems(1)
                    ->reorderable()
                    ->createItemButtonLabel('Position hinzufügen'),
            ]);
    }

    protected function handleRecordCreation(array $data): Invoice
    {
        $invoiceService = new InvoiceService();
        $invoiceService->invoiceNumberPrefix = 'MR';

        $invoice = $invoiceService->createInvoice($data);

        // Optional: PDF generieren direkt hier
        $invoiceService->regenerateMergedPDF($invoice->invoice_number);

        // Rechnung direkt versenden, wenn der Status "sent" ist
        if ($data['status'] === 'sent')
        {
            $invoiceService->sendInvoiceEmail();
        }

        return $invoice;
    }


}
