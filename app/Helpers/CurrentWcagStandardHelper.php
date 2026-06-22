<?php

use App\Models\Pa11yUrl;
use App\Models\Company;
use App\Models\CompanySetting;

if (! function_exists('normalizeWcagStandard')) {
    function normalizeWcagStandard($standard): string
    {
        return in_array($standard, ['2.0', '2.1', '2.2'], true) ? $standard : '2.1';
    }
}

if (! function_exists('getCurrentWcagStandard')) {
    function getCurrentWcagStandard($subject = null): string
    {
        $companyId = null;

        if ($subject instanceof Company) {
            $companyId = $subject->id;
        } elseif ($subject instanceof Pa11yUrl) {
            $companyId = $subject->company_id;
        } elseif (is_numeric($subject)) {
            $pa11yUrl = Pa11yUrl::find((int) $subject);
            $companyId = $pa11yUrl?->company_id ?? (int) $subject;
        } elseif (is_string($subject) && $subject !== '') {
            $pa11yUrl = Pa11yUrl::whereKey($subject)->first();
            $companyId = $pa11yUrl?->company_id;
        }

        if (! $companyId) {
            return '2.1';
        }

        $companySetting = CompanySetting::where('company_id', $companyId)->first();

        return normalizeWcagStandard($companySetting?->default_standard ?? '2.1');
    }
}

if (! function_exists('getWcagScanCommand')) {
    function getWcagScanCommand(string $standard): string
    {
        $standard = normalizeWcagStandard($standard);

        return $standard === '2.0'
            ? 'scan:accessibility'
            : 'scan:accessibility-22';
    }
}

if (! function_exists('getWcagScanStandardOption')) {
    function getWcagScanStandardOption(string $standard): string
    {
        return normalizeWcagStandard($standard) === '2.2' ? '22' : '21';
    }
}

if (! function_exists('getWcagStandardLabel')) {
    function getWcagStandardLabel(string $standard): string
    {
        return match (normalizeWcagStandard($standard)) {
            '2.0' => 'WCAG 2.0',
            '2.1' => 'WCAG 2.1',
            '2.2' => 'WCAG 2.2',
            default => 'WCAG 2.1',
        };
    }
}

if (! function_exists('getWcagScanShellCommand')) {
    function getWcagScanShellCommand(int $urlId, string $standard): string
    {
        $standard = normalizeWcagStandard($standard);
        $command = getWcagScanCommand($standard);
        $artisanPath = escapeshellarg(base_path('artisan'));

        $parts = [
            'php',
            $artisanPath,
            $command,
            (string) $urlId,
        ];

        if ($command === 'scan:accessibility-22') {
            $parts[] = '--standard=' . getWcagScanStandardOption($standard);
            $parts[] = '--warnings';
        }

        return implode(' ', $parts) . ' > /dev/null 2>&1 &';
    }
}
