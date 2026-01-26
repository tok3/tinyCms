<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Pages\ImportBankPayments;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('create-manual-invoice')
                ->label('Manuelle Rechnung erstellen')
                ->url(InvoiceResource::getUrl('create'))
                ->icon('heroicon-o-plus')
                ->visible(fn () => auth()->user()?->is_admin),


            Actions\Action::make('importPayers')
                ->label('Zahler einlesen')
                ->icon('heroicon-o-banknotes')
                ->openUrlInNewTab()
                ->url(fn () =>
                auth()->user()?->is_admin
                    ? ImportBankPayments::getUrl()
                    : null
                )
                ->visible(fn () => auth()->user()?->is_admin),
        ];
    }
}
