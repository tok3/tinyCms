<?php

namespace App\Services;

use App\Models\Pa11yUrl;
use App\Models\Pa11yUrlFingerprint;
use Illuminate\Support\Facades\Http;

class AccessibilityFingerprintService
{
    public function captureForUrl(Pa11yUrl $url, string $standard, array $meta = []): Pa11yUrlFingerprint
    {
        $capturedAt = now();
        $scanWindowMinutes = (int) config('accessibility_scan.fingerprint.scan_window_minutes', 60);
        $previousFingerprint = Pa11yUrlFingerprint::query()
            ->where('url_id', $url->id)
            ->where('standard', normalizeWcagStandard($standard))
            ->orderByDesc('fingerprint_scan_date')
            ->orderByDesc('id')
            ->first();

        $payload = [
            'company_id' => $url->company_id,
            'url_id' => $url->id,
            'standard' => normalizeWcagStandard($standard),
            'fingerprint' => null,
            'fingerprint_state' => 'undeterminable',
            'fingerprint_source' => 'fetch_failed',
            'fingerprint_scan_date' => $capturedAt,
            'scan_window_start_at' => $capturedAt->copy()->subMinutes($scanWindowMinutes),
            'scan_window_end_at' => $capturedAt->copy()->addMinutes($scanWindowMinutes),
            'decision_action' => $meta['decision_action'] ?? null,
            'decision_reason' => $meta['decision_reason'] ?? null,
            'decision_context' => [
                'captured_at' => $capturedAt->toIso8601String(),
                'scanner' => $meta['scanner'] ?? null,
                'scan_command' => $meta['scan_command'] ?? null,
                'standard' => normalizeWcagStandard($standard),
                'target_url' => $url->url,
                'notes' => $meta['notes'] ?? null,
                'previous_fingerprint_id' => $previousFingerprint?->id,
                'previous_fingerprint_state' => $previousFingerprint?->fingerprint_state,
            ],
        ];

        try {
            $response = Http::withoutVerifying()
                ->timeout((int) config('accessibility_scan.fingerprint.http_timeout', 30))
                ->withHeaders([
                    'User-Agent' => config('accessibility_scan.fingerprint.user_agent', 'TinyCMS-A11y-Fingerprint/1.0'),
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                ])
                ->get($url->url);

            $payload['decision_context']['http_status'] = $response->status();
            $payload['decision_context']['content_type'] = $response->header('Content-Type');

            if (! $response->successful()) {
                $payload['decision_context']['response_excerpt'] = mb_substr($response->body(), 0, 500);
                return Pa11yUrlFingerprint::create($payload);
            }

            $rawHtml = (string) $response->body();
            $normalizedHtml = $this->normalizeHtml($rawHtml);

            if (blank($normalizedHtml)) {
                $payload['decision_context']['raw_length'] = strlen($rawHtml);
                $payload['decision_context']['normalized_length'] = 0;
                return Pa11yUrlFingerprint::create($payload);
            }

            $payload['fingerprint'] = hash('sha256', $normalizedHtml);
            $payload['fingerprint_state'] = 'new';
            if ($previousFingerprint?->fingerprint && hash_equals((string) $previousFingerprint->fingerprint, (string) $payload['fingerprint'])) {
                $payload['fingerprint_state'] = 'unchanged';
            } elseif ($previousFingerprint) {
                $payload['fingerprint_state'] = 'changed';
            }
            $payload['fingerprint_source'] = 'html-dom';
            $payload['decision_context']['raw_length'] = strlen($rawHtml);
            $payload['decision_context']['normalized_length'] = strlen($normalizedHtml);
            $payload['decision_context']['fingerprint_preview'] = mb_substr($normalizedHtml, 0, 500);
        } catch (\Throwable $throwable) {
            $payload['decision_context']['exception'] = $throwable->getMessage();
        }

        return Pa11yUrlFingerprint::create($payload);
    }

    private function normalizeHtml(string $html): string
    {
        $previous = libxml_use_internal_errors(true);

        try {
            $dom = new \DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = false;

            $loaded = $dom->loadHTML(
                mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'),
                LIBXML_NOWARNING | LIBXML_NOERROR | LIBXML_NONET
            );

            if (! $loaded) {
                return $this->normalizeText($html);
            }

            $xpath = new \DOMXPath($dom);

            foreach (['//script', '//style', '//noscript', '//template'] as $query) {
                foreach ($xpath->query($query) ?? [] as $node) {
                    $node->parentNode?->removeChild($node);
                }
            }

            foreach ($xpath->query('//@*') ?? [] as $attribute) {
                $name = strtolower($attribute->nodeName);
                $value = (string) $attribute->nodeValue;

                if (str_starts_with($name, 'data-') || in_array($name, ['nonce', 'integrity', 'crossorigin', 'referrerpolicy'], true)) {
                    $attribute->ownerElement?->removeAttributeNode($attribute);
                    continue;
                }

                if (in_array($name, ['src', 'href', 'action', 'poster'], true)) {
                    $attribute->value = $this->stripUrlNoise($value);
                }
            }

            $normalized = $dom->saveHTML() ?: '';
            return $this->normalizeText($normalized);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
    }

    private function normalizeText(string $value): string
    {
        $value = preg_replace('/\s+/u', ' ', $value ?? '') ?? '';
        $value = str_replace(["\r\n", "\r", "\n", "\t"], ' ', $value);
        return trim($value);
    }

    private function stripUrlNoise(string $value): string
    {
        $value = trim($value);
        if ($value === '' || str_starts_with($value, 'javascript:') || str_starts_with($value, 'mailto:') || str_starts_with($value, 'tel:')) {
            return $value;
        }

        $parsed = parse_url($value);
        if ($parsed === false) {
            return $value;
        }

        $normalized = '';
        if (isset($parsed['scheme'])) {
            $normalized .= $parsed['scheme'] . '://';
        }

        if (isset($parsed['user'])) {
            $normalized .= $parsed['user'];
            if (isset($parsed['pass'])) {
                $normalized .= ':' . $parsed['pass'];
            }
            $normalized .= '@';
        }

        if (isset($parsed['host'])) {
            $normalized .= $parsed['host'];
        }

        if (isset($parsed['port'])) {
            $normalized .= ':' . $parsed['port'];
        }

        $normalized .= $parsed['path'] ?? '';

        if (! empty($parsed['fragment'])) {
            $normalized .= '#' . $parsed['fragment'];
        }

        return $normalized !== '' ? $normalized : $value;
    }
}
