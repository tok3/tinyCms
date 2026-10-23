# Contract Lifecycle and Mollie Cancellation Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Verträge verlängern sich nach Ablauf der Kündigungsfrist automatisch, Kündigungen werden sicher terminiert, Mollie wird erst zum Vertragsende beendet und irrtümliche Kündigungen können entweder mit bestehendem Mollie-Abo oder auf Rechnungszahlung reaktiviert werden.

**Architecture:** Der bestehende `contracts.end_date`-Ansatz bleibt erhalten. Ein zentraler `ContractLifecycleService` entscheidet über Kündigung, Verlängerung, Widerruf und Vertragsende; ein kleiner Mollie-Adapter kapselt den einzigen externen DELETE-Aufruf. Ein tägliches Kommando führt fällige Schritte idempotent aus, Filament ruft nur den Service auf, und eine kompakte Event-Tabelle hält alle finanziell relevanten Entscheidungen unveränderlich fest.

**Tech Stack:** PHP 8.1+, Laravel 10, Eloquent, Filament 3, Pest 2, Guzzle 7, Carbon.

**Spec:** `docs/superpowers/specs/2026-10-23-contract-lifecycle-design.md`

## Global Constraints

- Die konkreten Vertragsdaten haben Vorrang; Standardwerte sind drei Monate Kündigungsfrist und zwölf Monate Verlängerung.
- Eine Kündigung am Stichtag ist fristgerecht; ab dem Folgetag ist die nächste Verlängerung fällig.
- Normale Kündigungen beenden weder Zugriff noch Mollie sofort.
- Kulanztermine dürfen nur heute oder später und nicht nach dem normal berechneten Vertragsende liegen; eine Begründung ist Pflicht.
- Eine bei Mollie gekündigte Subscription kann nicht reaktiviert werden; der Widerruf wechselt dann nach ausdrücklicher Admin-Bestätigung auf normale Rechnung.
- Keine automatische Erstattung, Gutschrift oder Kündigungsmail.
- Keine Live-Mollie-Aufrufe in Tests oder während der Entwicklung.
- Bestehende, nicht abgelaufene wiederkehrende Verträge werden bei der Migration automatisch aktiviert; `one_time`, gelöschte und abgelaufene Verträge nicht.
- Änderungen bleiben auf die Vertrags-, Mollie-, Rechnungs- und Feature-Abläufe beschränkt; bestehende unbeteiligte Dateien im Arbeitsverzeichnis bleiben unangetastet.

## Review Focus

- Monatsende/Schaltjahr bei `subMonthsNoOverflow()` und `addMonthsNoOverflow()` darf die Frist oder Verlängerung nicht verschieben; Task 2 testet 31. Mai und 29. Februar.
- Ein fehlender lokaler Mollie-Datensatz oder eine fehlende Customer-ID muss sichtbar fehlschlagen und beim nächsten Lauf erneut versucht werden; Task 3 testet beide Fälle.
- `annual` und das ältere `yearly` müssen als wiederkehrend gelten, `one_time` nie; Tasks 1 und 3 testen diese Varianten.
- Zwei parallel oder nacheinander gestartete Lifecycle-Läufe dürfen weder doppelt verlängern noch Mollie doppelt kündigen; Task 3 testet Event-Schlüssel und Wiederholung.
- Nach Wechsel auf Rechnung darf für einen bereits per Mollie bezahlten Zeitraum keine zweite Rechnung entstehen; Task 5 testet die nächste Fälligkeit gegen die letzte vorhandene Rechnung.

---

### Task 1: Lifecycle-Datenmodell und sichere Bestandsübernahme

**Files:**
- Create: `database/migrations/2026_10_23_000001_add_lifecycle_fields_to_contracts_table.php`
- Create: `database/migrations/2026_10_23_000002_create_contract_lifecycle_events_table.php`
- Create: `app/Models/ContractLifecycleEvent.php`
- Modify: `app/Models/Contract.php`
- Test: `tests/Feature/Contracts/ContractLifecycleDataTest.php`

**Interfaces:**
- Produces: `Contract::STATUS_ACTIVE`, `Contract::STATUS_CANCELLATION_PENDING`, `Contract::STATUS_ENDED`, `Contract::isRecurring(): bool`, `Contract::lifecycleEvents(): HasMany`.
- Produces: `ContractLifecycleEvent::record(Contract $contract, string $type, array $context = [], ?int $actorId = null, ?string $idempotencyKey = null): self`.
- Produces columns: `status`, `auto_renew`, `notice_period_months`, `renewal_period_months`, `cancellation_received_at`, `cancellation_effective_at`, `cancellation_reason`, `cancellation_is_goodwill`, `mollie_canceled_at`.

- [ ] **Step 1: Write the failing data-model tests**

  In `ContractLifecycleDataTest.php`, assert:
  - a newly created `monthly`, `annual`, or legacy `yearly` contract defaults to active with `auto_renew=true`, notice `3`, renewal `12`;
  - `one_time` defaults to `auto_renew=false`;
  - lifecycle date/boolean casts return Carbon/boolean values;
  - a lifecycle event belongs to its contract and stores JSON context, actor and a unique idempotency key;
  - updating or deleting a saved lifecycle event throws a `LogicException`.

- [ ] **Step 2: Run the focused test and confirm RED**

  Run: `php artisan test tests/Feature/Contracts/ContractLifecycleDataTest.php`

  Expected: FAIL because columns/model/constants do not exist.

- [ ] **Step 3: Add the contract lifecycle columns and deterministic backfill**

  Migration rules:
  - add `status` with database default `active`, `auto_renew` with default `false`, notice default `3`, renewal default `12`, and nullable cancellation/Mollie fields; index `status`, `auto_renew`, and `cancellation_effective_at`;
  - active means `deleted_at IS NULL`, `end_date >= CURRENT_DATE`, recurring interval in `daily`, `weekly`, `monthly`, `annual`, `yearly`;
  - those rows become `active`, `auto_renew=true`, notice `3`, renewal `12`;
  - past recurring rows become `ended`, `auto_renew=false`;
  - deleted, `one_time`, and null-end rows remain non-renewing;
  - `down()` only removes the new columns.

- [ ] **Step 4: Add the append-only event table and model**

  Table fields: `contract_id`, nullable `user_id`, `type`, `occurred_at`, nullable unique `idempotency_key`, JSON `context`, timestamps. Use `cascadeOnDelete()` for the contract, `nullOnDelete()` for the user. The model permits creation but rejects updates/deletes in model events.

- [ ] **Step 5: Update `Contract` without introducing enums**

  Add constants, fillable fields, casts, `lifecycleEvents()`, and `isRecurring()`. In the existing `creating` callback set the renewal default from `isRecurring()` only when `auto_renew` was not explicitly supplied. Remove the duplicate `created` callback while preserving one feature-assignment call.

- [ ] **Step 6: Run focused tests and migration smoke checks**

  Run:
  - `php artisan test tests/Feature/Contracts/ContractLifecycleDataTest.php`
  - `php artisan migrate:status`

  Expected: tests PASS; new migrations are listed without executing against production.

- [ ] **Step 7: Commit the data foundation**

  ```bash
  git add app/Models/Contract.php app/Models/ContractLifecycleEvent.php database/migrations/2026_10_23_000001_add_lifecycle_fields_to_contracts_table.php database/migrations/2026_10_23_000002_create_contract_lifecycle_events_table.php tests/Feature/Contracts/ContractLifecycleDataTest.php
  git commit -m "feat: add contract lifecycle state"
  ```

### Task 2: Kündigung, Kulanz und Widerruf als zentrale Transaktionen

**Files:**
- Create: `app/Services/Contracts/ContractLifecycleService.php`
- Test: `tests/Feature/Contracts/ContractLifecycleServiceTest.php`

**Interfaces:**
- Consumes: Task 1 constants, casts and `ContractLifecycleEvent::record()`.
- Produces: `normalEffectiveDate(Contract $contract, CarbonInterface $receivedOn): CarbonImmutable`.
- Produces: `scheduleCancellation(int $contractId, CarbonInterface $receivedOn, ?CarbonInterface $goodwillEnd, ?string $reason, ?int $actorId): Contract`.
- Produces: `revokeCancellation(int $contractId, string $reason, bool $confirmInvoiceFallback, ?int $actorId): Contract`.

- [ ] **Step 1: Write failing cancellation-calculation tests**

  Assert:
  - contract end `2027-06-24`, received `2027-03-24` => effective `2027-06-24`, no iteration change;
  - received `2027-03-25` => end/effective `2028-06-24`, iteration increments once;
  - repeated scheduling is rejected and cannot extend twice;
  - a `2028-05-31` end and a leap-day end use no-overflow month arithmetic;
  - non-recurring, ended, deleted, or missing-end contracts are rejected.

- [ ] **Step 2: Run the calculation tests and confirm RED**

  Run: `php artisan test tests/Feature/Contracts/ContractLifecycleServiceTest.php --filter=normal`

- [ ] **Step 3: Implement normal cancellation in one locked transaction**

  `scheduleCancellation()` reloads the row with `lockForUpdate()`, calculates the deadline, applies at most one renewal, sets pending state and `auto_renew=false`, then records `cancellation_scheduled` with old/new end, deadline, receipt date and actor.

- [ ] **Step 4: Add failing goodwill tests**

  Assert missing reason, past date, and date after normal effective end are rejected; today and a valid future date succeed, set both end fields, and preserve the normal end in event context.

- [ ] **Step 5: Implement goodwill within the same scheduling method**

  Use event type `goodwill_cancellation_scheduled`; set `cancellation_is_goodwill=true`; never accept a retroactive date.

- [ ] **Step 6: Add failing revocation/reactivation tests**

  Assert:
  - pending cancellation with active Mollie keeps `subscription_id` and clears cancellation state;
  - goodwill revocation restores the stored normal end;
  - revocation after a passed deadline applies each due renewal once using no-overflow arithmetic;
  - canceled Mollie requires `confirmInvoiceFallback=true`, then clears `subscription_id` and `subscription_start_date` but leaves the local Mollie row canceled;
  - the fallback event stores former subscription ID, last known paid payment date, reason and actor;
  - soft-deleted `company_feature` rows for the contract are restored;
  - a repeated revocation is rejected.

- [ ] **Step 7: Implement revocation and invoice fallback**

  `revokeCancellation()` requires a nonblank reason and a pending/ended canceled contract. It restores the pre-goodwill end, applies contractually due renewals, resets lifecycle fields, restores feature pivots, and records either `cancellation_revoked` or `reactivated_on_invoice` in the transaction.

- [ ] **Step 8: Run the complete service tests**

  Run: `php artisan test tests/Feature/Contracts/ContractLifecycleServiceTest.php`

  Expected: PASS.

- [ ] **Step 9: Commit the lifecycle rules**

  ```bash
  git add app/Services/Contracts/ContractLifecycleService.php tests/Feature/Contracts/ContractLifecycleServiceTest.php
  git commit -m "feat: manage contract cancellation lifecycle"
  ```

### Task 3: Idempotenter Tagesjob und Mollie-Kündigung

**Files:**
- Create: `app/Contracts/MollieSubscriptionGateway.php`
- Create: `app/Services/Mollie/MollieApiSubscriptionGateway.php`
- Create: `app/Console/Commands/ProcessContractLifecycle.php`
- Modify: `app/Providers/AppServiceProvider.php`
- Modify: `app/Console/Kernel.php`
- Modify: `app/Services/Contracts/ContractLifecycleService.php`
- Test: `tests/Feature/Contracts/ProcessContractLifecycleTest.php`
- Test: `tests/Unit/MollieApiSubscriptionGatewayTest.php`

**Interfaces:**
- Produces: `MollieSubscriptionGateway::status(string $customerId, string $subscriptionId): string` and `cancel(string $customerId, string $subscriptionId): void`.
- Produces service methods `renewDueContract(int $contractId, CarbonInterface $today): bool`, `cancelMollieIfDue(int $contractId, CarbonInterface $today): bool`, `endIfDue(int $contractId, CarbonInterface $today): bool`.
- Produces command `contracts:process-lifecycle {--date= : Test-only processing date in Y-m-d}` with exit code `SUCCESS` or `FAILURE`.

- [ ] **Step 1: Write failing gateway tests**

  With Guzzle `MockHandler`, assert GET/DELETE use `/v2/customers/{customer}/subscriptions/{subscription}`, include the bearer key, parse the returned status, accept DELETE HTTP 200 and legacy 204, and throw on 4xx/5xx. No network call is permitted.

- [ ] **Step 2: Implement and bind the Mollie gateway**

  Read the key from `config('mollie.key')`; bind the interface to `MollieApiSubscriptionGateway` in `AppServiceProvider`. Do not expose a general-purpose Mollie client.

- [ ] **Step 3: Write failing command tests for renewal and ending**

  Assert:
  - an active recurring contract renews only on the day after its deadline;
  - `annual` and `yearly` renew, `one_time` does not;
  - repeated execution keeps one renewal and one uniquely keyed renewal event;
  - a pending contract becomes ended only the day after its effective date;
  - expired access therefore remains through the complete final day.

- [ ] **Step 4: Implement renewal and end processing**

  Each service method uses `lockForUpdate()` and an idempotency key based on contract, event type and period. The command queries only candidate IDs, processes each independently, and continues collecting failures so one contract cannot block all others.

- [ ] **Step 5: Write failing command tests for Mollie**

  Mock `MollieSubscriptionGateway` and assert:
  - no call before `effective_end - 1 day`;
  - on/after due date the service first reads the remote status and sends DELETE only while it is not already `canceled`;
  - HTTP success sets local subscription status `canceled` and `mollie_canceled_at` in the transaction;
  - an already-local-canceled subscription records success without an API call, and a remotely canceled/local-active subscription repairs local state without DELETE;
  - API failure, missing subscription record, or missing customer ID records `mollie_cancellation_failed`, leaves `mollie_canceled_at` null, returns command failure, and succeeds on a later retry;
  - two runs do not issue a second external cancellation;
  - a simulated DB failure after successful DELETE is repaired by the next run's remote-status GET without sending a second DELETE.

- [ ] **Step 6: Implement Mollie processing and visible failures**

  Use event types `mollie_cancellation_succeeded` and `mollie_cancellation_failed`. The remote-status check closes the crash window between Mollie success and local commit. Never set success state in the exception path. Log contract and subscription IDs but never the API key or personal payment data.

- [ ] **Step 7: Schedule the command before invoices and cleanup**

  In `Kernel`, schedule at `07:30` Europe/Berlin with `withoutOverlapping()`. Add `withoutOverlapping()` and the same timezone to the existing recurring-invoice and cleanup jobs; preserve their existing run times.

- [ ] **Step 8: Run command and gateway tests**

  Run:
  - `php artisan test tests/Feature/Contracts/ProcessContractLifecycleTest.php`
  - `php artisan test tests/Unit/MollieApiSubscriptionGatewayTest.php`
  - `php artisan schedule:list | grep -E 'contracts:process-lifecycle|app:generate-recurring-invoices|app:cleanup'`

  Expected: tests PASS; lifecycle appears before the invoice and cleanup jobs.

- [ ] **Step 9: Commit scheduled processing**

  ```bash
  git add app/Contracts/MollieSubscriptionGateway.php app/Services/Mollie/MollieApiSubscriptionGateway.php app/Console/Commands/ProcessContractLifecycle.php app/Services/Contracts/ContractLifecycleService.php app/Providers/AppServiceProvider.php app/Console/Kernel.php tests/Feature/Contracts/ProcessContractLifecycleTest.php tests/Unit/MollieApiSubscriptionGatewayTest.php
  git commit -m "feat: process renewals and Mollie cancellations"
  ```

### Task 4: Einfache und sichere Admin-Aktionen

**Files:**
- Modify: `app/Filament/Resources/Admin/ContractResource.php`
- Modify: `app/Filament/Resources/Admin/ContractResource/Pages/EditContract.php`
- Modify: `app/Filament/Resources/Admin/MollieSubscriptionResource.php`
- Test: `tests/Feature/Contracts/ContractLifecycleAdminTest.php`

**Interfaces:**
- Consumes: Task 2 service methods.
- Produces Filament actions `scheduleCancellation` and `revokeCancellation`; neither action talks directly to Mollie.

- [ ] **Step 1: Write failing Filament action tests**

  Assert an authenticated admin can:
  - schedule a normal cancellation with receipt date and see the calculated effective date;
  - schedule goodwill only with date and reason;
  - revoke with mandatory reason;
  - revoke after Mollie cancellation only after confirming invoice fallback.

  Assert raw lifecycle state, subscription ID and cancellation dates cannot be changed through ordinary form dehydration.

- [ ] **Step 2: Add a read-only lifecycle section**

  Show status, end date, notice deadline, auto-renewal, cancellation receipt/effective dates, goodwill marker and Mollie completion. Keep only `notice_period_months` and `renewal_period_months` editable for contract-specific deviations; validate integer range `1..120`.

- [ ] **Step 3: Add `Kündigung vormerken`**

  The modal accepts receipt date (today by default), goodwill toggle/date and reason. It previews `normalEffectiveDate()` and calls only `scheduleCancellation()` with the signed-in user ID.

- [ ] **Step 4: Add `Kündigung zurücknehmen`**

  Require reason. When Mollie is already canceled, display and require the exact confirmation `Auf normale Rechnung umstellen`; call only `revokeCancellation()`.

- [ ] **Step 5: Remove the immediate Mollie deletion action**

  Replace `Subscription kündigen` in `MollieSubscriptionResource` with a non-destructive link/message directing the admin to the associated contract. No Filament action may send DELETE to Mollie.

- [ ] **Step 6: Run admin tests**

  Run: `php artisan test tests/Feature/Contracts/ContractLifecycleAdminTest.php`

  Expected: PASS.

- [ ] **Step 7: Commit the admin workflow**

  ```bash
  git add app/Filament/Resources/Admin/ContractResource.php app/Filament/Resources/Admin/ContractResource/Pages/EditContract.php app/Filament/Resources/Admin/MollieSubscriptionResource.php tests/Feature/Contracts/ContractLifecycleAdminTest.php
  git commit -m "feat: add safe contract cancellation actions"
  ```

### Task 5: Rechnung-Fallback und Warnung bei verspäteten Mollie-Zahlungen

**Files:**
- Modify: `app/Console/Commands/GenerateRecurringInvoices.php`
- Modify: `app/Http/Controllers/MolliePaymentController.php`
- Test: `tests/Feature/Contracts/ContractBillingFallbackTest.php`

**Interfaces:**
- Consumes: active/pending/ended statuses and `reactivated_on_invoice` state from Tasks 1–2.
- Produces: event `unexpected_post_term_payment` with an idempotency key based on contract and Mollie payment ID.

- [ ] **Step 1: Write failing invoice-fallback tests**

  Assert:
  - after invoice fallback, the latest existing Mollie-backed invoice controls the next monthly/annual issue date;
  - no second invoice is created for that already paid period;
  - active and cancellation-pending invoice contracts can bill through end date, ended contracts cannot;
  - two command runs cannot produce two invoices with the same contract and issue date.

- [ ] **Step 2: Harden the existing invoice command minimally**

  Preserve its pricing/email behavior. Restrict eligible lifecycle states to active/pending, include legacy `yearly` as annual, derive the next date from the latest invoice whose status is not `canceled`, and guard invoice creation by `(contract_id, issue_date)` before calling `InvoiceService`.

- [ ] **Step 3: Write failing post-term webhook tests**

  Fake the Mollie facade response and assert a paid subscription webhook after `cancellation_effective_at`:
  - keeps the payment and normal invoice preparation path;
  - creates one `unexpected_post_term_payment` lifecycle event and critical log entry;
  - never calls refund APIs;
  - remains idempotent when Mollie repeats the webhook.

- [ ] **Step 4: Add the post-term detection to the existing webhook**

  After resolving the contract and persisting a payment whose status is `paid`, compare the payment's paid/created date with the effective end. Only dates strictly after the inclusive effective end are alerts. Record/log only; do not alter the payment, invoice or contract.

- [ ] **Step 5: Run billing tests**

  Run: `php artisan test tests/Feature/Contracts/ContractBillingFallbackTest.php`

  Expected: PASS.

- [ ] **Step 6: Commit billing safety**

  ```bash
  git add app/Console/Commands/GenerateRecurringInvoices.php app/Http/Controllers/MolliePaymentController.php tests/Feature/Contracts/ContractBillingFallbackTest.php
  git commit -m "fix: keep billing aligned with contract lifecycle"
  ```

### Task 6: Betriebsanleitung und Gesamtprüfung

**Files:**
- Create: `docs/operations/contract-lifecycle-rollout.md`
- Modify only if verification finds an in-scope defect: files from Tasks 1–5 and their tests.

**Interfaces:**
- Consumes all prior tasks; produces an upload/migration checklist without automatic deployment.

- [ ] **Step 1: Write the short rollout note**

  Include: database backup, upload order, `php artisan migrate --force`, `php artisan optimize:clear`, `php artisan schedule:list`, sample queries/checks for recurring/one-time/expired/deleted contracts, rollback limitation after real cancellations, and the exact contract-142 admin check (`24.03.2027` receipt => `24.06.2027` effective; Mollie still active until due).

- [ ] **Step 2: Run formatter on touched PHP files**

  Run: `./vendor/bin/pint app/Contracts/MollieSubscriptionGateway.php app/Services/Mollie/MollieApiSubscriptionGateway.php app/Services/Contracts/ContractLifecycleService.php app/Models/Contract.php app/Models/ContractLifecycleEvent.php app/Console/Commands/ProcessContractLifecycle.php app/Console/Commands/GenerateRecurringInvoices.php app/Console/Kernel.php app/Providers/AppServiceProvider.php app/Http/Controllers/MolliePaymentController.php app/Filament/Resources/Admin/ContractResource.php app/Filament/Resources/Admin/ContractResource/Pages/EditContract.php app/Filament/Resources/Admin/MollieSubscriptionResource.php tests/Feature/Contracts tests/Unit/MollieApiSubscriptionGatewayTest.php`

  Expected: exit 0.

- [ ] **Step 3: Run focused lifecycle suite**

  Run: `php artisan test tests/Feature/Contracts tests/Unit/MollieApiSubscriptionGatewayTest.php`

  Expected: PASS with no real HTTP calls.

- [ ] **Step 4: Run the complete existing test suite**

  Run: `php artisan test`

  Expected: PASS. If unrelated pre-existing failures occur, record exact commands and output separately; do not change unrelated code.

- [ ] **Step 5: Run static/runtime smoke checks**

  Run:
  - `php artisan migrate:status`
  - `php artisan list | grep contracts:process-lifecycle`
  - `php artisan schedule:list`
  - `git diff --check`

  Expected: migrations and command are registered, schedule is ordered, and no whitespace errors exist.

- [ ] **Step 6: Review the final diff for financial safety**

  Confirm: no immediate admin DELETE remains; no API key is logged; no refund call exists; all Mollie calls are behind the gateway; success timestamps are written only after confirmed success; invoice fallback clears only the contract link and preserves the local canceled Mollie row/event history.

- [ ] **Step 7: Commit documentation and final adjustments**

  ```bash
  git add docs/operations/contract-lifecycle-rollout.md
  git commit -m "docs: add contract lifecycle rollout guide"
  ```
