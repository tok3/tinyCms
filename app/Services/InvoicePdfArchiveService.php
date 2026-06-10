<?php

namespace App\Services;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use ZipArchive;

class InvoicePdfArchiveService
{
    public function createArchive(Collection $invoices, string $label): string
    {
        if ($invoices->isEmpty()) {
            throw new RuntimeException('Keine Rechnungen für den Export gefunden.');
        }

        Storage::disk('local')->makeDirectory('temp');

        $zipPath = storage_path('app/temp/' . $label . '.zip');
        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new RuntimeException('ZIP-Datei konnte nicht erstellt werden.');
        }

        foreach ($invoices as $invoice) {
            $pdfPath = $this->ensurePdfExists($invoice);
            $zip->addFile($pdfPath, $invoice->invoice_number . '.pdf');
        }

        $zip->close();

        return $zipPath;
    }

    public function queryByDateRange(string $from, string $until): Collection
    {
        $fromDate = Carbon::parse($from)->startOfDay();
        $untilDate = Carbon::parse($until)->endOfDay();

        if ($fromDate->greaterThan($untilDate)) {
            [$fromDate, $untilDate] = [$untilDate->copy()->startOfDay(), $fromDate->copy()->endOfDay()];
        }

        return Invoice::query()
            ->whereBetween('issue_date', [$fromDate, $untilDate])
            ->orderBy('invoice_number')
            ->get();
    }

    public function queryByInvoiceNumberRange(string $from, string $until): Collection
    {
        if ($from > $until) {
            [$from, $until] = [$until, $from];
        }

        return Invoice::query()
            ->whereBetween('invoice_number', [$from, $until])
            ->orderBy('invoice_number')
            ->get();
    }

    private function ensurePdfExists(Invoice $invoice): string
    {
        $pdfPath = storage_path('app/invoices/' . $invoice->invoice_number . '.pdf');

        if (file_exists($pdfPath)) {
            return $pdfPath;
        }

        $generatedPath = app(InvoiceService::class)->regenerateMergedPDF($invoice->invoice_number);

        if (! $generatedPath || ! file_exists($generatedPath)) {
            throw new RuntimeException("PDF für {$invoice->invoice_number} konnte nicht erstellt werden.");
        }

        return $generatedPath;
    }
}
