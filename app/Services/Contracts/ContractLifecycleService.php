<?php

namespace App\Services\Contracts;

use App\Contracts\MollieSubscriptionGateway;
use App\Models\Contract;
use App\Models\ContractLifecycleEvent;
use App\Models\MolliePayment;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use DomainException;
use Illuminate\Support\Facades\DB;
use Throwable;

class ContractLifecycleService
{
    public function __construct(private MollieSubscriptionGateway $mollieGateway) {}

    public function normalEffectiveDate(Contract $contract, CarbonInterface $receivedOn): CarbonImmutable
    {
        $this->assertCancellable($contract);

        $end = CarbonImmutable::instance($contract->end_date)->startOfDay();
        $deadline = $end->subMonthsNoOverflow((int) $contract->notice_period_months);
        $received = CarbonImmutable::instance($receivedOn)->startOfDay();

        return $received->lessThanOrEqualTo($deadline)
            ? $end
            : $end->addMonthsNoOverflow((int) $contract->renewal_period_months);
    }

    public function scheduleCancellation(
        int $contractId,
        CarbonInterface $receivedOn,
        ?CarbonInterface $goodwillEnd,
        ?string $reason,
        ?int $actorId
    ): Contract {
        return DB::transaction(function () use (
            $contractId,
            $receivedOn,
            $goodwillEnd,
            $reason,
            $actorId
        ): Contract {
            $contract = Contract::withTrashed()->lockForUpdate()->findOrFail($contractId);
            $this->assertCancellable($contract);

            $oldEnd = CarbonImmutable::instance($contract->end_date)->startOfDay();
            $normalEnd = $this->normalEffectiveDate($contract, $receivedOn);
            $deadline = $oldEnd->subMonthsNoOverflow((int) $contract->notice_period_months);
            $isGoodwill = $goodwillEnd !== null;
            $effectiveEnd = $normalEnd;

            if ($isGoodwill) {
                if (blank($reason)) {
                    throw new DomainException('Für Kulanz ist eine Begründung erforderlich.');
                }

                $effectiveEnd = CarbonImmutable::instance($goodwillEnd)->startOfDay();
                $today = CarbonImmutable::now('Europe/Berlin')->startOfDay();

                if ($effectiveEnd->lessThan($today)) {
                    throw new DomainException('Ein Kulanzende darf nicht in der Vergangenheit liegen.');
                }

                if ($effectiveEnd->greaterThan($normalEnd)) {
                    throw new DomainException('Ein Kulanzende darf nicht nach dem normalen Vertragsende liegen.');
                }
            }

            if ($normalEnd->greaterThan($oldEnd)) {
                $contract->iteration = (int) $contract->iteration + 1;
            }

            $contract->forceFill([
                'end_date' => $effectiveEnd,
                'status' => Contract::STATUS_CANCELLATION_PENDING,
                'auto_renew' => false,
                'cancellation_received_at' => CarbonImmutable::instance($receivedOn)->startOfDay(),
                'cancellation_effective_at' => $effectiveEnd,
                'cancellation_reason' => filled($reason) ? trim($reason) : null,
                'cancellation_is_goodwill' => $isGoodwill,
            ])->save();

            ContractLifecycleEvent::record(
                $contract,
                $isGoodwill ? 'goodwill_cancellation_scheduled' : 'cancellation_scheduled',
                [
                    'previous_end_date' => $oldEnd->toDateString(),
                    'normal_effective_date' => $normalEnd->toDateString(),
                    'effective_date' => $effectiveEnd->toDateString(),
                    'deadline' => $deadline->toDateString(),
                    'received_date' => CarbonImmutable::instance($receivedOn)->toDateString(),
                    'reason' => filled($reason) ? trim($reason) : null,
                ],
                $actorId
            );

            return $contract->fresh();
        });
    }

    public function revokeCancellation(
        int $contractId,
        string $reason,
        bool $confirmInvoiceFallback,
        ?int $actorId
    ): Contract {
        return DB::transaction(function () use (
            $contractId,
            $reason,
            $confirmInvoiceFallback,
            $actorId
        ): Contract {
            if (blank($reason)) {
                throw new DomainException('Eine Begründung ist erforderlich.');
            }

            $contract = Contract::withTrashed()->lockForUpdate()->findOrFail($contractId);

            if ($contract->trashed() || ! in_array($contract->status, [
                Contract::STATUS_CANCELLATION_PENDING,
                Contract::STATUS_ENDED,
            ], true) || $contract->cancellation_effective_at === null) {
                throw new DomainException('Es gibt keine Kündigung, die zurückgenommen werden kann.');
            }

            $cancellationEvent = $contract->lifecycleEvents()
                ->whereIn('type', ['cancellation_scheduled', 'goodwill_cancellation_scheduled'])
                ->latest('id')
                ->firstOrFail();
            $priorCancellation = [
                'received_date' => $contract->cancellation_received_at?->toDateString(),
                'effective_date' => $contract->cancellation_effective_at?->toDateString(),
                'reason' => $contract->cancellation_reason,
                'was_goodwill' => (bool) $contract->cancellation_is_goodwill,
            ];

            $restoredEnd = CarbonImmutable::parse(
                $contract->cancellation_is_goodwill
                    ? $cancellationEvent->context['normal_effective_date']
                    : $contract->end_date
            )->startOfDay();
            $today = CarbonImmutable::now('Europe/Berlin')->startOfDay();
            $renewalMonths = (int) $contract->renewal_period_months;

            if ($renewalMonths < 1) {
                throw new DomainException('Der Verlängerungszeitraum muss mindestens einen Monat betragen.');
            }

            while ($today->greaterThan(
                $restoredEnd->subMonthsNoOverflow((int) $contract->notice_period_months)
            )) {
                $restoredEnd = $restoredEnd->addMonthsNoOverflow($renewalMonths);
                $contract->iteration = (int) $contract->iteration + 1;
            }

            $formerSubscriptionId = $contract->subscription_id;
            $localSubscription = $formerSubscriptionId
                ? $contract->mollieSubscription()->first()
                : null;
            $mollieAlreadyCanceled = $formerSubscriptionId !== null
                && ($contract->mollie_canceled_at !== null || $localSubscription?->status === 'canceled');

            if ($mollieAlreadyCanceled && ! $confirmInvoiceFallback) {
                throw new DomainException('Die Umstellung auf normale Rechnung muss bestätigt werden.');
            }

            $lastPaidAt = $formerSubscriptionId
                ? MolliePayment::query()
                    ->where('subscription_id', $formerSubscriptionId)
                    ->where('status', 'paid')
                    ->whereNotNull('paid_at')
                    ->latest('paid_at')
                    ->value('paid_at')
                : null;

            $contract->forceFill([
                'end_date' => $restoredEnd,
                'status' => Contract::STATUS_ACTIVE,
                'auto_renew' => true,
                'cancellation_received_at' => null,
                'cancellation_effective_at' => null,
                'cancellation_reason' => null,
                'cancellation_is_goodwill' => false,
                'mollie_canceled_at' => null,
                'subscription_id' => $mollieAlreadyCanceled ? null : $formerSubscriptionId,
                'subscription_start_date' => $mollieAlreadyCanceled
                    ? null
                    : $contract->subscription_start_date,
            ])->save();

            DB::table('company_feature')
                ->where('contract_id', $contract->id)
                ->whereNotNull('deleted_at')
                ->update(['deleted_at' => null]);

            ContractLifecycleEvent::record(
                $contract,
                $mollieAlreadyCanceled ? 'reactivated_on_invoice' : 'cancellation_revoked',
                [
                    'reason' => trim($reason),
                    'prior_cancellation' => $priorCancellation,
                    'resulting_end_date' => $restoredEnd->toDateString(),
                    'former_subscription_id' => $mollieAlreadyCanceled ? $formerSubscriptionId : null,
                    'last_paid_at' => $lastPaidAt
                        ? CarbonImmutable::parse($lastPaidAt)->toDateString()
                        : null,
                ],
                $actorId,
                'revocation:'.$contract->id.':'.$cancellationEvent->id
            );

            return $contract->fresh();
        });
    }

    public function renewDueContract(int $contractId, CarbonInterface $today): bool
    {
        return DB::transaction(function () use ($contractId, $today): bool {
            $contract = Contract::withTrashed()->lockForUpdate()->find($contractId);

            if ($contract === null
                || $contract->trashed()
                || $contract->status !== Contract::STATUS_ACTIVE
                || ! $contract->auto_renew
                || ! $contract->isRecurring()
                || $contract->end_date === null) {
                return false;
            }

            $renewalMonths = (int) $contract->renewal_period_months;

            if ($renewalMonths < 1) {
                throw new DomainException('Der Verlängerungszeitraum muss mindestens einen Monat betragen.');
            }

            $oldEnd = CarbonImmutable::instance($contract->end_date)->startOfDay();
            $deadline = $oldEnd->subMonthsNoOverflow((int) $contract->notice_period_months);

            if (CarbonImmutable::instance($today)->startOfDay()->lessThanOrEqualTo($deadline)) {
                return false;
            }

            $newEnd = $oldEnd->addMonthsNoOverflow($renewalMonths);
            $idempotencyKey = 'renewal:'.$contract->id.':'.$oldEnd->toDateString().':'.$newEnd->toDateString();

            if (ContractLifecycleEvent::query()->where('idempotency_key', $idempotencyKey)->exists()) {
                return false;
            }

            $contract->forceFill([
                'end_date' => $newEnd,
                'iteration' => (int) $contract->iteration + 1,
            ])->save();

            ContractLifecycleEvent::record(
                $contract,
                'renewed',
                [
                    'previous_end_date' => $oldEnd->toDateString(),
                    'new_end_date' => $newEnd->toDateString(),
                    'deadline' => $deadline->toDateString(),
                ],
                null,
                $idempotencyKey
            );

            return true;
        });
    }

    public function endIfDue(int $contractId, CarbonInterface $today): bool
    {
        return DB::transaction(function () use ($contractId, $today): bool {
            $contract = Contract::withTrashed()->lockForUpdate()->find($contractId);

            if ($contract === null
                || $contract->trashed()
                || $contract->status !== Contract::STATUS_CANCELLATION_PENDING
                || $contract->cancellation_effective_at === null
                || CarbonImmutable::instance($today)->startOfDay()->lessThanOrEqualTo(
                    CarbonImmutable::instance($contract->cancellation_effective_at)->startOfDay()
                )) {
                return false;
            }

            $effectiveEnd = CarbonImmutable::instance($contract->cancellation_effective_at)->startOfDay();
            $idempotencyKey = 'ended:'.$contract->id.':'.$effectiveEnd->toDateString();

            if (ContractLifecycleEvent::query()->where('idempotency_key', $idempotencyKey)->exists()) {
                return false;
            }

            $contract->forceFill([
                'status' => Contract::STATUS_ENDED,
                'auto_renew' => false,
            ])->save();

            ContractLifecycleEvent::record(
                $contract,
                'contract_ended',
                ['effective_date' => $effectiveEnd->toDateString()],
                null,
                $idempotencyKey
            );

            return true;
        });
    }

    public function cancelMollieIfDue(int $contractId, CarbonInterface $today): bool
    {
        try {
            return DB::transaction(function () use ($contractId, $today): bool {
                $contract = Contract::withTrashed()->lockForUpdate()->find($contractId);

                if ($contract === null
                    || $contract->trashed()
                    || $contract->status !== Contract::STATUS_CANCELLATION_PENDING
                    || $contract->cancellation_effective_at === null
                    || $contract->subscription_id === null
                    || $contract->mollie_canceled_at !== null) {
                    return false;
                }

                $processingDate = CarbonImmutable::instance($today)->startOfDay();
                $dueDate = CarbonImmutable::instance($contract->cancellation_effective_at)
                    ->startOfDay()
                    ->subDay();

                if ($processingDate->lessThan($dueDate)) {
                    return false;
                }

                $subscription = $contract->mollieSubscription()->lockForUpdate()->first();

                if ($subscription === null) {
                    throw new DomainException('Der lokale Mollie-Datensatz fehlt.');
                }

                if (blank($subscription->customer_id)) {
                    throw new DomainException('Die Mollie-Customer-ID fehlt.');
                }

                $remoteStatus = $subscription->status;

                if ($subscription->status !== 'canceled') {
                    $remoteStatus = $this->mollieGateway->status(
                        $subscription->customer_id,
                        $subscription->subscription_id
                    );

                    if ($remoteStatus !== 'canceled') {
                        $this->mollieGateway->cancel(
                            $subscription->customer_id,
                            $subscription->subscription_id
                        );
                    }
                }

                $subscription->forceFill(['status' => 'canceled'])->save();
                $contract->forceFill(['mollie_canceled_at' => now()])->save();

                ContractLifecycleEvent::record(
                    $contract,
                    'mollie_cancellation_succeeded',
                    [
                        'subscription_id' => $subscription->subscription_id,
                        'processing_date' => $processingDate->toDateString(),
                        'remote_status_before' => $remoteStatus,
                    ],
                    null,
                    'mollie-canceled:'.$contract->id.':'.$subscription->subscription_id
                );

                return true;
            });
        } catch (Throwable $exception) {
            DB::transaction(function () use ($contractId, $today, $exception): void {
                $contract = Contract::withTrashed()->lockForUpdate()->find($contractId);

                if ($contract === null) {
                    return;
                }

                ContractLifecycleEvent::record(
                    $contract,
                    'mollie_cancellation_failed',
                    [
                        'subscription_id' => $contract->subscription_id,
                        'processing_date' => CarbonImmutable::instance($today)->toDateString(),
                        'exception' => $exception::class,
                    ]
                );
            });

            throw $exception;
        }
    }

    private function assertCancellable(Contract $contract): void
    {
        if ($contract->trashed()) {
            throw new DomainException('Gelöschte Verträge können nicht gekündigt werden.');
        }

        if (! $contract->isRecurring() || $contract->end_date === null) {
            throw new DomainException('Nur laufende wiederkehrende Verträge können gekündigt werden.');
        }

        if ($contract->status !== Contract::STATUS_ACTIVE) {
            throw new DomainException('Der Vertrag ist nicht aktiv.');
        }
    }
}
