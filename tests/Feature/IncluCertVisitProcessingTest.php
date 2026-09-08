<?php

use App\Jobs\ProcessIncluCertVisitJob;
use App\Jobs\ScanAccessibilityJob;
use App\Models\Company;
use App\Models\Pa11yUrl;
use App\Models\Referrer;
use App\Services\ReferrerRecordingService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;

uses(Tests\TestCase::class, DatabaseTransactions::class);

function makeIncluCertVisitCompany(bool $withIncluCertFeature = true): Company
{
    $company = new Company();
    $company->name = 'IncluCert Visit Test ' . Str::random(8);
    $company->slug = 'inclucert-visit-test-' . Str::lower(Str::random(8));
    $company->ulid = (string) Str::ulid();
    $company->kd_nr = random_int(800000, 899999);
    $company->save();

    $company->settings()->create([
        'default_standard' => '2.2',
        'contrast_errors' => 0,
        'max_urls' => 10,
        'auto_add_urls' => 1,
        'valid_domains' => null,
        'exclude_query_string_urls' => true,
        'full_scan_interval' => 'weekly',
        'widget_features' => 'standard',
    ]);

    if ($withIncluCertFeature) {
        $featureId = DB::table('features')->where('slug', 'inclucert')->value('id');

        if (! $featureId) {
            $featureId = DB::table('features')->insertGetId([
                'name' => 'IncluCert ' . Str::uuid(),
                'slug' => 'inclucert',
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('company_feature')->insert([
            'company_id' => $company->id,
            'feature_id' => $featureId,
            'value' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return $company->refresh();
}

it('queues valid IncluCert visits after returning an ok response', function () {
    config(['queue.default' => 'database']);
    Queue::fake([ProcessIncluCertVisitJob::class]);
    $company = makeIncluCertVisitCompany();

    $response = $this->postJson("/api/inclucert/{$company->ulid}/visit", [
        'url' => 'https://www.example.com/path/?cache=1#fragment',
    ]);

    $response->assertOk()->assertJson(['status' => 'ok']);

    Queue::assertPushed(ProcessIncluCertVisitJob::class, function (ProcessIncluCertVisitJob $job) use ($company) {
        return $job->companyUlid === $company->ulid
            && $job->normalizedUrl === 'https://www.example.com/path';
    });
});

it('keeps missing feature and invalid url behaviour unchanged', function () {
    config(['queue.default' => 'database']);
    Queue::fake([ProcessIncluCertVisitJob::class]);
    $company = makeIncluCertVisitCompany(withIncluCertFeature: false);

    $this->postJson("/api/inclucert/{$company->ulid}/visit", [
        'url' => 'https://www.example.com/path',
    ])->assertOk()->assertJson(['status' => 'skip']);

    $companyWithFeature = makeIncluCertVisitCompany();

    $this->postJson("/api/inclucert/{$companyWithFeature->ulid}/visit", [
        'url' => 'not a url',
    ])->assertOk()->assertJson(['status' => 'invalid']);

    Queue::assertNotPushed(ProcessIncluCertVisitJob::class);
});

it('keeps own-domain IncluCert visits skipped before queueing', function () {
    config([
        'app.url' => 'https://app.example.test',
        'queue.default' => 'database',
    ]);
    Queue::fake([ProcessIncluCertVisitJob::class]);
    $company = makeIncluCertVisitCompany();

    $this->postJson("/api/inclucert/{$company->ulid}/visit", [
        'url' => 'https://badge.app.example.test/inclucert',
    ])->assertOk()->assertJson(['status' => 'skip_own']);

    Queue::assertNotPushed(ProcessIncluCertVisitJob::class);
});

it('does not process IncluCert visits inline when the queue driver is sync', function () {
    config(['queue.default' => 'sync']);
    Queue::fake([ProcessIncluCertVisitJob::class]);
    $company = makeIncluCertVisitCompany();

    $this->postJson("/api/inclucert/{$company->ulid}/visit", [
        'url' => 'https://www.example.com/path',
    ])->assertOk()->assertJson(['status' => 'ok']);

    Queue::assertNotPushed(ProcessIncluCertVisitJob::class);
    expect(Referrer::where('ulid', $company->ulid)->count())->toBe(0);
});

it('records queued IncluCert visits idempotently and starts scans through the scan job', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeIncluCertVisitCompany();
    $eventUuid = (string) Str::uuid();
    $job = new ProcessIncluCertVisitJob(
        eventUuid: $eventUuid,
        companyUlid: $company->ulid,
        normalizedUrl: 'https://www.example.com/queued',
    );

    $job->handle(app(ReferrerRecordingService::class));
    $job->handle(app(ReferrerRecordingService::class));

    $this->assertDatabaseHas('referrers', [
        'ulid' => $company->ulid,
        'referrer' => 'https://www.example.com/queued',
        'count' => 0,
    ]);
    $this->assertDatabaseHas('pa11y_urls', [
        'company_id' => $company->id,
        'url' => 'https://www.example.com/queued',
    ]);
    expect(Pa11yUrl::where('company_id', $company->id)
        ->where('url', 'https://www.example.com/queued')
        ->count())->toBe(1);
    Queue::assertPushed(ScanAccessibilityJob::class, 1);
});
