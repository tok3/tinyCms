<?php

namespace App\Support;

final class CmsPageComparison
{
    public function __construct(
        public readonly string $status,
        public readonly string $externalId,
        public readonly ?string $baseFingerprint,
        public readonly ?string $currentFingerprint,
        public readonly string $incomingFingerprint,
        public readonly int $matchingPages,
    ) {}
}
