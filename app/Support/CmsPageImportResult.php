<?php

namespace App\Support;

use App\Models\Page;

final class CmsPageImportResult
{
    public function __construct(
        public readonly CmsPageComparison $comparison,
        public readonly bool $applied = false,
        public readonly ?Page $page = null,
        public readonly ?string $error = null,
    ) {}
}
