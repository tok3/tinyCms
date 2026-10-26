<?php

namespace App\Console\Commands;

use App\Services\EmailDomainBlocklist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Throwable;

final class UpdateDisposableEmailBlocklist extends Command
{
    protected $signature = 'email-blocklist:update';

    protected $description = 'Download and atomically publish the disposable email domain blocklist';

    public function handle(): int
    {
        $url = (string) config('email-protection.source_url');
        $path = (string) config('email-protection.blocklist_path');
        $temporaryPath = $path.'.tmp';

        try {
            $response = Http::timeout(20)->retry(2, 300)->get($url);
            $response->throw();

            $domains = EmailDomainBlocklist::normalizeLines($response->body());
            $minimumDomains = (int) config('email-protection.minimum_domains', 500);

            if (count($domains) < $minimumDomains) {
                throw new \RuntimeException(sprintf(
                    'Downloaded list contains only %d valid domains; expected at least %d.',
                    count($domains),
                    $minimumDomains,
                ));
            }

            $directory = dirname($path);

            if (! is_dir($directory) && ! mkdir($directory, 0775, true) && ! is_dir($directory)) {
                throw new \RuntimeException("Could not create blocklist directory: {$directory}");
            }

            $contents = implode("\n", $domains)."\n";

            if (file_put_contents($temporaryPath, $contents, LOCK_EX) === false) {
                throw new \RuntimeException("Could not write temporary blocklist: {$temporaryPath}");
            }

            if (! rename($temporaryPath, $path)) {
                throw new \RuntimeException("Could not publish blocklist: {$path}");
            }

            $this->info(sprintf('Disposable email blocklist updated: %d Domains.', count($domains)));

            return self::SUCCESS;
        } catch (Throwable $exception) {
            @unlink($temporaryPath);
            report($exception);
            $this->error('Disposable email blocklist update failed; the last known good list was preserved.');

            return self::FAILURE;
        }
    }
}
