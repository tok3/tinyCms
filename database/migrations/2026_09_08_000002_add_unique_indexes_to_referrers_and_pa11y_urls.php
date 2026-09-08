<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->deduplicateReferrers();
        $this->deduplicatePa11yUrls();

        Schema::table('referrers', function (Blueprint $table) {
            $table->unique(['ulid', 'referrer'], 'referrers_ulid_referrer_unique');
        });

        Schema::table('pa11y_urls', function (Blueprint $table) {
            $table->unique(['company_id', 'url'], 'pa11y_urls_company_url_unique');
        });
    }

    public function down(): void
    {
        Schema::table('referrers', function (Blueprint $table) {
            $table->dropUnique('referrers_ulid_referrer_unique');
        });

        Schema::table('pa11y_urls', function (Blueprint $table) {
            $table->dropUnique('pa11y_urls_company_url_unique');
        });
    }

    private function deduplicateReferrers(): void
    {
        $duplicates = DB::table('referrers')
            ->select([
                'ulid',
                'referrer',
                DB::raw('MIN(id) as keep_id'),
                DB::raw('SUM(COALESCE(count, 0)) as total_count'),
            ])
            ->groupBy('ulid', 'referrer')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $duplicate) {
            DB::table('referrers')
                ->where('id', $duplicate->keep_id)
                ->update(['count' => (int) $duplicate->total_count]);

            DB::table('referrers')
                ->where('referrer', $duplicate->referrer)
                ->when(
                    $duplicate->ulid === null,
                    fn ($query) => $query->whereNull('ulid'),
                    fn ($query) => $query->where('ulid', $duplicate->ulid),
                )
                ->where('id', '!=', $duplicate->keep_id)
                ->delete();
        }
    }

    private function deduplicatePa11yUrls(): void
    {
        $duplicates = DB::table('pa11y_urls')
            ->select([
                'company_id',
                'url',
                DB::raw('COUNT(*) as duplicates'),
            ])
            ->whereNotNull('company_id')
            ->groupBy('company_id', 'url')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicates as $duplicate) {
            $ids = DB::table('pa11y_urls')
                ->where('company_id', $duplicate->company_id)
                ->where('url', $duplicate->url)
                ->orderByRaw('deleted_at IS NULL DESC')
                ->orderBy('id')
                ->pluck('id')
                ->map(fn ($id) => (int) $id)
                ->values();

            $keepId = $ids->first();
            $duplicateIds = $ids->skip(1)->all();

            if (! $keepId || $duplicateIds === []) {
                continue;
            }

            DB::table('pa11y_statistics')
                ->whereIn('url_id', $duplicateIds)
                ->update(['url_id' => $keepId]);

            DB::table('pa11y_accessibility_issues')
                ->whereIn('url_id', $duplicateIds)
                ->update(['url_id' => $keepId]);

            if (Schema::hasTable('pa11y_url_fingerprints')) {
                DB::table('pa11y_url_fingerprints')
                    ->whereIn('url_id', $duplicateIds)
                    ->update(['url_id' => $keepId]);
            }

            DB::table('pa11y_urls')
                ->whereIn('id', $duplicateIds)
                ->delete();
        }
    }
};
