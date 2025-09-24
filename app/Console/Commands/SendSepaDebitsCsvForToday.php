<?php

namespace App\Console\Commands;

use App\Mail\SepaDebitsCsvMail;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendSepaDebitsCsvForToday extends Command
{
    protected $signature = 'sepa:mail-due
        {--force : Ignoriere sepa_exported_at und exportiere trotzdem}
        {--all : Alle faelligen bis heute (due_date <= heute)}
        {--date= : Genaues Datum filtern (YYYY-MM-DD)}
        {--invoice= : Kommagetrennte Rechnungsnummer(n) gezielt exportieren}';

    protected $description = 'CSV der faelligen SEPA-Lastschriften erstellen (heute / bis heute / bestimmtes Datum / gezielte Rechnungen) und per Mail versenden.';

    public function handle(): int
    {
        $today = Carbon::today();
        $dateOpt = $this->option('date') ? Carbon::parse($this->option('date'))->startOfDay() : null;
        $invoiceList = $this->option('invoice')
            ? array_filter(array_map('trim', explode(',', $this->option('invoice'))))
            : [];

        $query = Invoice::query()
            ->where('type', '!=', 'KR')
            ->where('status', 'sent')
            ->whereNull('payment_date')
            ->whereNull('mollie_payment_id')
            ->whereHas('contract', fn ($q) => $q->whereNotNull('sepa_mandate_id'))
            ->with([
                'company:id,name,kd_nr',
                'contract:id,contractable_id,contractable_type,sepa_mandate_id',
                'contract.sepaMandate:id,company_id,mandate_reference,iban,bank_name,signature_date,is_active',
            ]);

        // Filter-Modi
        if (!empty($invoiceList)) {
            // Gezielte Rechnungen: Datum/Export-Flag ignorieren (bewusster Re-Export)
            $query->whereIn('invoice_number', $invoiceList);
        } else {
            if ($this->option('all')) {
                $query->whereDate('due_date', '<=', $today);
            } elseif ($dateOpt) {
                $query->whereDate('due_date', $dateOpt);
            } else {
                $query->whereDate('due_date', $today);
            }

            if (!$this->option('force')) {
                $query->whereNull('sepa_exported_at');
            }
        }

        $invoices = $query->get()->filter(function ($inv) {
            return (bool) ($inv->contract?->sepaMandate?->is_active);
        });

        if ($invoices->isEmpty()) {
            $this->info('Keine passenden SEPA-Rechnungen gefunden.');
            return self::SUCCESS;
        }

        // CSV-Dateiname je Modus
        $mode = 'today';
        if (!empty($invoiceList)) {
            $mode = 'manual';
        } elseif ($this->option('all')) {
            $mode = 'until-' . $today->format('Y-m-d');
        } elseif ($dateOpt) {
            $mode = 'date-' . $dateOpt->format('Y-m-d');
        }

        $dir = 'sepa/due';
        Storage::makeDirectory($dir);
        $fileName = 'sepa-due-' . $mode . '-' . now()->format('Ymd_His') . '.csv';
        $path = storage_path('app/' . $dir . '/' . $fileName);

        // CSV schreiben (Semikolon)
        $fp = fopen($path, 'w');
        fputcsv($fp, [
            'Zahlungspflichtiger',
            'Zahlungspflichtiger IBAN',
            'Mandatsreferenz',
            'Datum der Unterschrift',
            'Betrag',
            'Verwendungszweck',
        ], ';');

        foreach ($invoices as $inv) {
            $mandate = $inv->contract->sepaMandate;

            $payerName     = $inv->company->name ?? 'Unbekannt';
            $payerIban     = $mandate->iban ?? '';
            $mandateRef    = $mandate->mandate_reference ?? ($inv->company->kd_nr ?? '');
            $signatureDate = optional($mandate->signature_date)->format('d.m.Y') ?? '';
            $amount        = number_format((float) $inv->total_gross, 2, ',', '.');

            // Verwendungszweck: RE-<ReNr> / CT-<Vertragsnr> / KD-<Kdnr>
            $contractNumber = $inv->contract->contract_number ?? $inv->contract->id;
            $usage = sprintf(
                '%s - '.env('APP_NAME', '').' Kd-Nr %s',
                $inv->invoice_number,
                $inv->company->kd_nr ?? '',
                $contractNumber,
            );

            fputcsv($fp, [
                $payerName,
                $payerIban,
                $mandateRef,
                $signatureDate,
                $amount,
                $usage,
            ], ';');
        }
        fclose($fp);


        // Mail versenden (mehrere Empfänger aus config)
        $recipients = array_filter(config('accounting.sepa.csv_recipients', []));
        if (empty($recipients)) {
            $this->error('Keine Empfaenger in config(accounting.sepa.csv_recipients) konfiguriert.');
            return self::FAILURE;
        }
        foreach ($recipients as $to) {
            Mail::to(trim($to))->send(new SepaDebitsCsvMail($path, $fileName, $invoices->count()));
        }

        // Als exportiert markieren – nur wenn kein manueller Invoice-Filter & kein --force
        if (empty($invoiceList) && !$this->option('force')) {
            $now = Carbon::now();
            Invoice::whereIn('id', $invoices->pluck('id'))->update(['sepa_exported_at' => $now]);
        }

        $this->info("SEPA-CSV ({$invoices->count()} Positionen) versendet: {$fileName}");
        return self::SUCCESS;
    }
}
