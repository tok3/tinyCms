<?php

namespace App\Services;

final class EmailDomainBlocklist
{
    /** @var array<string, true>|null */
    private ?array $domains = null;

    public function blocks(string $emailOrDomain): bool
    {
        $domain = $this->extractDomain($emailOrDomain);

        if ($domain === '') {
            return false;
        }

        $blockedDomains = $this->domains();

        foreach ($this->domainAndParents($domain) as $candidate) {
            if (isset($blockedDomains[$candidate])) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return list<string>
     */
    public static function normalizeLines(string $contents): array
    {
        $domains = [];

        foreach (preg_split('/\R/', $contents) ?: [] as $line) {
            $domain = self::normalizeDomain($line);

            if ($domain === '' || str_starts_with($domain, '#')) {
                continue;
            }

            if (! preg_match('/^(?=.{1,253}$)(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?$/', $domain)) {
                continue;
            }

            $domains[$domain] = true;
        }

        $domains = array_keys($domains);
        sort($domains, SORT_STRING);

        return $domains;
    }

    /**
     * @return array<string, true>
     */
    private function domains(): array
    {
        if ($this->domains !== null) {
            return $this->domains;
        }

        $domains = [];
        $primaryPath = config('email-protection.blocklist_path');
        $fallbackPath = config('email-protection.fallback_path');
        $path = is_string($primaryPath) && is_readable($primaryPath)
            ? $primaryPath
            : $fallbackPath;

        if (is_string($path) && is_readable($path)) {
            foreach (self::normalizeLines((string) file_get_contents($path)) as $domain) {
                $domains[$domain] = true;
            }
        }

        foreach ((array) config('email-protection.reserved_domains', []) as $domain) {
            $domain = self::normalizeDomain((string) $domain);

            if ($domain !== '') {
                $domains[$domain] = true;
            }
        }

        return $this->domains = $domains;
    }

    private function extractDomain(string $emailOrDomain): string
    {
        $atPosition = strrpos($emailOrDomain, '@');
        $domain = $atPosition === false
            ? $emailOrDomain
            : substr($emailOrDomain, $atPosition + 1);

        return self::normalizeDomain($domain);
    }

    /**
     * @return list<string>
     */
    private function domainAndParents(string $domain): array
    {
        $labels = explode('.', $domain);
        $domains = [];

        while ($labels !== []) {
            $domains[] = implode('.', $labels);
            array_shift($labels);
        }

        return $domains;
    }

    private static function normalizeDomain(string $domain): string
    {
        $domain = strtolower(trim($domain));
        $domain = rtrim($domain, '.');

        if (function_exists('idn_to_ascii') && $domain !== '') {
            $ascii = idn_to_ascii($domain, IDNA_DEFAULT, INTL_IDNA_VARIANT_UTS46);

            if (is_string($ascii)) {
                $domain = strtolower($ascii);
            }
        }

        return $domain;
    }
}
