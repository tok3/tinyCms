<?php

namespace App\Support;

use InvalidArgumentException;

final class ScannerRuntime
{
    /** Configuration for scanners that retain normal HTTPS certificate validation. */
    public static function createValidatedConfig(): array
    {
        $path = tempnam(sys_get_temp_dir(), 'pa11y-validated-');
        if ($path === false) {
            throw new \RuntimeException('Cannot create Pa11y configuration.');
        }
        $profile = $path.'-profile';
        try {
            if (! mkdir($profile, 0700)) {
                throw new \RuntimeException('Cannot create Chrome configuration directory.');
            }
            $launch = ['args' => config('accessibility_scan.browser.args', []),
                'env' => array_merge(getenv(), [
                    'XDG_CONFIG_HOME' => $profile.'/config',
                    'XDG_CACHE_HOME' => $profile.'/cache',
                ])];
            if ($browser = config('accessibility_scan.browser.path')) {
                $launch['executablePath'] = $browser;
            }
            if (file_put_contents($path, 'module.exports = '.json_encode([
                'chromeLaunchConfig' => $launch,
            ], JSON_THROW_ON_ERROR).';') === false) {
                throw new \RuntimeException('Cannot write Pa11y configuration.');
            }
            return [$path, $profile];
        } catch (\Throwable $error) {
            self::removeValidatedConfig([$path, $profile]);
            throw $error;
        }
    }

    public static function removeValidatedConfig(?array $files): void
    {
        if ($files) {
            @unlink($files[0]);
            (new \Illuminate\Filesystem\Filesystem)->deleteDirectory($files[1]);
        }
    }

    public static function tlsOption(): string
    {
        $option = config('accessibility_scan.browser.tls_option', 'ignoreHTTPSErrors');
        if (! in_array($option, ['ignoreHTTPSErrors', 'acceptInsecureCerts'], true)) {
            throw new InvalidArgumentException('Invalid A11Y_BROWSER_TLS_OPTION: use ignoreHTTPSErrors or acceptInsecureCerts.');
        }

        return $option;
    }
}
