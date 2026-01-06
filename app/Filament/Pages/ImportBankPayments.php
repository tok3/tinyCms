<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Livewire\WithFileUploads;
use League\Csv\Reader;
use League\Csv\Writer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ImportBankPayments extends Page
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Zahlungseingänge einlesen';
    protected static ?string $title = 'Zahlungseingänge einlesen';
    protected static string $view = 'filament.pages.import-bank-payments';

    public $csvFile;

    public function mount()
    {
        // nichts – alles aus Session
    }

    public function uploadCsv()
    {
        $this->validate([
            'csvFile' => 'required|mimes:csv,txt|max:20480',
        ]);

        $path = $this->csvFile->storeAs('temp', 'bank_statement_' . now()->format('Ymd_His') . '.csv');

        $matches = $this->processCsv(storage_path('app/' . $path));

        $reader = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $reader->setDelimiter(';');
        $reader->setHeaderOffset(0);
        $originalRecords = iterator_to_array($reader->getRecords());

        // Nur serialisierbare Daten in Session
        session([
            'payment_matches' => $matches,
            'original_csv_records' => $originalRecords,
            'uploaded_csv_path' => $path,
        ]);

        $this->csvFile = null;

        return redirect()->route('filament.admin.pages.import-bank-payments');
    }

    public function confirmPayments(Request $request)
    {
        $matches = session('payment_matches', []);
        $originalRecords = session('original_csv_records', []);
        $uploadedPath = session('uploaded_csv_path');

        if (empty($matches)) {
            return redirect()->back()->with('error', 'Keine Daten zum Verarbeiten gefunden.');
        }

        $pay = $request->input('pay', []); // invoice_id => buchungsdatum
        $remove = $request->input('remove', []); // row_numbers

        $processedCount = 0;
        $unprocessedRows = [];

        foreach ($matches as $match) {
            $rowNumber = $match['row_number'];

            if (in_array($rowNumber, $remove)) {
                continue;
            }

            if ($match['invoice_id'] && isset($pay[$match['invoice_id']])) {
                $invoice = Invoice::find($match['invoice_id']);

                if ($invoice && $invoice->status === 'sent') {
                    $dateStr = $pay[$match['invoice_id']];
                    $paymentDate = Carbon::createFromFormat('d.m.Y', $dateStr)->format('Y-m-d');

                    $invoice->update([
                        'status' => 'paid',
                        'payment_date' => $paymentDate,
                    ]);

                    $processedCount++;
                    continue;
                }
            }

            // Unverarbeitet → original Zeile behalten
            $originalIndex = $rowNumber - 1;
            if (isset($originalRecords[$originalIndex])) {
                $unprocessedRows[] = $originalRecords[$originalIndex];
            }
        }

        // Rest-CSV
        $restMessage = 'Alles verarbeitet – kein Rest.';

        if (!empty($unprocessedRows)) {
            $writer = Writer::createFromString('');
            $writer->setDelimiter(';');
            $writer->insertOne(array_keys(reset($unprocessedRows)));
            $writer->insertAll($unprocessedRows);

            $filename = 'rest_zahlungen_' . now()->format('Y-m-d_His') . '.csv';
            Storage::put('public/' . $filename, $writer->toString());
            $downloadUrl = Storage::url($filename);

            $restMessage = '<a href="' . $downloadUrl . '" target="_blank" class="font-bold underline">Rest-CSV herunterladen</a> (' . count($unprocessedRows) . ' Zeilen)';
        }

        // Aufräumen
        session()->forget(['payment_matches', 'original_csv_records', 'uploaded_csv_path']);
        if ($uploadedPath) {
            Storage::delete($uploadedPath);
        }

        return redirect()->route('filament.admin.pages.import-bank-payments')
            ->with('success_message', "$processedCount Rechnung" . ($processedCount == 1 ? '' : 'en') . " als bezahlt markiert. $restMessage");
    }

    private function processCsv(string $filePath): array
    {
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        $matches = [];
        $rowNumber = 1;

        foreach ($records as $record) {
            $betragStr = trim($record['Betrag'] ?? '');
            if (empty($betragStr) || str_starts_with($betragStr, '-')) {
                continue;
            }

            $betrag = $this->strToFloat($betragStr);
            $verwendungszweck = $record['Verwendungszweck'] ?? '';
            $buchungsdatum = $record['Buchungstag'] ?? '';
            $auftraggeber = $record['Auftraggeber/Empfänger'] ?? '';

            $detected = $this->detectInvoiceNumber($verwendungszweck);

            $match = [
                'row_number' => $rowNumber++,
                'buchungsdatum' => $buchungsdatum,
                'auftraggeber' => $auftraggeber,
                'verwendungszweck' => $verwendungszweck,
                'betrag' => $betragStr,
                'betrag_float' => $betrag,
                'company_name' => $auftraggeber ?: 'Unbekannt',
                'invoice_id' => null,
                'invoice_number' => $detected,
                'perfect_match' => false,
                'already_paid' => false,
                'company_id' => null,
                'suggested_invoice_ids' => [],
            ];

            if ($detected) {
                $invoice = Invoice::where('invoice_number', $detected)->first();

                if ($invoice) {
                    $match['company_name'] = $invoice->company?->name ?? $auftraggeber;
                    $match['invoice_id'] = $invoice->id;
                    $match['company_id' ] = $invoice->company_id;

                    if ($invoice->status === 'paid') {
                        $match['already_paid'] = true;
                    } else {
                        $match['perfect_match'] = abs($betrag - $invoice->total_gross) < 0.01;
                    }
                }
            }

            // Fallback Vorschläge
            if (!$match['perfect_match'] || $match['already_paid'] || !$match['invoice_id']) {
                $company = null;

                if ($match['company_id']) {
                    $company = \App\Models\Company::find($match['company_id']);
                } else {
                    $company = \App\Models\Company::where('name', 'like', "%{$auftraggeber}%")
                        ->orWhere('name', 'like', "%" . explode(' ', trim($auftraggeber))[0] . "%")
                        ->first();
                }

                if ($company) {
                    $match['company_name'] = $company->name;
                    $match['company_id'] = $company->id;

                    $match['suggested_invoice_ids'] = Invoice::where('company_id', $company->id)
                        ->where('status', 'sent')
                        ->where(function ($query) {
                            $query->where('invoice_number', 'LIKE', 'RG%')
                                ->orWhere('invoice_number', 'LIKE', 'MR%');
                        })
                        ->where('total_gross', '>', 0)
                        ->orderBy('issue_date', 'desc')
                        ->pluck('id')
                        ->toArray();
                }
            }

            $matches[] = $match;
        }

        return $matches;
    }

    private function detectInvoiceNumber(string $text): ?string
    {
        $clean = strtoupper(preg_replace('/[\s\.\-]+/', '', $text));

        if (preg_match('/(RG|MR)(\d{8})/', $clean, $m)) {
            $prefix = $m[1];
            $number = $m[2];
            $week = substr($number, 0, 2);
            if ($week >= 1 && $week <= 53) {
                return $prefix . $number;
            }
        }

        return null;
    }

    private function strToFloat(string $str): float
    {
        return (float) str_replace(['.', ','], ['', '.'], $str);
    }
}
