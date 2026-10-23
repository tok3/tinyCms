<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Services\Contracts\ContractLifecycleService;
use Carbon\CarbonImmutable;
use DomainException;
use Illuminate\Console\Command;
use Throwable;

class ProcessContractLifecycle extends Command
{
    protected $signature = 'contracts:process-lifecycle {--date= : Verarbeitungsdatum im Format Y-m-d}';

    protected $description = 'Verarbeitet Vertragsverlängerungen, Mollie-Kündigungen und Vertragsenden.';

    public function handle(ContractLifecycleService $service): int
    {
        $today = $this->processingDate();
        $failed = false;

        $renewalIds = Contract::query()
            ->where('status', Contract::STATUS_ACTIVE)
            ->where('auto_renew', true)
            ->whereIn('interval', ['daily', 'weekly', 'monthly', 'annual', 'yearly'])
            ->whereNotNull('end_date')
            ->pluck('id');

        foreach ($renewalIds as $contractId) {
            try {
                while ($service->renewDueContract((int) $contractId, $today)) {
                    // Apply every renewal missed during scheduler downtime.
                }
            } catch (Throwable $exception) {
                $failed = true;
                report($exception);
                $this->error("Verlängerung für Vertrag #{$contractId} fehlgeschlagen.");
            }
        }

        $pendingIds = Contract::query()
            ->where('status', Contract::STATUS_CANCELLATION_PENDING)
            ->whereNotNull('cancellation_effective_at')
            ->pluck('id');

        $mollieIds = Contract::query()
            ->whereIn('status', [Contract::STATUS_CANCELLATION_PENDING, Contract::STATUS_ENDED])
            ->whereNotNull('cancellation_effective_at')
            ->whereNotNull('subscription_id')
            ->whereNull('mollie_canceled_at')
            ->pluck('id');

        foreach ($mollieIds as $contractId) {
            try {
                $service->cancelMollieIfDue((int) $contractId, $today);
            } catch (Throwable $exception) {
                $failed = true;
                report($exception);
                $this->error("Mollie-Kündigung für Vertrag #{$contractId} fehlgeschlagen.");
            }
        }

        foreach ($pendingIds as $contractId) {
            try {
                $service->endIfDue((int) $contractId, $today);
            } catch (Throwable $exception) {
                $failed = true;
                report($exception);
                $this->error("Vertragsende für Vertrag #{$contractId} fehlgeschlagen.");
            }
        }

        return $failed ? self::FAILURE : self::SUCCESS;
    }

    private function processingDate(): CarbonImmutable
    {
        $value = $this->option('date');

        if ($value === null) {
            return CarbonImmutable::now('Europe/Berlin')->startOfDay();
        }

        $date = CarbonImmutable::createFromFormat('!Y-m-d', (string) $value, 'Europe/Berlin');

        if ($date === false || $date->format('Y-m-d') !== $value) {
            throw new DomainException('Das Verarbeitungsdatum muss im Format Y-m-d angegeben werden.');
        }

        return $date;
    }
}
