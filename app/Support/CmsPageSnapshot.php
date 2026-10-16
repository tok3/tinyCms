<?php

namespace App\Support;

use App\Models\Page;
use InvalidArgumentException;

final class CmsPageSnapshot
{
    public const SCHEMA_VERSION = 1;

    private function __construct(private array $payload) {}

    public static function fromPage(Page $page, string $source): self
    {
        $page->loadMissing('tags');

        $pageData = self::normalizePageData([
            'external_id' => $page->external_id,
            'title' => $page->title,
            'slug' => $page->slug,
            'published' => (bool) $page->published,
            'navbar_type' => $page->navbar_type === null ? null : (int) $page->navbar_type,
            'blocks' => $page->blocks,
            'custom_head_code' => $page->custom_head_code,
            'custom_footer_code' => $page->custom_footer_code,
            'schema_json' => $page->schema_json,
            'meta' => $page->meta,
            'meta_og' => $page->meta_og,
            'meta_twitter' => $page->meta_twitter,
            'tags' => $page->tags->pluck('name')->map(fn ($name): string => (string) $name)->sort()->values()->all(),
        ]);

        $fingerprint = self::fingerprint($pageData);

        return new self([
            'schema_version' => self::SCHEMA_VERSION,
            'source' => $source,
            'exported_at' => $page->updated_at?->clone()->utc()->toIso8601String(),
            'base_fingerprint' => $fingerprint,
            'page' => $pageData,
        ]);
    }

    public static function fromArray(array $payload): self
    {
        if (($payload['schema_version'] ?? null) !== self::SCHEMA_VERSION) {
            throw new InvalidArgumentException('Unsupported CMS page snapshot schema version.');
        }

        if (! is_string($payload['source'] ?? null) || $payload['source'] === '') {
            throw new InvalidArgumentException('CMS page snapshot source is required.');
        }

        if (! is_array($payload['page'] ?? null)) {
            throw new InvalidArgumentException('CMS page snapshot page data is required.');
        }

        $pageData = self::normalizePageData($payload['page']);
        if (! is_string($pageData['external_id'] ?? null) || $pageData['external_id'] === '') {
            throw new InvalidArgumentException('CMS page snapshot external_id is required.');
        }

        $baseFingerprint = $payload['base_fingerprint'] ?? null;
        if ($baseFingerprint !== null && ! is_string($baseFingerprint)) {
            throw new InvalidArgumentException('CMS page snapshot base_fingerprint must be a string or null.');
        }

        return new self([
            'schema_version' => self::SCHEMA_VERSION,
            'source' => $payload['source'],
            'exported_at' => $payload['exported_at'] ?? null,
            'base_fingerprint' => $baseFingerprint,
            'page' => $pageData,
        ]);
    }

    public function toArray(): array
    {
        return $this->payload;
    }

    public function pageData(): array
    {
        return $this->payload['page'];
    }

    public function baseFingerprint(): ?string
    {
        return $this->payload['base_fingerprint'];
    }

    public function contentFingerprint(): string
    {
        return self::fingerprint($this->pageData());
    }

    private static function normalizePageData(array $pageData): array
    {
        $normalized = self::normalizeValue($pageData);
        $tags = $normalized['tags'] ?? [];

        if (! is_array($tags)) {
            throw new InvalidArgumentException('CMS page snapshot tags must be an array.');
        }

        $tags = array_values(array_map(static fn ($tag): string => (string) $tag, $tags));
        sort($tags, SORT_STRING);
        $normalized['tags'] = $tags;

        return self::normalizeValue($normalized);
    }

    private static function normalizeValue(mixed $value): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        if (array_is_list($value)) {
            return array_map(self::normalizeValue(...), $value);
        }

        ksort($value, SORT_STRING);

        foreach ($value as $key => $item) {
            $value[$key] = self::normalizeValue($item);
        }

        return $value;
    }

    private static function fingerprint(array $pageData): string
    {
        return hash('sha256', json_encode(
            self::normalizeValue($pageData),
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION,
        ));
    }
}
