<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
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
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // ViewField am Anfang des Formulars
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
                    Textarea::make('payment_terms')
                        ->label('Zahlungsbedingungen')
                        ->disabled(),
                    Textarea::make('data')
                        ->label('Zusätzliche Daten')
                        ->disabled(),
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
            ->columns([

                Tables\Columns\TextColumn::make('company.kd_nr')
                    ->label('Kd-Nr.')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('Rg-Nr')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.plz')
                    ->label('Plz')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.ort')
                    ->label('Ort')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_gross')
                    ->label('Betrag')
                    ->formatStateUsing(fn(string $state) => number_format($state, 2, ',', '.'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->label('Währung')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
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
            ]);
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
            'index' => InvoiceResource\Pages\ListInvoices::route('/'),
            'create' => InvoiceResource\Pages\CreateInvoice::route('/create'),
            'edit' => InvoiceResource\Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
