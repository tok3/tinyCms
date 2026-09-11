<?php

namespace App\Backup;

use Generator;
use Spatie\Backup\Tasks\Backup\FileSelection;
use Symfony\Component\Finder\Finder;

/** Exclude directory trees before Finder attempts to open them. */
class PrunedFileSelection extends FileSelection
{
    public function selectedFiles(): Generator|array
    {
        foreach ($this->includedFiles() as $file) {
            if (! $this->shouldExclude($file)) {
                yield $file;
            }
        }

        foreach ($this->includedDirectories() as $directory) {
            if ($this->shouldExclude($directory)) {
                continue;
            }
            $root = rtrim(realpath($directory) ?: $directory, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
            $excludedDirectories = [];
            foreach ($this->excludeFilesAndDirectories as $excluded) {
                if (is_dir($excluded) && str_starts_with($excluded, $root)) {
                    $excludedDirectories[] = substr($excluded, strlen($root));
                }
            }
            $finder = (new Finder)->ignoreDotFiles(false)->ignoreVCS(false)
                ->in($directory)->exclude($excludedDirectories);
            if ($this->shouldFollowLinks) {
                $finder->followLinks();
            }
            if ($this->shouldIgnoreUnreadableDirs) {
                $finder->ignoreUnreadableDirs();
            }
            foreach ($finder as $file) {
                if (! $this->shouldExclude($file->getPathname())) {
                    yield $file->getPathname();
                }
            }
        }
    }
}
