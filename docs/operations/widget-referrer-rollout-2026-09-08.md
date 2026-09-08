# Widget referrer rollout — 2026-09-08

Deployed commit: `d701157` (`Decouple widget referrer processing`).
Application directory: `/var/www/html/akb`.
Public endpoint: `https://aktion-barrierefrei.org/service/{ulid}/{tool}.js`.

## Deployment

- Full database snapshot taken before migration.
- Both new migrations tested on an isolated MariaDB copy, then applied to production (batch 50).
- Migration on the copy removed all duplicate groups. No orphaned URL references remained in statistics, accessibility issues, or fingerprints.
- Fast-forwarded `main`, preserving pre-existing local changes.
- Ran `artisan optimize:clear` and `artisan queue:restart`.
- Added `/etc/supervisor/conf.d/laravel-referrer-worker.conf`: two `www-data` workers consuming only `referrers`, timeout 30 seconds, four attempts.
- Existing accessibility and default workers restarted successfully.
- Production uses the asynchronous `database` queue.

## Installation sequence

1. Fetched `origin/main` and reviewed the seven changed files. No dependency
   installation was required. Existing local changes were saved separately.
2. Created a consistent full database snapshot with `mysqldump
   --single-transaction --quick --skip-lock-tables` and imported it into an
   isolated MariaDB database with its own restricted test user.
3. Tested both migrations on the copy. Before migration, the production
   preflight found 29,333 duplicate referrer groups and 773 duplicate URL
   groups. The second migration took approximately 75 seconds on the copy.
4. Applied only the two new migration files to production using
   `sudo -u www-data php artisan migrate --force --realpath --path=...`
   before activating the new middleware. The production deduplication and
   index migration completed in approximately 72 seconds. Both migrations
   are recorded in batch 50.
5. Activated the reviewed code with `git merge --ff-only origin/main`.
6. Adjusted the database queue retry interval as described below and
   installed the dedicated Supervisor configuration.
7. Ran the following commands from the application directory:

   ```sh
   sudo -u www-data /usr/bin/php artisan optimize:clear
   sudo -u www-data /usr/bin/php artisan queue:restart
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl status
   ```

8. Verified the public HTTP responses, lock behavior, processed queue events,
   migration status, worker processes, and application logs.
9. Removed the temporary database, test user, staging copy, credentials, and
   probe files after verification. Retained the protected backups below.

## Referrer worker configuration

Installed as `/etc/supervisor/conf.d/laravel-referrer-worker.conf`:

```ini
[program:laravel-referrer-worker]
process_name=%(program_name)s_%(process_num)02d
directory=/var/www/html/akb
command=/usr/bin/php /var/www/html/akb/artisan queue:work database --queue=referrers --tries=4 --timeout=30 --sleep=1 --max-time=3600
user=www-data
numprocs=2
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
stopwaitsecs=60
redirect_stderr=true
stdout_logfile=/var/www/html/akb/storage/logs/referrer-worker.log
stdout_logfile_maxbytes=20MB
stdout_logfile_backups=3
```

## Retained backups

Both files are owned by root with mode `0600`:

- `/var/backups/akb-before-widget-rollout-20260908.sql`
- `/var/backups/akb-local-changes-before-widget-rollout-20260908.patch`

The database snapshot predates the rollout. A migration rollback only removes
the new indexes/table; it does not undo the duplicate consolidation. Restoring
the full snapshot would also replace data written after that snapshot and
therefore requires a separately planned recovery procedure.

## Server adjustment to retain upstream

`config/queue.php` now reads the database queue retry interval from
`DB_QUEUE_RETRY_AFTER`, defaulting to 1200 seconds. The former 90 seconds was
shorter than the accessibility job timeout (300 seconds) and worker timeout
(900 seconds), allowing premature redelivery. Keep retry_after greater than
the longest applicable timeout. This configuration change is local and has
not been pushed to Git.

## Verification

- Ten supplied feature tests passed against the isolated MariaDB copy.
- The temporary test harness used the installed SlugService instead of the
  existing alias mock in `tests/TestCase.php`, which otherwise failed with
  “class already exists”. Production test files were not modified.
- A real database queue worker processed a known referrer on the isolated
  copy and incremented its count exactly once.
- Public JavaScript requests for two existing customers returned HTTP 200;
  bodies were byte-identical before/after and passed `node --check`.
- Content-Type, Cache-Control, ETag, Last-Modified, and Vary were unchanged.
- An unknown customer continued to receive HTTP 403.
- A request carrying an existing referrer returned the same JavaScript in
  0.23 seconds while its company lock was provably still held at response
  completion. Background lock retries were observed and subsequently
  processed without failed jobs.
- All five Supervisor workers were running. The verification window showed
  no new application errors, lock timeout exceptions, or permission errors.

These are deployment smoke tests, not an exhaustive browser or load test.
`IncluCertController` remains outside this rollout. Retention/cleanup of the
new `referrer_events` records should be planned as a separate follow-up.
