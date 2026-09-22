<?php

namespace App\Services;

use RuntimeException;

class SharedTemporaryDirectory
{
    /** Files written by PHP, Flysystem, Imagick and ZipArchive stay group-writable. */
    public function run(callable $operation, ?string $path = null): mixed
    {
        $path ??= storage_path('app/temp');
        $previousMask = umask(0007);
        try {
            if (! is_dir($path)) {
                if (@mkdir($path, 02770, true)) {
                    if (! chmod($path, 02770)) {
                        throw new RuntimeException("Could not set shared directory permissions: {$path}");
                    }
                } elseif (! is_dir($path)) {
                    throw new RuntimeException("Could not create shared temporary directory: {$path}");
                }
            }
            // Do not chmod existing directories: the other cooperating user may own them.
            if (! is_readable($path) || ! is_writable($path)) {
                throw new RuntimeException("Shared temporary directory is not accessible: {$path}");
            }
            return $operation();
        } finally {
            umask($previousMask);
        }
    }
}
