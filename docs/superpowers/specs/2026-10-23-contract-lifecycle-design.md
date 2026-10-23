# Contract lifecycle and Mollie cancellation design

## Intent

Implement the contractual rule already published in the AGB: a contract has an initial term, renews by twelve months when no timely cancellation exists, and can be canceled with three months' notice. Admins must also be able to grant a documented goodwill termination on an earlier date. The database, feature access, invoices, and Mollie must not drift into contradictory states.

The solution must fit a small operation: one clear admin workflow, one scheduled command, strong automated tests, and no automatic refunds or other irreversible financial actions.

## Goals

- Record cancellation receipt and effective dates on the contract.
- Distinguish active, pending-cancellation, and ended contracts.
- Renew eligible contracts by twelve months after the notice deadline passes.
- Treat a cancellation received exactly on the deadline as timely.
- Schedule a late cancellation for the end of the already-triggered renewal term.
- Allow an admin to choose an earlier goodwill date, with a required reason and audit entry.
- Allow an admin to revoke a cancellation safely; keep Mollie when it is still active, or switch the reactivated contract to normal invoicing when Mollie has already canceled it.
- Keep service access active through the effective end date.
- Cancel a related Mollie subscription before the first charge outside the contract term.
- Make renewal and Mollie cancellation idempotent and retryable.
- Preserve an append-only audit trail for lifecycle decisions and external cancellation attempts.
- Enroll all active recurring existing contracts deterministically during migration.

## Non-goals

- No automatic refunds, credits, or cancellation emails.
- No complete accounting ledger or separate database record for every contract period.
- No customer self-service cancellation in this change.
- No attempt to recreate or reactivate a Mollie subscription that Mollie has already canceled; reactivation falls back to the application's normal invoice flow.
- No retroactive goodwill end date before the current day.
- No production data changes or live Mollie calls during development or deployment.

## Constraints and safety rules

- The concrete contract form remains higher priority than the AGB; the admin can override the calculated effective date only through the explicit goodwill workflow.
- A normal cancellation never ends service immediately. It disables further renewal and records the calculated effective date.
- A goodwill date may be today or a future date, but not a past date and not later than the normal calculated end.
- Mollie cancellation is not performed from the admin form. It is performed by an idempotent scheduled command one calendar day before the effective end, or immediately when that point has already passed.
- The contract remains the source of truth for service access. Canceling Mollie early must not remove features before the contract end.
- A failed Mollie request must not be marked successful locally. It remains retryable and makes the command fail visibly.
- The original cancellation and any former Mollie subscription identifier remain visible in the append-only audit trail after reactivation.
- No automated refund is attempted if a payment arrives after the effective end; the payment is retained for accounting, and a critical lifecycle event/log entry is created for manual handling.

The post-term payment check runs in `MolliePaymentController::handlePaymentNotification()` after the payment and its contract have been resolved. This is the common live entry point for subscription payments and provides the earliest reliable detection. The existing payment record and invoice flow are preserved for accounting; the new behavior adds the critical log and lifecycle event rather than hiding or refunding the payment.

## Approaches considered

### Selected: contract state plus append-only lifecycle events

Keep the current `contracts.end_date` model so existing feature and invoice code remains understandable. Add explicit lifecycle fields to the contract for its current state and an append-only event table for traceability. Centralize all date decisions in a service and all scheduled work in one command.

This gives the best safety-to-effort ratio: current code paths need only focused changes, while every renewal, cancellation, goodwill decision, and Mollie outcome remains auditable.

### Rejected: separate contract-period records

Creating one record per initial or renewed term gives the strongest accounting model, but requires a broad rewrite of feature access, billing, Filament resources, and contract queries. That cost is disproportionate to the current business.

### Rejected: fields only, without events

Adding only flags and dates is smaller, but an overwritten date would destroy the reason and actor behind a financial lifecycle decision. The small lifecycle-event table is worth the additional migration and model.

## Data model

Add to `contracts`:

- `status`: `active`, `cancellation_pending`, or `ended`.
- `auto_renew`: whether the scheduled process may extend the contract.
- `notice_period_months`: snapshot, default `3` for newly managed contracts.
- `renewal_period_months`: snapshot, default `12` for newly managed contracts.
- `cancellation_received_at`: when the notice was received.
- `cancellation_effective_at`: the contractual service end.
- `cancellation_reason`: optional for a normal cancellation, required for goodwill.
- `cancellation_is_goodwill`: explicit audit flag.
- `mollie_canceled_at`: set only after Mollie confirms cancellation or the local subscription is already confirmed canceled.

Create `contract_lifecycle_events`:

- contract reference, event type, optional acting user, occurrence time, and JSON context.
- Events include cancellation scheduled, goodwill cancellation scheduled, cancellation revoked, reactivated on invoice, renewal, Mollie cancellation succeeded, Mollie cancellation failed, contract ended, and unexpected post-term payment. Cancellation events store the previous and normally calculated end dates so a goodwill shortening can be reversed deterministically. Invoice reactivation events retain the former Mollie subscription identifier and last known payment date.
- Events are not exposed for editing or deletion in the admin UI.

## Existing-contract rollout

There are no unrecorded historical cancellations. All active recurring contracts in the system participate in automatic renewal.

- During migration, every non-deleted recurring contract whose `end_date` is today or later receives `auto_renew = true`, `status = active`, a three-month notice period, and a twelve-month renewal period.
- Newly created recurring contracts receive the same defaults; one-time contracts receive `auto_renew = false`.
- The admin edit page shows whether automatic renewal is enabled and allows the contract-specific notice and renewal periods to be adjusted because the signed contract has priority over the AGB defaults.
- Scheduling a cancellation always sets `auto_renew = false`.
- Existing contracts already past `end_date`, soft-deleted contracts, and one-time contracts are not enrolled. Past recurring contracts are marked `ended` and are never resurrected automatically.

The migration is deterministic and requires no one-time per-contract activation step after deployment.

## Lifecycle rules

### Normal cancellation

1. Calculate the deadline as `end_date - notice_period_months` using no-overflow month arithmetic.
2. If `cancellation_received_at <= deadline`, the effective date is the current `end_date`.
3. If received later, extend `end_date` once by `renewal_period_months`, increment `iteration`, and use that new date as the cancellation effective date.
4. Set `status = cancellation_pending`, `auto_renew = false`, and write the lifecycle event in the same database transaction.

### Goodwill cancellation

The admin enters an effective date and a required reason. The date must be today or later and no later than the normally calculated effective date. Set the contract `end_date` and cancellation effective date to the goodwill date, disable renewal, and append a goodwill event in one transaction.

### Revoking or reactivating a cancellation

An admin can use **Kündigung zurücknehmen** while the contract is `cancellation_pending`, or reactivate an ended contract when the cancellation was a mistake. The action requires a reason, previews the resulting end and billing dates, and runs its database changes in one transaction.

- Restore the pre-goodwill normal end date from the cancellation event when goodwill shortened the term.
- Clear the current cancellation fields, set `status = active`, and enable automatic renewal.
- If the notice deadline has already passed by the revocation date, apply the renewal periods that are now contractually due until the end date is current; otherwise leave the current end date unchanged for the normal scheduler.
- Append a cancellation-revoked event containing the prior cancellation data and acting admin.
- Restore soft-deleted feature pivots belonging to this contract.

If Mollie has not yet canceled the subscription, the existing Mollie link remains unchanged. If Mollie has already canceled it, the same subscription cannot be resumed. In that case the admin action explicitly confirms **Auf normale Rechnung umstellen**, stores the former subscription identifier in the audit event, clears `contracts.subscription_id` and `subscription_start_date`, and leaves the local Mollie subscription record canceled. The existing recurring-invoice command then uses the latest invoice attached to the contract to continue the established monthly or annual cadence. This prevents a duplicate invoice for an already paid Mollie period while allowing genuinely missed contractual periods to be invoiced normally.

### Automatic renewal

The daily command selects active, non-deleted, recurring contracts with `auto_renew = true`. On the day after the notice deadline passes, it extends `end_date` by the renewal period and increments `iteration`. Row locking and a lifecycle-event uniqueness guard make reruns safe.

### Ending and access

The contract changes to `ended` on the day after its effective end date. Existing feature cleanup continues to use `end_date`, so access remains available through the agreed final day and is removed afterward.

## Mollie behavior

Use a small gateway interface around the Mollie API so date logic can be tested without network calls.

- The daily lifecycle command considers a pending cancellation due for Mollie when today is on or after `cancellation_effective_at - 1 day`.
- It reads the remote subscription status first and sends a cancellation request only while Mollie does not already report `canceled`. This repairs the narrow case where Mollie accepted a previous DELETE but the local database commit failed afterward.
- It accepts Mollie's current successful cancellation response and records `mollie_canceled_at` plus the local subscription status in one transaction.
- If the local subscription is already confirmed canceled, it records the completion without another external request.
- On API errors or missing customer/subscription identifiers, it records a failed attempt, returns a failing command status, and retries on the next scheduled run.
- The existing immediate admin Mollie-delete action is removed or replaced by a link back to the contract cancellation workflow.
- The current customer method that only changes local status is not used as a cancellation mechanism.

## Admin workflow

The contract edit page displays lifecycle status, current contractual end, notice deadline, auto-renewal state, cancellation receipt/effective dates, goodwill marker, and Mollie completion state.

An admin action **Kündigung vormerken** opens a modal with:

- receipt date, default today;
- goodwill toggle;
- goodwill effective date, only when enabled;
- reason/note, mandatory for goodwill.

Before saving, the modal shows the calculated normal effective date. Saving calls the lifecycle service; admins do not edit lifecycle database fields directly.

For a pending or ended cancellation, a separate **Kündigung zurücknehmen** action asks for a mandatory reason and shows whether revocation will trigger renewal. When Mollie is already canceled, it also shows and requires confirmation that future billing switches to normal invoices; no Mollie subscription is recreated.

## Scheduled processing

Add one `contracts:process-lifecycle` command, scheduled daily in the `Europe/Berlin` timezone before the existing feature cleanup and protected with `withoutOverlapping()`.

Processing order:

1. renew contracts whose notice deadline has passed;
2. cancel due Mollie subscriptions;
3. mark contracts ended after their final service day.

Each stage is idempotent so an interrupted run can safely be repeated.

## Testing strategy

Use feature/integration tests with the real database models and transactions. Fake only the external Mollie gateway.

Required boundary tests:

- notice received exactly on the deadline remains timely;
- notice received one day late ends after one twelve-month renewal;
- repeated processing does not renew twice or call Mollie twice;
- goodwill requires a reason and rejects past or later-than-normal dates;
- revocation restores a goodwill-shortened end date and records the acting admin and reason;
- revocation after the notice deadline applies each contractually due renewal exactly once;
- reactivation after Mollie cancellation clears the contract's subscription link, preserves it in the audit event, restores features, and continues invoice cadence after the last paid Mollie invoice;
- reactivation does not create both a Mollie charge and a normal invoice for the same billing period;
- no Mollie call occurs before the due day;
- due cancellation updates local state only after external success;
- API failure remains retryable and returns a failed command status;
- active existing recurring contracts are enrolled, while expired, deleted, and one-time contracts are not;
- new recurring contracts opt into renewal while one-time contracts do not;
- feature access remains through the effective date and is removed afterward;
- a post-term payment creates an audit alert without attempting an automatic refund.

## Deployment

The deliverable is source code, migrations, tests, and an operational note. Deployment and migration execution remain manual. After upload:

1. back up the production database;
2. run migrations;
3. verify the scheduler recognizes the new command;
4. verify a sample of active recurring, one-time, expired, and deleted contracts received the expected lifecycle defaults;
5. enter the actual receipt date from the customer's cancellation for contract 142 through the new admin action;
6. verify that a receipt date on or before 24 March 2027 calculates 24 June 2027 as the effective date, and that Mollie remains pending rather than being canceled immediately.
