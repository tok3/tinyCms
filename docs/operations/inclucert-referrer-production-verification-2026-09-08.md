# IncluCert production rollout verification — 2026-09-08

Deployed `e8277ef` (`Decouple IncluCert visit referrer processing`) to
`/var/www/html/akb`; verification completed around 12:58 UTC.
The application log uses UTC+02:00.

## Preflight and isolated testing

- Reviewed all eight changed files and the accompanying rollout document.
- No new migrations, dependencies, or frontend build required. Both prior
  referrer migrations were already installed.
- Used a separate checkout, copied installed dependencies, and an isolated
  MariaDB database containing the production schema only, with its own
  restricted database user. Production data was not copied into the tests.
- Both supplied test suites passed unchanged: **15 tests, 48 assertions**.
- A real database queue worker processed an IncluCert event submitted twice:
  one processed event, referrer counter 4 → 5, no pending or failed test jobs.
- Confirmed production uses the asynchronous database queue, retry_after 1200,
  and dedicated referrers and accessibility workers.

## Activation and preservation

- Backed up all pre-existing modified/untracked files, a binary Git patch,
  and SHA-256 hashes to the root-only directory
  `/var/backups/akb-before-inclucert-20260908/`.
- Stopped both referrer workers before changing code because the shared
  service changes the company lock key. Requests remained available and
  queue submissions could accumulate during the brief worker pause.
- Fast-forwarded from `e5cdd1c` to the reviewed `e8277ef`.
- Verified every pre-existing local file remained byte-identical.
- Ran `optimize:clear` and `queue:restart` as www-data, gracefully reloaded
  Apache, and started the referrer workers. Cache clearing took 36 seconds.
- All five Supervisor workers were running with new processes at final check.
- No production schema/data migration or dependency installation performed.

## Public endpoint verification

Compared responses before and after activation:

- Existing customer's widget: HTTP 200, byte-identical JavaScript, unchanged
  Content-Type, Cache-Control, ETag, Last-Modified, and Vary headers.
- Unknown customer's widget: unchanged HTTP 403 and body.
- IncluCert unknown company, invalid URL, and own-domain visit: unchanged
  HTTP 200 bodies (`skip`, `invalid`, and `skip_own` respectively).
- Delivered widget JavaScript passed Node syntax validation.
- A single valid IncluCert POST for an already recorded normalized URL
  returned HTTP 200, `{"status":"ok"}`, in **0.242 seconds**, while its
  shared company cache lock was provably still held.
- Background lock retry was logged, then the event was processed after
  release. The existing counter increased by exactly one. This deliberate
  test visit remains recorded; no new test URL or initial scan was created.
- Final referrer queue depth: zero. Failed-job count remained at its
  pre-existing value of three.
- Recent logs showed the expected background lock retry warnings. Two Pa11y
  DNS errors preceded activation; no new rollout-related error was observed
  in the inspected verification window.

Temporary test database, restricted user, checkout, and probe files were
removed after verification. Root-only local-change backups remain available.

## Recovery and limits

For an application rollback, stop referrer workers and account for queued
`ProcessIncluCertVisitJob` payloads before restoring the previous code, since
that job class does not exist in `e5cdd1c`. Drain those jobs with the new code
or retain its compatible handler during recovery. Preserve the existing
local configuration changes and restart workers after changing code.
No database rollback is needed for this commit.

These checks cover focused regression tests and production smoke tests,
not an exhaustive browser or load test. The upstream document's retention
and soft-deleted URL policy follow-ups remain open.
