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

                // Snapshot lesen (wenn vorhanden)
                $cdata = is_array($contract->data) ? $contract->data : (json_decode($contract->data, true) ?: []);
                $items = $cdata['pricing_items'] ?? null;

                // Fallback: eine Position aus contract->price (NETTO-Cent)
                if (!$items || !is_array($items) || count($items) === 0) {
                    $priceNet = round(($contract->price ?? 0) / 100, 2); // NETTO €
                    $items = [[
                        'id'                => '1',
                        'description'       => $contract->invoice_text ?? $contract->product_name,
                        'quantity'          => 1,
                        'line_total_amount' => $priceNet, // NETTO
                    ]];
                }

                // Netto-Summe aus Items
                $totalNet = 0.0;
                foreach ($items as $it) {
                    $totalNet += (float) ($it['line_total_amount'] ?? 0);
                }
                $totalNet   = round($totalNet, 2);
                $tax        = round($totalNet * $taxRate / 100, 2);
                $totalGross = round($totalNet + $tax, 2);

                // Rechnung erzeugen
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
                    'data'              => ['items' => $items], // genau wie im Contract-Snapshot
                ]);

                $this->info("✔ Rechnung erstellt.");
                $svc->sendInvoiceEmail();
            } else {
                $this->info("➤ Keine neue Rechnung erforderlich.");
            }
        }
    }
}
