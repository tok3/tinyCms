# Corrected Invoice Replacement Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Make the recurring invoice run replace a corrected contract invoice exactly once, using current contract billing terms and preserving the contractual billing date.

**Architecture:** Add one reusable `Invoice` query scope that defines which invoices count for recurring cadence, and use it for both cadence and duplicate checks. Invalidate a contract's checkout pricing snapshot whenever administrators change its price or interval, so the existing invoice fallback reads the current net price. A correction-specific idempotency key permits one replacement for a date whose original recurring claim already exists.

**Tech Stack:** PHP 8, Laravel/Eloquent, Filament, Pest, Laravel console scheduler

**Spec:** `docs/superpowers/specs/2026-11-11-corrected-invoice-replacement-design.md`

## Global Constraints

- No database migration.
- No customer- or contract-specific branches.
- Keep correction-invoice creation and its manual email step unchanged.
- Preserve existing monthly, annual, canceled-invoice, contract-lifecycle, and duplicate-prevention behavior.
- Replacement invoices use the contract's net cent value, 19 percent VAT, the original billing date, and the existing ten-weekday due-date rule.
- Do not mutate production billing data until deployment is verified and the user confirms the financial actions at action time.

## Review Focus

- A corrected invoice whose original recurring claim already exists still receives exactly one replacement.
- Re-running the command after the replacement cannot create or email a duplicate.
- The replacement, not the correction, anchors the following annual period.
- A billing-term edit removes only `pricing_snapshot`, preserving promotion metadata and unrelated contract data.
- Existing canceled invoices continue to advance cadence as before, while uncorrected paid or sent invoices remain valid cadence anchors.

---

### Task 1: Define correction-aware recurring cadence

**Files:**
- Modify: `app/Models/Invoice.php:109-137`
- Modify: `app/Console/Commands/GenerateRecurringInvoices.php:52-105`
- Test: `tests/Feature/Contracts/ContractBillingFallbackTest.php`

**Interfaces:**
- Produces: `Invoice::forRecurringCadence()` Eloquent scope, excluding correction invoices and originals that have a correction.
- Produces: replacement claim keys in the form `recurring-invoice:{contract}:{date}:replacement:{correction}` when the original claim key may already exist.
- Consumes: existing `Invoice::correctionInvoice()` and `Invoice::originalInvoice()` relationships.

- [ ] **Step 1: Write a failing regression test for a corrected annual invoice**

Add a Pest test named `it replaces a corrected invoice on its original billing date exactly once`. Use literal dates and amounts:

- today: `2026-11-12`
- contract start: `2026-11-02`
- interval: `annual`
- contract price: `46387` net cents
- original invoice: issue date `2026-11-02`, gross `55.20`, status `paid`
- correction invoice: issue date `2026-11-11`, `ref_to_id` set, gross `-55.20`, status `paid`
- pre-existing claim: `recurring-invoice:{contract}:2026-11-02`

Run the recurring command twice and assert against persisted invoices that exactly one uncorrected positive replacement exists for `2026-11-02`, with no second replacement on the second run.

- [ ] **Step 2: Run the new test and verify RED**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingFallbackTest.php --filter='replaces a corrected invoice'`

Expected: FAIL because the correction is currently selected as the latest cadence invoice, so no replacement is created.

- [ ] **Step 3: Implement `scopeForRecurringCadence` and use it consistently**

In `Invoice`, add `scopeForRecurringCadence(Builder $query): Builder` that requires `ref_to_id IS NULL` and no related correction invoice. In `GenerateRecurringInvoices`, use the scope for the latest-invoice query and the same-date duplicate query. Preserve the existing canceled-invoice advancement branch.

- [ ] **Step 4: Permit one replacement claim for a corrected date**

Before recording the lifecycle claim, find the latest correction associated with an original invoice for the target contract and issue date. Append `:replacement:{correction_id}` to the existing idempotency key only for that replacement case.

- [ ] **Step 5: Run the focused and existing billing tests**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingFallbackTest.php`

Expected: all tests pass, including canceled-invoice advancement and duplicate prevention.

- [ ] **Step 6: Commit Task 1**

```bash
git add app/Models/Invoice.php app/Console/Commands/GenerateRecurringInvoices.php tests/Feature/Contracts/ContractBillingFallbackTest.php
git commit -m "fix: replace corrected recurring invoices"
```

### Task 2: Make edited contract terms authoritative

**Files:**
- Modify: `app/Models/Contract.php:73-90`
- Create: `tests/Feature/Contracts/ContractBillingTermsTest.php`

**Interfaces:**
- Produces: an Eloquent `updated` hook that removes only `data.pricing_snapshot` after `price` or `interval` changes.
- Consumes: the recurring command's existing fallback from absent snapshot to `contract.price` and `invoice_text`.

- [ ] **Step 1: Write failing model tests**

Add real database tests named:

- `it removes the pricing snapshot when price changes`
- `it removes the pricing snapshot when interval changes`
- `it preserves the pricing snapshot for unrelated contract changes`

Each contract data fixture must include `pricing_snapshot`, `promotion`, and `bemerkung`. Assert that billing edits remove only `pricing_snapshot`, while unrelated edits preserve the complete data fixture.

- [ ] **Step 2: Run the new tests and verify RED**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingTermsTest.php`

Expected: the first two tests fail because the stale snapshot remains; the unrelated-change test passes.

- [ ] **Step 3: Implement the minimal model hook**

In `Contract::boot()`, add an `updated` callback. If neither `price` nor `interval` changed, return. Otherwise remove `pricing_snapshot` from the cast data array and persist only the changed data with `saveQuietly()`. Leave all other data keys untouched.

- [ ] **Step 4: Run the focused tests**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingTermsTest.php`

Expected: all three tests pass.

- [ ] **Step 5: Commit Task 2**

```bash
git add app/Models/Contract.php tests/Feature/Contracts/ContractBillingTermsTest.php
git commit -m "fix: clear stale contract pricing snapshots"
```

### Task 3: Prove the complete Krailling-shaped workflow

**Files:**
- Modify: `app/Models/Contract.php`
- Modify: `app/Filament/Resources/Admin/ContractResource.php`
- Modify: `app/Console/Commands/GenerateRecurringInvoices.php`
- Modify: `app/Models/Invoice.php`
- Modify: `tests/Feature/Contracts/ContractBillingFallbackTest.php`
- Modify: `tests/Feature/Contracts/ContractBillingTermsTest.php`
- Modify: `tests/Feature/Contracts/ContractLifecycleAdminTest.php`

**Interfaces:**
- Consumes: `Invoice::forRecurringCadence()` from Task 1.
- Consumes: contract snapshot invalidation from Task 2.
- Produces: a virtual `billing_gross` contract attribute backed by `data.billing_total_gross_cents` and editable in the contract admin.
- Verifies: generated invoice data and following annual cadence through the real command with only PDF/email creation isolated by the existing lightweight invoice service.

- [ ] **Step 1: Extend the regression test with the billing-term edit and exact totals**

Start the fixture with monthly price `4639`, interval `monthly`, and a monthly `pricing_snapshot`. First add failing tests that an explicit `billing_gross` value is persisted in contract data and exposed by the contract form. Update the contract through Eloquent to price `46387`, gross billing amount `55200` cents, and interval `annual`, then assert the snapshot is absent before running the command. Make the generator treat the explicit gross amount as authoritative and calculate tax as gross minus net. Assert the replacement has:

- `issue_date = 2026-11-02`
- `due_date = 2026-11-16`
- `total_net = 463.87`
- `tax = 88.13`
- `total_gross = 552.00`
- a single invoice item for `463.87`

- [ ] **Step 2: Run the exact scenario and verify GREEN**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingFallbackTest.php --filter='replaces a corrected invoice'`

Expected: PASS with one replacement and no duplicate after the second run.

- [ ] **Step 3: Prove the following annual cadence**

Advance the test clock to `2027-11-02`, run the command again, and assert exactly one new invoice for `2027-11-02` with gross `552.00`. This confirms the replacement is the new annual anchor.

- [ ] **Step 4: Run formatting and the full test suite**

Run: `./vendor/bin/pint --test app/Models/Invoice.php app/Models/Contract.php app/Console/Commands/GenerateRecurringInvoices.php app/Filament/Resources/Admin/ContractResource.php tests/Feature/Contracts/ContractBillingFallbackTest.php tests/Feature/Contracts/ContractBillingTermsTest.php tests/Feature/Contracts/ContractLifecycleAdminTest.php`

Expected: no formatting errors.

Run: `./vendor/bin/pest`

Expected: no failures beyond the 39-test baseline recorded before implementation. Report the pre-existing failures rather than hiding them.

- [ ] **Step 5: Commit Task 3 and documentation**

```bash
git add app/Models/Invoice.php app/Models/Contract.php app/Console/Commands/GenerateRecurringInvoices.php app/Filament/Resources/Admin/ContractResource.php tests/Feature/Contracts/ContractBillingFallbackTest.php tests/Feature/Contracts/ContractBillingTermsTest.php tests/Feature/Contracts/ContractLifecycleAdminTest.php docs/superpowers/specs/2026-11-11-corrected-invoice-replacement-design.md docs/superpowers/plans/2026-11-11-corrected-invoice-replacement.md
git commit -m "fix: preserve exact recurring invoice totals"
```

### Task 4: Deploy and verify before touching billing data

**Files:**
- No source changes expected.

**Interfaces:**
- Consumes: the verified commits from Tasks 1-3.
- Produces: a production deployment whose recurring command has the correction-aware behavior.

- [ ] **Step 1: Review the final diff and commit range**

Run `git diff <merge-base>...HEAD` and verify that only the planned models, command, tests, and documents changed.

- [ ] **Step 2: Re-run the focused regression immediately before deployment**

Run: `./vendor/bin/pest tests/Feature/Contracts/ContractBillingFallbackTest.php tests/Feature/Contracts/ContractBillingTermsTest.php`

Expected: zero failures.

- [ ] **Step 3: Integrate into `main` and push through the repository's established production path**

Push only the reviewed commits. Do not include unrelated untracked or dirty-worktree files. If pushing `main` is not sufficient to deploy, stop before billing actions and identify the actual production deployment step.

- [ ] **Step 4: Verify production deployment non-destructively**

Confirm the deployed revision or equivalent production signal and verify the admin remains reachable. Do not create a correction invoice or save contract 242 during this check.

- [ ] **Step 5: Request action-time confirmation for production billing changes**

Present the exact planned effects: one correction invoice for `-55.20 EUR`, contract 242 changed to `463.87 EUR` net and `annual`, and one new invoice for `552.00 EUR` gross sent to the municipality's billing address. Continue only after confirmation.
