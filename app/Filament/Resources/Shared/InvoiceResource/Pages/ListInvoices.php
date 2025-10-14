<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
        ];
    }
}
