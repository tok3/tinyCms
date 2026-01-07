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

    public function uploadCsv()
    {
        $this->validate([
            'csvFile' => 'required|mimes:csv,txt|max:20480',
        ]);

        $path = $this->csvFile->storeAs('temp', 'bank_statement_' . now()->format('Ymd_His') . '.csv');

        $result = $this->processCsv(storage_path('app/' . $path));
        $matches = $result['matches'];
        $originalRecords = $result['original_records'];

        session([
            'payment_matches' => $matches,
            // Nur relevante (positive) Zeilen, damit row_number und Index zusammenpassen
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

        if (empty($matches) || empty($originalRecords)) {
            return redirect()->route('filament.admin.pages.import-bank-payments')
                ->with('error', 'Keine Daten zum Verarbeiten gefunden. Bitte laden Sie die CSV erneut hoch.');
        }

        $pay = $request->input('pay', []);     // [invoice_id => buchungsdatum als String "d.m.Y"]
        // remove[] kommt aus HTML immer als Strings; wir normalisieren auf Strings,
        // damit der Strict-Vergleich in in_array() zuverlässig funktioniert.
        $remove = array_map('strval', (array) $request->input('remove', [])); // Array von row_number (Strings)

        $processedCount = 0;
        $unprocessedRows = [];

        foreach ($matches as $match) {
            $rowNumber = $match['row_number'];
            $originalIndex = $rowNumber - 1; // row_number zählt nur relevante (positive) Zeilen

            // 1) Wenn Row zum Entfernen markiert → komplett ignorieren
            if (in_array((string) $rowNumber, $remove, true)) {
                continue;
            }

            // 2. Wenn Rechnung markiert zum Bezahlen → eintragen
            if ($match['invoice_id'] && isset($pay[$match['invoice_id']])) {
                $invoice = Invoice::find($match['invoice_id']);

                if ($invoice && $invoice->status === 'sent') {
                    $dateStr = $pay[$match['invoice_id']]; // z.B. "19.12.2025"
                    $paymentDate = Carbon::createFromFormat('d.m.Y', $dateStr)->format('Y-m-d');

                    $invoice->update([
                        'status' => 'paid',
                        'payment_date' => $paymentDate,
                    ]);

                    $processedCount++;
                    continue; // nicht ins Rest-CSV
                }
            }

            // 3. Alle anderen → ins Rest-CSV
            if (isset($originalRecords[$originalIndex])) {
                $unprocessedRows[] = $originalRecords[$originalIndex];
            }
        }

        // Rest-CSV erzeugen
        $restMessage = 'Alles verarbeitet – kein Rest.';

        if (!empty($unprocessedRows)) {
            $writer = Writer::createFromString('');
            $writer->setDelimiter(';');

            // Header aus erster Zeile
            $writer->insertOne(array_keys(reset($unprocessedRows)));

            // Daten
            $writer->insertAll($unprocessedRows);

            $filename = 'rest_zahlungen_' . now()->format('Y-m-d_His') . '.csv';
            Storage::put('public/' . $filename, $writer->toString());

            $downloadUrl = Storage::url($filename);

            $restMessage = '<a href="' . $downloadUrl . '" target="_blank" class="font-bold underline text-blue-600">Rest-CSV herunterladen</a> (' . count($unprocessedRows) . ' Zeilen)';
        }

        // Session aufräumen – wichtig gegen Back-Button-Probleme
        session()->forget(['payment_matches', 'original_csv_records', 'uploaded_csv_path']);
        if ($uploadedPath && Storage::exists($uploadedPath)) {
            Storage::delete($uploadedPath);
        }

        // Zurück mit Erfolgsmeldung
        return redirect()->route('filament.admin.pages.import-bank-payments')
            ->with('success_message', "$processedCount Rechnung" . ($processedCount == 1 ? '' : 'en') . " als bezahlt markiert. $restMessage");
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

    private function processCsv(string $filePath): array
    {
        // 1) Delimiter und Header-Zeile robust erkennen (Bank-CSVs haben oft Vorspann-Zeilen / andere Trennzeichen)
        $delimiter = $this->detectCsvDelimiter($filePath);
        $headerOffset = $this->detectHeaderOffset($filePath, $delimiter);

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter($delimiter);
        $csv->setHeaderOffset($headerOffset);

        $records = $csv->getRecords();

        $matches = [];
        $originalRecords = []; // nur relevante (positive) Zeilen, gleiche Reihenfolge wie matches
        $rowNumber = 1; // zählt nur relevante (positive) Datenzeilen

        foreach ($records as $record) {
            $betragStr = $this->getCsvValue($record, [
                'Betrag',
                'Amount',
            ]);

            // Negative oder leere Beträge komplett ignorieren (nicht anzeigen, nicht Rest-CSV)
            if ($betragStr === '' || str_starts_with($betragStr, '-')) {
                continue;
            }

            $verwendungszweck = $this->getCsvValue($record, [
                'Verwendungszweck',
                'Verwendungszweck / Mitteilung',
                'Mitteilung',
                'Buchungstext',
                'Text',
                'Purpose',
            ]);

            $rawDate = $this->getCsvValue($record, [
                'Buchungstag',
                'Buchungsdatum',
                'Datum',
                'Valuta',
                'Value date',
                'Booking date',
            ]);
            $buchungsdatum = $this->normalizeBookingDate($rawDate);

            $auftraggeber = $this->getCsvValue($record, [
                'Auftraggeber/Empfänger',
                'Auftraggeber / Empfänger',
                'Auftraggeber',
                'Empfänger',
                'Beguenstigter/Zahlungspflichtiger',
                'Name',
            ]);

            $betrag = $this->strToFloat($betragStr);
            $detected = $this->detectInvoiceNumber($verwendungszweck);

            $match = [
                'row_number' => $rowNumber,
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

                    // 1) Korrekturrechnungen sind nie zahlbar
                    $isCorrection = ($invoice->type === 'KR') || !empty($invoice->ref_to_id);

                    // 2) Originalrechnung mit vorhandener Korrektur ist nicht mehr zahlbar
                    $hasCorrection = empty($invoice->ref_to_id) && $invoice->corrections()->exists();

                    if ($isCorrection || $hasCorrection) {
                        // Wir behandeln das wie "kein Match"
                        $match['invoice_id'] = null;
                        $match['company_id'] = null;
                        $match['perfect_match'] = false;
                        $match['already_paid'] = false;
                    } else {
                        $match['company_name'] = $invoice->company?->name ?? $auftraggeber;
                        $match['invoice_id'] = $invoice->id;
                        $match['company_id'] = $invoice->company_id;

                        if ($invoice->status === 'paid') {
                            $match['already_paid'] = true;
                        } else {
                            $match['perfect_match'] = abs($betrag - $invoice->total_gross) < 0.01;
                        }
                    }
                }
            }

            // Fallback Vorschläge
            if (!$match['perfect_match'] || $match['already_paid'] || !$match['invoice_id']) {
                $company = null;

                if ($match['company_id']) {
                    $company = $match['company_id'];
                } else {
                    $firstWord = trim(explode(' ', trim($auftraggeber))[0] ?? '');

                    $companyModel = \App\Models\Company::query()
                        ->when($auftraggeber !== '', fn ($q) => $q->where('name', 'like', "%{$auftraggeber}%"))
                        ->when($firstWord !== '', fn ($q) => $q->orWhere('name', 'like', "%{$firstWord}%"))
                        ->first();

                    if ($companyModel) {
                        $match['company_name'] = $companyModel->name;
                        $company = $companyModel->id;
                    }
                }

                if ($company) {
                    $match['company_id'] = $company;

                    $match['suggested_invoice_ids'] = Invoice::where('company_id', $company)
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

            // Original-Record für Rest-CSV: nur relevante Zeilen, gleiche Reihenfolge/Index wie row_number
            $originalRecords[] = $record;
            $matches[] = $match;
            $rowNumber++;
        }

        return [
            'matches' => $matches,
            'original_records' => $originalRecords,
        ];
    }

    private function detectCsvDelimiter(string $filePath): string
    {
        // Heuristik: erste nicht-leere Zeile nehmen und ; vs , zählen
        $fh = new \SplFileObject($filePath, 'r');

        while (!$fh->eof()) {
            $line = trim((string) $fh->fgets());
            if ($line === '') {
                continue;
            }

            $semi = substr_count($line, ';');
            $comma = substr_count($line, ',');

            return ($semi >= $comma) ? ';' : ',';
        }

        return ';';
    }

    private function detectHeaderOffset(string $filePath, string $delimiter, int $maxLines = 50): int
    {
        // Viele Banken schreiben mehrere Info-Zeilen vor dem eigentlichen Tabellen-Header.
        $fh = new \SplFileObject($filePath, 'r');
        $fh->setFlags(\SplFileObject::READ_CSV);
        $fh->setCsvControl($delimiter);

        for ($i = 0; $i < $maxLines && !$fh->eof(); $i++) {
            $row = $fh->fgetcsv();
            if (!is_array($row)) {
                continue;
            }

            $cells = array_map(function ($c) {
                $c = trim((string) $c);
                $c = preg_replace('/^\xEF\xBB\xBF/', '', $c); // BOM
                $c = preg_replace('/\s+/', ' ', $c);
                return $c;
            }, $row);

            // Header erkannt, wenn "Betrag" vorkommt (de) oder "Amount" (en)
            if (in_array('Betrag', $cells, true) || in_array('Amount', $cells, true)) {
                return $i;
            }
        }

        return 0;
    }

    private function getCsvValue(array $record, array $candidates): string
    {
        // Keys normalisieren: trim + UTF-8 BOM entfernen + Mehrfachspaces normalisieren
        $normalized = [];
        foreach ($record as $k => $v) {
            $key = trim((string) $k);
            $key = preg_replace('/^\xEF\xBB\xBF/', '', $key); // BOM
            $key = preg_replace('/\s+/', ' ', $key);
            $normalized[mb_strtolower($key)] = is_string($v) ? trim($v) : (string) $v;
        }

        foreach ($candidates as $name) {
            $needle = mb_strtolower(preg_replace('/\s+/', ' ', trim($name)));
            if (array_key_exists($needle, $normalized)) {
                return trim((string) $normalized[$needle]);
            }
        }

        return '';
    }

    private function normalizeBookingDate(string $raw): string
    {
        $raw = trim($raw);
        if ($raw === '') {
            return '';
        }

        // Häufige Formate: 19.12.2025, 2025-12-19, 19/12/2025
        foreach (['d.m.Y', 'Y-m-d', 'd/m/Y'] as $fmt) {
            try {
                return Carbon::createFromFormat($fmt, $raw)->format('d.m.Y');
            } catch (\Exception $e) {
                // try next
            }
        }

        // Notfalls roh zurückgeben
        return $raw;
    }

    private function strToFloat(string $str): float
    {
        return (float) str_replace(['.', ','], ['', '.'], $str);
    }
}
