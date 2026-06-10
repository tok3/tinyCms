<?php

namespace App\Filament\Resources\Shared\InvoiceResource\Pages;

use App\Filament\Resources\Shared\InvoiceResource;
use App\Services\InvoicePdfArchiveService;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Pages\ImportBankPayments;
use Illuminate\Support\Str;

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

            Actions\Action::make('downloadInvoicePdfs')
                ->label('Rechnungen als ZIP')
                ->icon('heroicon-o-archive-box-arrow-down')
                ->color('gray')
                ->modalHeading('Rechnungs-PDFs herunterladen')
                ->modalSubmitActionLabel('ZIP erstellen')
                ->form([
                    DatePicker::make('date_from')
                        ->label('Rechnungsdatum von'),
                    DatePicker::make('date_until')
                        ->label('Rechnungsdatum bis'),
                    TextInput::make('invoice_number_from')
                        ->label('RG-Nr von')
                        ->placeholder('RG20260585'),
                    TextInput::make('invoice_number_until')
                        ->label('RG-Nr bis')
                        ->placeholder('RG20260610'),
                ])
                ->action(function (array $data, InvoicePdfArchiveService $archiveService) {
                    $hasDateRange = filled($data['date_from'] ?? null) && filled($data['date_until'] ?? null);
                    $hasNumberRange = filled($data['invoice_number_from'] ?? null) && filled($data['invoice_number_until'] ?? null);

                    if ($hasDateRange === $hasNumberRange) {
                        Notification::make()
                            ->title('Bitte genau einen Bereich wählen')
                            ->body('Wähle entweder ein Rechnungsdatum von/bis oder eine RG-Nr von/bis.')
                            ->warning()
                            ->send();

                        return null;
                    }

                    try {
                        if ($hasDateRange) {
                            $invoices = $archiveService->queryByDateRange($data['date_from'], $data['date_until']);
                            $label = 'rechnungen_' . $data['date_from'] . '_bis_' . $data['date_until'];
                        } else {
                            $from = strtoupper(trim($data['invoice_number_from']));
                            $until = strtoupper(trim($data['invoice_number_until']));
                            $invoices = $archiveService->queryByInvoiceNumberRange($from, $until);
                            $label = 'rechnungen_' . $from . '_bis_' . $until;
                        }

                        $zipPath = $archiveService->createArchive(
                            $invoices,
                            Str::slug($label, '_') . '_' . now()->format('Ymd_His'),
                        );
                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title('ZIP konnte nicht erstellt werden')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();

                        return null;
                    }

                    return response()
                        ->download($zipPath, basename($zipPath))
                        ->deleteFileAfterSend(true);
                })
                ->visible(fn () => auth()->user()?->is_admin),
        ];
    }
}
