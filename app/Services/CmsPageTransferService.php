<?php

namespace App\Services;

use App\Models\Page;
use App\Models\User;
use App\Support\CmsPageComparison;
use App\Support\CmsPageImportResult;
use App\Support\CmsPageSnapshot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

final class CmsPageTransferService
{
    public function export(Page $page, string $source, string $directory): string
    {
        $snapshot = CmsPageSnapshot::fromPage($page, $source);
        $filename = $page->external_id.'-'.Str::slug($page->title ?: $page->slug, '-', 'de').'.json';
        $path = rtrim($directory, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$filename;

        File::ensureDirectoryExists($directory);
        File::put($path, json_encode(
            $snapshot->toArray(),
            JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
        )."\n");

        return $path;
    }

    public function compare(CmsPageSnapshot $snapshot): CmsPageComparison
    {
        return $this->compareUsingQuery($snapshot, lock: false);
    }

    public function import(CmsPageSnapshot $snapshot, bool $apply, ?int $authorId = null): CmsPageImportResult
    {
        if (! $apply) {
            return new CmsPageImportResult($this->compare($snapshot));
        }

        return DB::transaction(function () use ($snapshot, $authorId): CmsPageImportResult {
            $comparison = $this->compareUsingQuery($snapshot, lock: true);

            if ($comparison->status === 'unchanged') {
                return new CmsPageImportResult($comparison);
            }

            if ($comparison->status === 'conflict' || $comparison->status === 'ambiguous') {
                return new CmsPageImportResult($comparison);
            }

            if ($comparison->status === 'create') {
                if ($authorId === null) {
                    return new CmsPageImportResult($comparison, error: 'author_required');
                }

                if (! User::query()->whereKey($authorId)->exists()) {
                    return new CmsPageImportResult($comparison, error: 'author_not_found');
                }

                $pageData = $snapshot->pageData();
                $tags = $pageData['tags'];
                unset($pageData['tags']);
                $pageData['author_id'] = $authorId;
                $pageData['published'] = false;

                $page = Page::withoutEvents(fn (): Page => Page::query()->create($pageData));
                $page->syncTags($tags);

                return new CmsPageImportResult($comparison, applied: true, page: $page->fresh('tags'));
            }

            $page = Page::query()
                ->where('external_id', $comparison->externalId)
                ->lockForUpdate()
                ->firstOrFail();
            $pageData = $snapshot->pageData();
            $tags = $pageData['tags'];
            unset($pageData['tags'], $pageData['external_id']);

            Page::withoutEvents(function () use ($page, $pageData): void {
                $page->fill($pageData)->save();
            });
            $page->syncTags($tags);

            return new CmsPageImportResult($comparison, applied: true, page: $page->fresh('tags'));
        });
    }

    private function compareUsingQuery(CmsPageSnapshot $snapshot, bool $lock): CmsPageComparison
    {
        $pageData = $snapshot->pageData();
        $query = Page::query()->where('external_id', $pageData['external_id']);

        if ($lock) {
            $query->lockForUpdate();
        }

        $pages = $query->get();
        $matchCount = $pages->count();
        $incomingFingerprint = $snapshot->contentFingerprint();

        if ($matchCount > 1) {
            return new CmsPageComparison(
                status: 'ambiguous',
                externalId: $pageData['external_id'],
                baseFingerprint: $snapshot->baseFingerprint(),
                currentFingerprint: null,
                incomingFingerprint: $incomingFingerprint,
                matchingPages: $matchCount,
            );
        }

        $slugQuery = Page::query()
            ->where('slug', $pageData['slug'])
            ->where('external_id', '!=', $pageData['external_id']);

        if ($lock) {
            $slugQuery->lockForUpdate();
        }

        $slugMatchCount = $slugQuery->count();

        if ($slugMatchCount > 0) {
            return new CmsPageComparison(
                status: 'conflict',
                externalId: $pageData['external_id'],
                baseFingerprint: $snapshot->baseFingerprint(),
                currentFingerprint: null,
                incomingFingerprint: $incomingFingerprint,
                matchingPages: $slugMatchCount,
            );
        }

        if ($matchCount === 0) {
            return new CmsPageComparison(
                status: 'create',
                externalId: $pageData['external_id'],
                baseFingerprint: $snapshot->baseFingerprint(),
                currentFingerprint: null,
                incomingFingerprint: $incomingFingerprint,
                matchingPages: 0,
            );
        }

        $currentFingerprint = CmsPageSnapshot::fromPage($pages->first()->load('tags'), 'comparison')
            ->contentFingerprint();

        if ($currentFingerprint === $incomingFingerprint) {
            $status = 'unchanged';
        } elseif ($snapshot->baseFingerprint() === $currentFingerprint) {
            $status = 'update';
        } else {
            $status = 'conflict';
        }

        return new CmsPageComparison(
            status: $status,
            externalId: $pageData['external_id'],
            baseFingerprint: $snapshot->baseFingerprint(),
            currentFingerprint: $currentFingerprint,
            incomingFingerprint: $incomingFingerprint,
            matchingPages: 1,
        );
    }
}
