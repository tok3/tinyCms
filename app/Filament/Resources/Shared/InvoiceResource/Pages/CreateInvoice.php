<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use App\Models\Company;
use App\Models\Contract;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Filament\Forms\Components\
{Select, TextInput, DatePicker, Repeater, Textarea};
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;

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
        foreach ($data['items'] as $item)
        {
            $netto += ($item['quantity'] ?? 1) * ($item['line_total_amount'] ?? 0);
        }

        $taxRate = config('accounting.tax_rate', 19);
        $tax = round($netto * ($taxRate / 100), 2);
        $brutto = $netto + $tax;

        $data['total_net'] = $netto;
        $data['tax'] = $tax;
        $data['total_gross'] = $brutto;
        $data['tax_rate'] = $taxRate;

        $data['data'] = [
            'items' => $data['items'],
        ];

        return $data;
    }

    public function getForm(string $name = null): \Filament\Forms\Form
    {
        return parent::getForm($name)->schema($this->getFormSchema());
    }

    protected function getFormSchema(): array
    {
        return [
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

            // Repeater *außerhalb* der Group
            Repeater::make('items')
                ->label('Rechnungspositionen')
                ->schema([
                    Textarea::make('description')
                        ->label('Beschreibung')
                        ->required()
                        ->columnSpan(8),

                    TextInput::make('quantity')
                        ->numeric()
                        ->default(1)
                        ->required()
                        ->columnSpan(2),

                    TextInput::make('line_total_amount')
                        ->label('Einzelpreis (Netto in EUR)')
                        ->numeric()
                        ->required()
                        ->columnSpan(2),
                ])
                ->minItems(1)
                ->columns(12)
                ->createItemButtonLabel('Position hinzufügen'),
        ];
    }

    protected function handleRecordCreation(array $data): Invoice
    {
        $invoiceService = new InvoiceService();
        $invoiceService->invoiceNumberPrefix = 'MR';

        $invoice = $invoiceService->createInvoice($data);

        // Optional: PDF generieren direkt hier
        $invoiceService->regenerateMergedPDF($invoice->invoice_number);

        // Rechnung direkt versenden, wenn der Status "sent" ist
        if ($data['status'] === 'sent') {
            $invoiceService->sendInvoiceEmail();
        }

        return $invoice;
    }


}
