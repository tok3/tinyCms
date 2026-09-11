<?php

namespace App\Backup;

use Exception;
use Spatie\Backup\Events\BackupHasFailed;
use Spatie\Backup\Exceptions\BackupFailed;
use Spatie\Backup\Commands\BackupCommand as BaseBackupCommand;

/** Keeps Spatie's command options/retry/notifications, using the pruned file selection.
 * Review this handle override when upgrading spatie/laravel-backup.
 */
class BackupCommand extends BaseBackupCommand
{
    public function handle(): int
    {
        consoleOutput()->comment($this->currentTry > 1 ? sprintf('Attempt n°%d...', $this->currentTry) : 'Starting backup...');

        $disableNotifications = $this->option('disable-notifications');

        if ($this->option('timeout') && is_numeric($this->option('timeout'))) {
            set_time_limit((int) $this->option('timeout'));
        }

        try {
            $this->guardAgainstInvalidOptions();

            $backupJob = BackupJobFactory::createFromConfig($this->config);

            if ($this->option('only-db')) {
                $backupJob->dontBackupFilesystem();
            }

            if ($this->option('db-name')) {
                $backupJob->onlyDbName($this->option('db-name'));
            }

            if ($this->option('only-files')) {
                $backupJob->dontBackupDatabases();
            }

            if ($this->option('only-to-disk')) {
                $backupJob->onlyBackupTo($this->option('only-to-disk'));
            }

            if ($this->option('filename')) {
                $backupJob->setFilename($this->option('filename'));
            }

            $this->setTries('backup');

            if ($disableNotifications) {
                $backupJob->disableNotifications();
            }

            if (! $this->getSubscribedSignals()) {
                $backupJob->disableSignals();
            }

            $backupJob->run();

            consoleOutput()->comment('Backup completed!');

            return static::SUCCESS;
        } catch (Exception $exception) {
            if ($this->shouldRetry()) {
                if ($this->hasRetryDelay('backup')) {
                    $this->sleepFor($this->getRetryDelay('backup'));
                }

                $this->currentTry += 1;

                return $this->handle();
            }

            consoleOutput()->error("Backup failed because: {$exception->getMessage()}.");

            report($exception);

            if (! $disableNotifications) {
                event(
                    $exception instanceof BackupFailed
                    ? new BackupHasFailed($exception->getPrevious(), $exception->backupDestination)
                    : new BackupHasFailed($exception)
                );
            }

            return static::FAILURE;
        }
    }

}
