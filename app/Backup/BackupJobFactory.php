<?php

namespace App\Backup;

use Spatie\Backup\Config\SourceFilesConfig;
use Spatie\Backup\Tasks\Backup\FileSelection;

class BackupJobFactory extends \Spatie\Backup\Tasks\Backup\BackupJobFactory
{
    protected static function createFileSelection(SourceFilesConfig $sourceFiles): FileSelection
    {
        return (new PrunedFileSelection($sourceFiles->include))
            ->excludeFilesFrom($sourceFiles->exclude)
            ->shouldFollowLinks($sourceFiles->followLinks)
            ->shouldIgnoreUnreadableDirs($sourceFiles->ignoreUnreadableDirectories);
    }
}
