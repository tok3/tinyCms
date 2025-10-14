<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\InvoiceResource\Pages;
use App\Filament\Resources\Shared\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Carbon\Carbon;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Placeholder;
use App\Forms\Components\InfoBox;
use App\Helpers\CompanyHelper;
use Filament\Tables\Columns\TextColumn;
class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Navigation Label ändern
    public static function getNavigationLabel(): string
    {

        return 'Rechnungen'; // Name des Navigationseintrags
    }
    public static function getPluralModelLabel(): string
    {

        return 'Rechnungen';
    }
    // Navigation Group ändern
//    public static function getNavigationGroup(): ?string
//    {
//        return 'Finanzen'; // Name der Gruppe, in der der Eintrag erscheint
//    }

    public static function shouldRegisterNavigation(): bool
    {
        $company = CompanyHelper::currentCompany();

        // Wenn die Firma über eine Agentur gemanaged wird → nicht in der Sidebar zeigen
        if ($company && $company->billing_via_agency) {
            return false;
        }

        return true;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function form(Form $form): Form
    {



        //return $form->schema([]); // leer lassen

        return $form
            ->schema([
                InfoBox::make()
                    ->type('info')
                    ->content(function ($record) {
                        if (!$record) {
                            return null;
                        }

                        if ($record->correctionInvoice)
                        {
                            $url = \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $record->correctionInvoice->id]);

                            return "<b>Hinweis</b><br>Zu dieser Rechnung existiert eine Korrekturrechnung: <a href=\"{$url}\" class=\"underline\">{$record->correctionInvoice->invoice_number}</a>";
                        }

                        if ($record->ref_to_id !== null && $record->originalInvoice)
                        {
                            $url = \App\Filament\Resources\Shared\InvoiceResource::getUrl('edit', ['record' => $record->originalInvoice->id]);


                            return "<b>Hinweis</b><br>Dies ist eine Korrekturrechnung zur Rechnung: <a href=\"{$url}\" class=\"underline\">{$record->originalInvoice->invoice_number}</a><br>Begründung: {$record->data['correction_reason']}";
                        }

                        return null; // Keine Infobox anzeigen, wenn nichts zutrifft
                    })
                    ->visible(function ($record) {
                        if (!$record) {
                            return null;
                        }

                        return $record->correctionInvoice || $record->ref_to_id !== null;
                    }),
                Card::make([
                    Group::make([
                        TextInput::make('invoice_number')
                            ->label('Rechnungsnummer')
                            ->disabled(),
                        TextInput::make('company_id')
                            ->label('Kunden-ID')
                            ->disabled(),
                        TextInput::make('mollie_payment_id')
                            ->label('Mollie Payment ID')
                            ->disabled()
                            ->visible(fn($record) => !empty($record?->mollie_payment_id)),
                    ])->columns(3)
                        ->label('Rechnungsinformationen'),
                ]),

                Card::make([
                    Group::make([
                        DatePicker::make('issue_date')
                            ->label('Rechnungsdatum')
                            ->disabled(),
                        DatePicker::make('due_date')
                            ->label('Fälligkeitsdatum')
                            ->disabled(),
                        DatePicker::make('payment_date')
                            ->label('Zahlungsdatum')
                            ->disabled()
                            ->visible(fn($record) => !empty($record?->payment_date)),
                    ])->columns(3)
                        ->label('Datum'),
                ]),

                Card::make([
                    Group::make([
                        TextInput::make('total_net')
                            ->label('Nettobetrag')
                            ->disabled(),
                        TextInput::make('tax')
                            ->label('MwSt.')
                            ->disabled(),
                        TextInput::make('total_gross')
                            ->label('Bruttobetrag')
                            ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.') . ' €')
                            ->disabled(),
                        TextInput::make('tax_rate')
                            ->label('Steuersatz')
                            ->disabled(),
                        TextInput::make('currency')
                            ->label('Währung')
                            ->disabled(),
                    ])->columns(5)
                        ->label('Beträge'),
                ]),

                Card::make([

                    Textarea::make('data')
                        ->label('Zusätzliche Daten')
                        ->disabled()
                        ->formatStateUsing(function ($state, $record) {
                            $output = '';

                            if (isset($record->data['items']))
                            {
                                foreach ($record->data['items'] as $item)
                                {
                                    $output .= "- {$item['description']} ({$item['quantity']} × " .
                                        number_format((float)$item['line_total_amount'], 2, ',', '.') . " €)\n";
                                }
                            }


                            return $output;
                        }),
                ])->label('Zusätzliche Informationen'),


                Card::make([
                    Group::make([
                        DatePicker::make('payment_date')
                            ->label('Zahlungseingang')
                            ->reactive() // macht das Feld „Livewire-reaktiv“
                            ->afterStateUpdated(function (string $state, callable $set) {
                                // $state ist der neue Carbon-/Date-String
                                // hier entscheiden wir, welche Option ausgewählt wird
                                $date = \Carbon\Carbon::parse($state);

                                if ($date->isPast()) {
                                    // wenn Datum in der Vergangenheit → Option "abgelaufen"
                                    $set('status', 'done');
                                } else {
                                    // sonst → Option "pending"
                                    $set('status', 'done');
                                }
                            }),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Entwurf',
                                'sent' => 'Gesendet',
                                'paid' => 'Bezahlt',
                                'canceled' => 'Storniert',
                            ])
                            // optional: damit Live-Updates direkt im UI zu sehen sind
                            ->reactive(),
                    ])->columns(3)
                        ->label('Rechnungsinformationen'),
                ]),

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
                <td class='border px-2 py-1 text-sm'>" . $log->created_at->format('d.m.Y H:i') . "</td>
                <td class='border px-2 py-1 text-sm'>" . e($log->receiver) . "</td>
                <td class='border px-2 py-1 text-sm'>" . e($log->status) . "</td>
            </tr>";
                        })->implode('');

                        return new \Illuminate\Support\HtmlString("
            <table class='border w-full mt-2'>
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
                    ->visible(fn($record) => $record && $record->sendLogs()->count() > 0),
                \Filament\Forms\Components\Card::make()
                    ->schema([

                        \Filament\Forms\Components\Actions::make([
                            \Filament\Forms\Components\Actions\Action::make('resend_invoice')
                                ->label('Rechnung erneut senden')
                                ->icon('heroicon-o-paper-airplane')
                                ->modalHeading('Rechnung erneut senden')
                                ->form([
                                    TextInput::make('receiver')
                                        ->label('Empfängeradresse')
                                        ->email()
                                        ->required()
                                        ->default(fn($record) => $record?->company?->email),
                                ])
                                ->action(function (array $data, $record): void {
                                    $receiver = $data['receiver'];
                                    $invoice = $record;
                                    $service = new InvoiceService();

                                   $service->sendInvoiceEmail($invoice->id, $receiver);
                                }),
                        ]),
                    ])
                    ->visible(fn($record) => $record !== null)
            ]);
    }

    public static function view(View $view): View
    {
        return $view
            ->schema([
                // Anzeige der Rechnungsnummer
                ViewField::make('invoice_number')
                    ->label('Rechnungsnummer'),

                ViewField::make('company_id')
                    ->label('Kunden-ID'),

                ViewField::make('mollie_payment_id')
                    ->label('Mollie Payment ID')
                    ->visible(fn($record) => !empty($record->mollie_payment_id)), // nur wenn vorhanden

                ViewField::make('issue_date')
                    ->label('Rechnungsdatum'),

                ViewField::make('due_date')
                    ->label('Fälligkeitsdatum'),

                ViewField::make('payment_date')
                    ->label('Zahlungsdatum')
                    ->visible(fn($record) => !empty($record->payment_date)),

                ViewField::make('total_net')
                    ->label('Nettobetrag')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.') . ' €'),

                ViewField::make('tax')
                    ->label('MwSt.')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.') . ' €'),

                ViewField::make('total_gross')
                    ->label('Bruttobetrag')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.') . ' €'),

                ViewField::make('tax_rate')
                    ->label('Steuersatz')
                    ->formatStateUsing(fn($state) => $state . ' %'),

                ViewField::make('currency')
                    ->label('Währung'),

                ViewField::make('payment_terms')
                    ->label('Zahlungsbedingungen'),

                ViewField::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => ucfirst($state)),

                ViewField::make('data')
                    ->label('Zusätzliche Daten')
                    ->visible(fn($record) => !empty($record->data)),

                ViewField::make('pdf_path')
                    ->label('Pfad zum PDF')
                    ->url(fn($record) => Storage::url($record->pdf_path))
                    ->visible(fn($record) => !empty($record->pdf_path)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label('id')
                    ->searchable()
                    ->sortable()
                    ->visible(fn() => auth()->user()->is_admin),
                Tables\Columns\TextColumn::make('company.kd_nr')
                    ->label('Kd-Nr.')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('Rg-Nr')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('billed_for_company_name')
                    ->label('Rechnung für')
                    ->state(fn ($record) => data_get($record->data, 'meta.billed_for_company_name') ?: '-')
                    ->searchable(query: function ($query, string $search) {
                        return $query->where('data->meta->billed_for_company_name', 'like', "%{$search}%");
                    })
                    ->visible(fn () => CompanyHelper::currentCompany()?->is_agency)
                    ->sortable(false)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->searchable()
                    ->sortable()
                    ->visible(fn() => auth()->user()->is_admin),
                Tables\Columns\TextColumn::make('company.plz')
                    ->label('Plz')
                    ->searchable()
                    ->sortable()
                    ->visible(fn() => auth()->user()->is_admin),
                Tables\Columns\TextColumn::make('company.ort')
                    ->label('Ort')
                    ->searchable()
                    ->sortable()
                    ->visible(fn() => auth()->user()->is_admin),
                Tables\Columns\TextColumn::make('total_gross')
                    ->label('Betrag')
                    ->formatStateUsing(fn(string $state) => number_format($state, 2, ',', '.') . ' €')
                    ->color(fn(string $state) => $state < 0 ? 'danger' : 'primary') // Hier färben wir rot, wenn negativ
                    ->alignEnd()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->icon(fn(Invoice $record) => match (true)
                    {

                        // Bezahlt oder Korrekturrechnung → grüner Check
                        $record->status === 'paid', $record->ref_to_id !== null => 'heroicon-o-check-circle',

                        // Offen, Fälligkeitsdatum in der Zukunft → blaue Uhr
                        $record->status === 'sent' && $record->due_date && now()->lessThan($record->due_date) => 'heroicon-o-clock',

                        // Offen, Fälligkeitsdatum überschritten, keine Zahlung → rotes Warnsymbol
                        $record->status === 'sent' && (
                            !$record->payment_date || now()->greaterThan($record->due_date)
                        ) => 'heroicon-o-exclamation-triangle',


                        // Standard fallback
                        default => 'heroicon-o-document-text',
                    })
                    ->color(fn(Invoice $record) => match (true)
                    {
                        $record->status === 'paid', $record->ref_to_id !== null => 'success',
                        $record->status === 'sent' && $record->due_date && now()->lessThan($record->due_date) => 'info',
                        $record->status === 'sent' && (
                            !$record->payment_date || now()->greaterThan($record->due_date)
                        ) => 'danger',
                        default => 'gray',
                    })
                    ->tooltip(fn(Invoice $record) => match (true)
                    {
                        $record->ref_to_id !== null => 'Korrekturrechnung',
                        $record->status === 'paid' => 'Bezahlt',
                        $record->status === 'sent' && $record->due_date && now()->lessThan($record->due_date) => 'Fällig in Kürze',
                        $record->status === 'sent' && (
                            !$record->payment_date || now()->greaterThan($record->due_date)
                        ) => 'Überfällig',
                        default => 'Unbekannter Status',
                    })
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('due_date')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->label('Fälligkeit')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_date')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->label('Zahlungsdatum')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
        //
    ])
        ->actions([
            Tables\Actions\EditAction::make()->visible(fn() => auth()->user()->is_admin == 1),
            Action::make('Ansehen')
                ->label('PDF anzeigen')
                ->icon('heroicon-o-document-text')
                ->url(fn(Invoice $record) => route('invoices.pdf', $record->invoice_number))
                ->openUrlInNewTab(), // Öffnet das PDF in einem neuen Tab

        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ->recordUrl(fn($record) => auth()->user()->is_admin ? static::getUrl('edit', ['record' => $record]) : null);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }


}
