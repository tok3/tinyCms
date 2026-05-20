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
        $items = [];
        foreach ($data['items'] as $index => $item) {
            $quantity = (float) ($item['quantity'] ?? 1);
            $amount = round((float) ($item['line_total_amount'] ?? 0), 2);
            $discountPercent = round((float) ($item['discount_percent'] ?? 0), 2);

            if ($index === 0 && $amount < 0) {
                $amount = abs($amount);
            }

            $item['line_total_amount'] = $amount;
            unset($item['discount_percent']);

            $items[] = $item;
            $netto += $quantity * $amount;

            if ($discountPercent > 0) {
                $discountAmount = round($quantity * $amount * ($discountPercent / 100), 2);

                if ($discountAmount > 0) {
                    $items[] = [
                        'description' => 'Rabatt ' . rtrim(rtrim(number_format($discountPercent, 2, ',', ''), '0'), ',') . '% auf ' . ($item['description'] ?? 'Position'),
                        'quantity' => 1,
                        'line_total_amount' => -$discountAmount,
                    ];

                    $netto -= $discountAmount;
                }
            }
        }

        // Steuer prüfen
        $taxRate = config('accounting.tax_rate', 19);
        if (!empty($data['no_vat'])) {
            $taxRate = 0;
            $data['noVat'] = 'Innergemeinschaftliche Dienstleistung gemäß § 3a Abs. 2 UStG – Steuerschuldnerschaft des Leistungsempfängers (§ 13b UStG).
<small style="color:#3b3a3b;font-style: italic;">VAT reverse charge – customer liable under Art. 196 EU VAT Directive.</small>
USt-IdNr. des Kunden: <b>' . $data['vat_id'] . '</b>';
        }

        $netto = round($netto, 2);
        $tax = round($netto * ($taxRate / 100), 2);
        $brutto = round($netto + $tax, 2);

        $data['total_net'] = $netto;
        $data['tax'] = $tax;
        $data['total_gross'] = $brutto;
        $data['tax_rate'] = $taxRate;

        $data['data'] = array_filter([
            'items' => $items,
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
                            ->searchable()
                            ->preload()
                            ->options(fn(): array => Company::query()
                                ->orderBy('name')
                                ->limit(50)
                                ->get()
                                ->mapWithKeys(fn(Company $company) => [
                                    $company->id => static::formatCompanyOptionLabel($company),
                                ])
                                ->toArray())
                            ->getSearchResultsUsing(fn(string $search): array => Company::query()
                                ->where(function ($query) use ($search) {
                                    $query
                                        ->where('name', 'like', "%{$search}%")
                                        ->orWhere('name_2', 'like', "%{$search}%")
                                        ->orWhere('kd_nr', 'like', "%{$search}%")
                                        ->orWhere('ort', 'like', "%{$search}%")
                                        ->orWhere('plz', 'like', "%{$search}%")
                                        ->orWhere('email', 'like', "%{$search}%");
                                })
                                ->orderBy('name')
                                ->limit(50)
                                ->get()
                                ->mapWithKeys(fn(Company $company) => [
                                    $company->id => static::formatCompanyOptionLabel($company),
                                ])
                                ->toArray())
                            ->getOptionLabelUsing(fn($value): ?string => ($company = Company::find($value))
                                ? static::formatCompanyOptionLabel($company)
                                : null)
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
                                ->rules([
                                    fn() => function (string $attribute, $value, \Closure $fail) {
                                        preg_match('/items\.(\d+)\.line_total_amount/', $attribute, $matches);

                                        if (($matches[1] ?? null) === '0' && (float) $value < 0) {
                                            $fail('Die erste Rechnungsposition muss positiv sein.');
                                        }
                                    },
                                ])
                                ->required()
                                ->columnSpan(1),

                            TextInput::make('discount_percent')
                                ->label('Rabatt %')
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(100)
                                ->default(0)
                                ->suffix('%')
                                ->columnSpan(1),
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

    protected static function formatCompanyOptionLabel(Company $company): string
    {
        return collect([
            $company->kd_nr ? "Kd-Nr. {$company->kd_nr}" : null,
            $company->name,
            $company->name_2,
            trim(($company->plz ? "{$company->plz} " : '') . ($company->ort ?? '')) ?: null,
            $company->email,
        ])
            ->filter()
            ->implode(' | ');
    }


}
