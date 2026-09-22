# IncluCert referrer rollout - 2026-09-08

Status: prepared locally, not deployed by Codex.
Scope: decouple `/api/inclucert/{ulid}/visit` referrer recording from the
HTTP request.

## Goal

IncluCert visit tracking previously performed referrer persistence, URL
creation, locking, and initial scan triggering synchronously inside
`IncluCertController::recordVisit()`. A busy cache lock could therefore delay
or break the API response.

The new flow keeps the synchronous validation behavior but moves the database
write and scan preparation into the queue.

## Changed behavior

Before:

- `recordVisit()` validated the company, `inclucert` feature, submitted URL,
  and own-domain exclusion.
- The same request then waited up to five seconds on a cache lock.
- The request created or incremented the referrer.
- Newly discovered URLs could be inserted into `pa11y_urls`.
- Initial scans were started with `shell_exec(getWcagScanShellCommand(...))`.

After:

- `recordVisit()` still validates the company, `inclucert` feature, submitted
  URL, and own-domain exclusion synchronously.
- Valid visits return `{"status":"ok"}` without waiting for referrer storage.
- The actual referrer recording runs in `ProcessIncluCertVisitJob` on the
  `referrers` queue.
- Referrer persistence is shared with the widget path through
  `ReferrerRecordingService`.
- Initial scans are queued through `ScanAccessibilityJob`; no scan is started
  with `shell_exec()` from the request.

## Files

- `app/Http/Controllers/IncluCertController.php`
- `app/Jobs/ProcessIncluCertVisitJob.php`
- `app/Services/ReferrerRecordingService.php`
- `app/Services/WidgetReferrerService.php`
- `tests/Feature/IncluCertVisitProcessingTest.php`
- `tests/Feature/WidgetReferrerProcessingTest.php`
- `tests/TestCase.php`

## Shared recording service

`ReferrerRecordingService` owns the critical persistence section for both
Widget and IncluCert referrer recording:

- Uses `referrer_events.event_uuid` to make queue retries idempotent.
- Uses a company-wide cache lock:
  `referrer-recording-company:{company_ulid}`.
- Uses a database transaction around event, referrer, URL, and scan-job
  scheduling changes.
- Keeps the old counter semantics:
  - New referrer: `count = 0`.
  - Existing referrer: atomic `increment('count')`.
- Enforces the company URL limit while holding the company-wide lock.
- Queues an accessibility scan only when a new `pa11y_urls` row was created.

The company-wide lock is intentional. A per-URL lock would protect duplicate
URLs, but it would not protect the company-wide URL limit under parallel new
URL discoveries.

## Queue behavior

IncluCert visit processing requires an asynchronous Laravel queue driver.
`sync` and `null` drivers are treated as unsafe for this goal:

- The controller returns the normal response.
- Referrer processing is skipped.
- A warning is written to the Laravel log.

This avoids silently reintroducing synchronous work into the request path.

Required queues:

- `referrers`: processes `ProcessIncluCertVisitJob` and
  `ProcessWidgetReferrerJob`.
- `accessibility`: processes `ScanAccessibilityJob`.

Example worker command for a test system:

```sh
php artisan queue:work database --queue=referrers --tries=4 --timeout=30 --sleep=1
```

Existing accessibility workers must continue to consume the `accessibility`
queue.

## Installation notes

No additional migration is introduced by this IncluCert follow-up commit.
However, it depends on the previous widget-referrer migration commit being
installed:

- `referrer_events` table must exist.
- Unique index on `referrers(ulid, referrer)` should exist.
- Unique index on `pa11y_urls(company_id, url)` should exist.

Recommended testserver sequence:

1. Pull the commit.
2. Confirm the previous referrer migrations are present:

   ```sh
   php artisan migrate:status | grep referrer
   ```

3. Run pending migrations if needed:

   ```sh
   php artisan migrate
   ```

4. Confirm the queue driver is asynchronous:

   ```sh
   php artisan tinker --execute="dump(config('queue.default'), config('queue.connections.'.config('queue.default').'.driver'));"
   ```

5. Ensure a worker consumes `referrers`.
6. Ensure a worker consumes `accessibility`.
7. Clear cached config/routes and restart queue workers:

   ```sh
   php artisan optimize:clear
   php artisan queue:restart
   ```

8. Smoke-test IncluCert visit tracking with a valid customer ULID:

   ```sh
   curl -i -X POST 'https://example.test/api/inclucert/{ulid}/visit' \
     -H 'Content-Type: application/json' \
     --data '{"url":"https://www.example.com/test-page"}'
   ```

Expected immediate response:

```json
{"status":"ok"}
```

Then verify asynchronously:

- A row appears in `jobs` briefly or the worker log shows processing.
- `referrer_events` contains a processed event.
- `referrers` contains or increments the normalized URL.
- A new `pa11y_urls` row appears only if the company still has URL capacity.
- A scan job is queued only for newly inserted URLs.

## Local verification

The focused tests passed locally after applying the previous migrations:

```sh
php artisan test tests/Feature/IncluCertVisitProcessingTest.php tests/Feature/WidgetReferrerProcessingTest.php
```

Result:

```text
15 passed
48 assertions
```

Local caveat: the existing untracked file
`app/Filament/Pages/_Dashboard.php` declares a duplicate Filament Dashboard
class and prevents Artisan from booting. It was temporarily moved aside for
the local test run and restored immediately afterwards.

## Remaining risks

- If no `referrers` worker is running, valid IncluCert API responses still
  return quickly, but visit recording will remain queued or be skipped when
  the queue driver is `sync`/`null`.
- If no `accessibility` worker is running, newly discovered URLs are stored
  but initial scans will not execute until that queue is processed.
- The unique `pa11y_urls(company_id, url)` index also covers soft-deleted
  rows. Re-adding a soft-deleted URL for the same company may therefore need
  an explicit restore/cleanup policy later.
- `referrer_events` currently has no retention cleanup. A scheduled cleanup
  policy should be considered once production volume is known.
