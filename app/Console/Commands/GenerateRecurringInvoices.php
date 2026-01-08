<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contract;
use App\Models\Invoice;
use Carbon\Carbon;
use App\Services\InvoiceService;

class GenerateRecurringInvoices extends Command
{
    protected $signature = 'app:generate-recurring-invoices';
    protected $description = 'Erstellt wiederkehrende Rechnungen auf Basis von Verträgen.';

    public function handle()
    {
        $today = today();

        $contracts = Contract::withoutGlobalScopes()
            ->whereNull('subscription_id')
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->whereNotIn('interval', ['one_time'])
            ->whereNull('deleted_at') // Soft-deleted Verträge ausschließen
            ->where('price', '>', 0)
            ->get();

        foreach ($contracts as $contract) {
            $this->info("Prüfe Vertrag #{$contract->id}");

            $lastInvoice = Invoice::where('contract_id', $contract->id)
                ->orderByDesc('issue_date')
                ->first();



            $shouldCreate = false;
            $nextIssueDate = null;

            if (!$lastInvoice) {
                $shouldCreate = true;
                $nextIssueDate = Carbon::parse($contract->start_date);
            } else {
                $lastIssueDate = Carbon::parse($lastInvoice->issue_date);

                switch ($contract->interval) {
                    case 'daily':
                        $nextIssueDate = $lastIssueDate->copy()->addDay();
                        break;
                    case 'weekly':
                        $nextIssueDate = $lastIssueDate->copy()->addWeek();
                        break;
                    case 'monthly':
                        $nextIssueDate = $lastIssueDate->copy()->addMonth();
                        break;
                    case 'annual':
                        $nextIssueDate = $lastIssueDate->copy()->addYear();
                        break;
                }

                $shouldCreate = $nextIssueDate->lte($today);
            }

            if ($shouldCreate && $nextIssueDate) {
                $this->info("➤ Rechnung wird erstellt für Vertrag #{$contract->id}");

                $company = $contract->contractable;
                $taxRate = (float) config('accounting.tax_rate', 19);

// Contract->data sicher lesen (Array-Cast + Fallback für ältere, JSON-enkodierte Datensätze)
                $raw = $contract->getAttribute('data');
                $cdata = is_array($raw) ? $raw : (is_string($raw) ? json_decode($raw, true) ?? [] : []);

// 1) Items aus Pricing-Snapshot (falls vorhanden)
                $snapshot = $cdata['pricing_snapshot'] ?? null;
                $items = (is_array($snapshot) && !empty($snapshot['items']) && is_array($snapshot['items']))
                    ? $snapshot['items']
                    : null;

// 2) Fallback: eine Position aus contract->price (NETTO-Cent)
                if (!$items) {
                    $priceNet = round(($contract->price ?? 0) / 100, 2); // NETTO €
                    $desc = $contract->invoice_text ?? ($contract->product_name ?? 'Leistung');
                    $items = [[
                        'id'                => '1',
                        'description'       => $desc,
                        'quantity'          => 1,
                        'line_total_amount' => $priceNet, // NETTO
                    ]];
                }

// 3) Netto-Summe aus Items (oder Snapshot-Wert nutzen, wenn vorhanden)
                if (isset($snapshot['total_net']) && is_numeric($snapshot['total_net'])) {
                    $totalNet = round((float) $snapshot['total_net'], 2);
                } else {
                    $totalNet = 0.0;
                    foreach ($items as $it) {
                        $totalNet += (float) ($it['line_total_amount'] ?? 0);
                    }
                    $totalNet = round($totalNet, 2);
                }

                $tax        = round($totalNet * $taxRate / 100, 2);
                $totalGross = round($totalNet + $tax, 2);

// 4) Rechnung erzeugen – PDF nimmt die Items 1:1 aus 'data.items'
                $svc = new \App\Services\InvoiceService();
                $svc->createInvoice([
                    'company_id'        => $company->id,
                    'contract_id'       => $contract->id,
                    'issue_date'        => $nextIssueDate->format('Y-m-d'),
                    'mollie_payment_id' => null,
                    'due_date'          => $nextIssueDate->copy()->addWeekdays(10)->format('Y-m-d'),
                    'payment_date'      => null,
                    'total_net'         => $totalNet,
                    'total_gross'       => $totalGross,
                    'tax'               => $tax,
                    'tax_rate'          => $taxRate,
                    'status'            => 'sent',
                    'data'              => ['items' => $items],
                ]);

                $this->info("✔ Rechnung erstellt.");
                $svc->sendInvoiceEmail();
            } else {
                $this->info("➤ Keine neue Rechnung erforderlich.");
            }
        }
    }
}
