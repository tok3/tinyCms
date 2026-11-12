<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\ContractLifecycleEvent;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateRecurringInvoices extends Command
{
    protected $signature = 'app:generate-recurring-invoices
                            {--contract= : Nur diesen Vertrag verarbeiten}
                            {--dry-run : Fällige Rechnung nur prüfen und anzeigen}
                            {--as-of= : Simulierter Stichtag im Format JJJJ-MM-TT (nur mit --dry-run)}';

    protected $description = 'Erstellt wiederkehrende Rechnungen auf Basis von Verträgen.';

    public function handle(InvoiceService $invoiceService)
    {
        $requestedContractId = $this->option('contract');
        $dryRun = (bool) $this->option('dry-run');
        $asOf = $this->option('as-of');

        if ($asOf !== null && ! $dryRun) {
            $this->error('--as-of ist nur zusammen mit --dry-run erlaubt.');

            return self::INVALID;
        }

        if ($asOf !== null) {
            try {
                $today = Carbon::createFromFormat('!Y-m-d', trim((string) $asOf));
            } catch (\Throwable) {
                $today = null;
            }

            if (! $today || $today->format('Y-m-d') !== trim((string) $asOf)) {
                $this->error('Der Stichtag muss ein gültiges Datum im Format JJJJ-MM-TT sein.');

                return self::INVALID;
            }
        } else {
            $today = today();
        }

        if ($requestedContractId !== null
            && (! ctype_digit((string) $requestedContractId) || (int) $requestedContractId < 1)) {
            $this->error('Die Vertrags-ID muss eine positive Ganzzahl sein.');

            return self::INVALID;
        }

        $contractIds = Contract::withoutGlobalScopes()
            ->whereNull('subscription_id')
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->whereIn('status', [Contract::STATUS_ACTIVE, Contract::STATUS_CANCELLATION_PENDING])
            ->whereNotIn('interval', ['one_time'])
            ->whereNull('deleted_at') // Soft-deleted Verträge ausschließen
            ->where('price', '>', 0)
            ->when($requestedContractId !== null, fn ($query) => $query->whereKey((int) $requestedContractId))
            ->pluck('id');

        foreach ($contractIds as $contractId) {
            $this->info("Prüfe Vertrag #{$contractId}");

            $createdInvoice = DB::transaction(function () use ($contractId, $today, $invoiceService, $dryRun): ?Invoice {
                $contract = Contract::withoutGlobalScopes()
                    ->whereNull('subscription_id')
                    ->whereDate('start_date', '<=', $today)
                    ->whereDate('end_date', '>=', $today)
                    ->whereIn('status', [Contract::STATUS_ACTIVE, Contract::STATUS_CANCELLATION_PENDING])
                    ->whereNotIn('interval', ['one_time'])
                    ->whereNull('deleted_at')
                    ->where('price', '>', 0)
                    ->lockForUpdate()
                    ->find($contractId);

                if (! $contract) {
                    return null;
                }

                $lastInvoice = Invoice::forRecurringCadence()
                    ->where('contract_id', $contract->id)
                    ->where('status', '!=', 'canceled')
                    ->orderByDesc('issue_date')
                    ->orderByDesc('id')
                    ->first();

                $shouldCreate = false;
                $nextIssueDate = null;

                if (! $lastInvoice) {
                    $shouldCreate = true;
                    $nextIssueDate = Carbon::parse($contract->start_date);
                } else {
                    $lastIssueDate = Carbon::parse($lastInvoice->issue_date);

                    $nextIssueDate = $this->nextIssueDate($lastIssueDate, $contract->interval);

                    $shouldCreate = $nextIssueDate?->lte($today) ?? false;
                }

                if ($shouldCreate && $nextIssueDate) {
                    while (Invoice::where('contract_id', $contract->id)
                        ->whereDate('issue_date', $nextIssueDate)
                        ->where('status', 'canceled')
                        ->exists()) {
                        $nextIssueDate = $this->nextIssueDate($nextIssueDate, $contract->interval);

                        if (! $nextIssueDate || $nextIssueDate->greaterThan($today)) {
                            return null;
                        }
                    }

                    $alreadyExists = Invoice::forRecurringCadence()
                        ->where('contract_id', $contract->id)
                        ->whereDate('issue_date', $nextIssueDate)
                        ->where('status', '!=', 'canceled')
                        ->exists();

                    if ($alreadyExists) {
                        $this->info("➤ Rechnung für {$nextIssueDate->toDateString()} existiert bereits.");

                        return null;
                    }

                    $company = $contract->contractable;
                    $taxRate = (float) config('accounting.tax_rate', 19);

                    // Contract->data sicher lesen (Array-Cast + Fallback für ältere, JSON-enkodierte Datensätze)
                    $raw = $contract->getAttribute('data');
                    $cdata = is_array($raw) ? $raw : (is_string($raw) ? json_decode($raw, true) ?? [] : []);

                    // 1) Items aus Pricing-Snapshot (falls vorhanden)
                    $snapshot = $cdata['pricing_snapshot'] ?? null;
                    $items = (is_array($snapshot) && ! empty($snapshot['items']) && is_array($snapshot['items']))
                        ? $snapshot['items']
                        : null;

                    // 2) Fallback: eine Position aus contract->price (NETTO-Cent)
                    if (! $items) {
                        $priceNet = round(($contract->price ?? 0) / 100, 2); // NETTO €
                        $desc = $contract->invoice_text ?? ($contract->product_name ?? 'Leistung');
                        $items = [[
                            'id' => '1',
                            'description' => $desc,
                            'quantity' => 1,
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

                    $agencyCompany = $company instanceof \App\Models\Company
                        ? $company->loadMissing('agency')->agencyBillingDiscountSource()
                        : null;
                    $snapshotMeta = is_array($snapshot['meta'] ?? null) ? $snapshot['meta'] : [];
                    $snapshotHasAgencyDiscount = (float) ($snapshotMeta['agency_percent'] ?? 0) > 0;
                    $agencyPct = (float) ($agencyCompany?->agency_discount_percent ?? 0);

                    if (! $snapshotHasAgencyDiscount && $agencyPct > 0) {
                        $discountNet = round($totalNet * ($agencyPct / 100), 2);

                        if ($discountNet > 0) {
                            $items[] = [
                                'id' => 'agency-discount',
                                'description' => 'Agentur-Rabatt '.rtrim(rtrim(number_format($agencyPct, 2, ',', ''), '0'), ',').'%',
                                'quantity' => 1,
                                'line_total_amount' => -$discountNet,
                            ];

                            $totalNet = round($totalNet - $discountNet, 2);
                            $snapshotMeta['agency_percent'] = $agencyPct;
                            $snapshotMeta['agency_company_id'] = $agencyCompany->id;
                        }
                    }

                    $tax = round($totalNet * $taxRate / 100, 2);
                    $calculatedGross = round($totalNet + $tax, 2);

                    $explicitGrossCents = $cdata['billing_total_gross_cents'] ?? null;
                    if ($explicitGrossCents !== null) {
                        $validInteger = is_int($explicitGrossCents)
                            || (is_string($explicitGrossCents) && ctype_digit($explicitGrossCents));
                        $totalGross = $validInteger
                            ? round((int) $explicitGrossCents / 100, 2)
                            : 0.0;
                        $roundingAmount = round($totalGross - $calculatedGross, 2);

                        if (! $validInteger || $totalGross <= $totalNet || abs($roundingAmount) > 0.01) {
                            throw new \UnexpectedValueException(
                                "Ungültiger Brutto-Rechnungsbetrag für Vertrag #{$contract->id}."
                            );
                        }
                    } else {
                        $totalGross = $calculatedGross;
                    }

                    $invoiceData = ['items' => $items];
                    if (! empty($snapshotMeta)) {
                        $invoiceData['meta'] = $snapshotMeta;
                    }

                    if ($dryRun) {
                        $this->info(sprintf(
                            'VORSCHAU Vertrag #%d | %s | %s | Netto %.2f € | Brutto %.2f € | Empfänger %s',
                            $contract->id,
                            $company->name ?? 'Unbekannter Kunde',
                            $nextIssueDate->toDateString(),
                            $totalNet,
                            $totalGross,
                            $company->email ?? 'nicht hinterlegt'
                        ));

                        return null;
                    }

                    $claim = ContractLifecycleEvent::record(
                        $contract,
                        'recurring_invoice_claimed',
                        ['issue_date' => $nextIssueDate->toDateString()],
                        null,
                        "recurring-invoice:{$contract->id}:{$nextIssueDate->toDateString()}"
                    );

                    if (! $claim->wasRecentlyCreated) {
                        return null;
                    }

                    $this->info("➤ Rechnung wird erstellt für Vertrag #{$contract->id}");

                    // 4) Rechnung erzeugen – PDF nimmt die Items 1:1 aus 'data.items'
                    $invoice = $invoiceService->createInvoice([
                        'company_id' => $company->id,
                        'contract_id' => $contract->id,
                        'issue_date' => $nextIssueDate->format('Y-m-d'),
                        'mollie_payment_id' => null,
                        'due_date' => $nextIssueDate->copy()->addWeekdays(10)->format('Y-m-d'),
                        'payment_date' => null,
                        'total_net' => $totalNet,
                        'total_gross' => $totalGross,
                        'tax' => $tax,
                        'tax_rate' => $taxRate,
                        'status' => 'sent',
                        'data' => $invoiceData,
                    ]);

                    $this->info('✔ Rechnung erstellt.');

                    return $invoice;
                } else {
                    return null;
                }

            });

            if ($createdInvoice) {
                $invoiceService->sendInvoiceEmail($createdInvoice->id);
            } elseif (! $dryRun) {
                $this->info('➤ Keine neue Rechnung erforderlich.');
            }
        }
    }

    private function nextIssueDate(Carbon $date, string $interval): ?Carbon
    {
        return match ($interval) {
            'daily' => $date->copy()->addDay(),
            'weekly' => $date->copy()->addWeek(),
            'monthly' => $date->copy()->addMonth(),
            'annual', 'yearly' => $date->copy()->addYear(),
            default => null,
        };
    }
}
