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

                $priceNet = ($contract->price ?? 0) / 100;
                $taxRate = config('accounting.tax_rate', 19);
                $tax = round($priceNet * $taxRate / 100, 2);
                $totalGross = round($priceNet + $tax, 2);

                $invoiceService = new InvoiceService();

                $invoiceService->createInvoice([
                    'company_id'       => $company->id,
                    'contract_id'      => $contract->id,
                    'issue_date'       => $nextIssueDate->format('Y-m-d'),
                    'mollie_payment_id'=> null,
                    'due_date'         => $nextIssueDate->copy()->addWeekdays(10)->format('Y-m-d'),
                    'payment_date'     => null,
                    'total_net'        => $priceNet,
                    'total_gross'      => $totalGross,
                    'tax'              => $tax,
                    'tax_rate'         => $taxRate,
                    'status'           => 'sent',
                    'data'             => [
                        'items' => [
                            [
                                'id'                => '1',
                                'description'       => $contract->invoice_text ?? $contract->product_name,
                                'quantity'          => 1,
                                'line_total_amount' => $priceNet,
                            ],
                        ],
                    ],
                ]);

                $this->info("✔ Rechnung erfolgreich erstellt.");

                $invoiceService->sendInvoiceEmail();
            } else {
                $this->info("➤ Keine neue Rechnung erforderlich.");
            }
        }
    }
}
