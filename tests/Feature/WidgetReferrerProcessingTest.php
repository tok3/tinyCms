<?php

use App\Jobs\ProcessWidgetReferrerJob;
use App\Jobs\ScanAccessibilityJob;
use App\Models\Company;
use App\Models\Pa11yUrl;
use App\Models\Referrer;
use App\Services\WidgetReferrerService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

uses(Tests\TestCase::class, DatabaseTransactions::class);

function makeWidgetReferrerCompany(array $settings = []): Company
{
    $company = new Company();
    $company->name = 'Widget Test ' . Str::random(8);
    $company->slug = 'widget-test-' . Str::lower(Str::random(8));
    $company->ulid = (string) Str::ulid();
    $company->kd_nr = random_int(700000, 799999);
    $company->save();

    $company->settings()->create(array_merge([
        'default_standard' => '2.2',
        'contrast_errors' => 0,
        'max_urls' => 10,
        'auto_add_urls' => 1,
        'valid_domains' => 'example.com',
        'exclude_query_string_urls' => true,
        'full_scan_interval' => 'weekly',
        'widget_features' => 'standard',
    ], $settings));

    return $company->refresh();
}

it('serves widget javascript for authorized companies and queues referrer processing asynchronously', function () {
    config(['queue.default' => 'database']);
    Queue::fake([ProcessWidgetReferrerJob::class]);
    Storage::fake();
    Storage::put('scripts/standard.js', 'console.log("standard");');

    $company = makeWidgetReferrerCompany();

    $response = $this
        ->withHeader('Referer', 'https://www.example.com/path?cache=123')
        ->get("/service/{$company->ulid}/fixstern.js");

    $response->assertOk();
    $response->assertHeader('Content-Type', 'application/javascript');
    expect($response->getContent())->toContain('console.log("standard");');

    Queue::assertPushed(ProcessWidgetReferrerJob::class, function (ProcessWidgetReferrerJob $job) use ($company) {
        return $job->companyUlid === $company->ulid
            && $job->referrer === 'https://www.example.com/path?cache=123'
            && $job->tool === 'fixstern';
    });
});

it('keeps unauthorized widget requests forbidden before referrer processing', function () {
    config(['queue.default' => 'database']);
    Queue::fake([ProcessWidgetReferrerJob::class]);
    Storage::fake();
    Storage::put('scripts/standard.js', 'console.log("standard");');

    $this
        ->withHeader('Referer', 'https://www.example.com/path')
        ->get('/service/does-not-exist/fixstern.js')
        ->assertForbidden();

    Queue::assertNotPushed(ProcessWidgetReferrerJob::class);
});

it('does not run referrer processing inline when the queue driver is sync', function () {
    config(['queue.default' => 'sync']);
    Queue::fake([ProcessWidgetReferrerJob::class]);
    Storage::fake();
    Storage::put('scripts/standard.js', 'console.log("standard");');

    $company = makeWidgetReferrerCompany();

    $this
        ->withHeader('Referer', 'https://www.example.com/path')
        ->get("/service/{$company->ulid}/fixstern.js")
        ->assertOk();

    Queue::assertNotPushed(ProcessWidgetReferrerJob::class);
    expect(Referrer::where('ulid', $company->ulid)->count())->toBe(0);
});

it('does not let a busy referrer lock block javascript delivery', function () {
    config(['queue.default' => 'database']);
    Queue::fake([ProcessWidgetReferrerJob::class]);
    Storage::fake();
    Storage::put('scripts/standard.js', 'console.log("standard");');

    $company = makeWidgetReferrerCompany();
    $lock = Cache::lock('widget-referrer-company:' . $company->ulid, 10);
    $lock->get();

    try {
        $this
            ->withHeader('Referer', 'https://www.example.com/path')
            ->get("/service/{$company->ulid}/fixstern.js")
            ->assertOk();
    } finally {
        $lock->release();
    }

    Queue::assertPushed(ProcessWidgetReferrerJob::class);
});

it('stores a new referrer with count zero and queues a scan for the company standard', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany();

    app(WidgetReferrerService::class)->process(
        eventUuid: (string) Str::uuid(),
        companyUlid: $company->ulid,
        httpReferrer: 'https://www.example.com/new-page?cachebust=123',
    );

    $this->assertDatabaseHas('referrers', [
        'ulid' => $company->ulid,
        'referrer' => 'https://www.example.com/new-page',
        'count' => 0,
    ]);

    $this->assertDatabaseHas('pa11y_urls', [
        'company_id' => $company->id,
        'url' => 'https://www.example.com/new-page',
    ]);

    Queue::assertPushed(ScanAccessibilityJob::class);
});

it('increments existing referrers atomically without creating another url or scan', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany();
    Referrer::create([
        'ulid' => $company->ulid,
        'referrer' => 'https://www.example.com/existing',
        'count' => 4,
    ]);
    Pa11yUrl::create([
        'company_id' => $company->id,
        'url' => 'https://www.example.com/existing',
    ]);

    app(WidgetReferrerService::class)->process(
        eventUuid: (string) Str::uuid(),
        companyUlid: $company->ulid,
        httpReferrer: 'https://www.example.com/existing',
    );

    expect(Referrer::where('ulid', $company->ulid)
        ->where('referrer', 'https://www.example.com/existing')
        ->value('count'))->toBe(5);
    expect(Pa11yUrl::where('company_id', $company->id)
        ->where('url', 'https://www.example.com/existing')
        ->count())->toBe(1);
    Queue::assertNotPushed(ScanAccessibilityJob::class);
});

it('makes repeated delivery of the same queued event idempotent', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany();
    $eventUuid = (string) Str::uuid();
    $service = app(WidgetReferrerService::class);

    $service->process($eventUuid, $company->ulid, 'https://www.example.com/retry');
    $service->process($eventUuid, $company->ulid, 'https://www.example.com/retry');

    expect(Referrer::where('ulid', $company->ulid)
        ->where('referrer', 'https://www.example.com/retry')
        ->value('count'))->toBe(0);
    expect(Pa11yUrl::where('company_id', $company->id)
        ->where('url', 'https://www.example.com/retry')
        ->count())->toBe(1);
    Queue::assertPushed(ScanAccessibilityJob::class, 1);
});

it('skips invalid and non-allowlisted referrers', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany(['valid_domains' => 'allowed.example']);
    $service = app(WidgetReferrerService::class);

    $service->process((string) Str::uuid(), $company->ulid, 'not a valid url');
    $service->process((string) Str::uuid(), $company->ulid, 'https://www.example.com/blocked');

    expect(Referrer::where('ulid', $company->ulid)->count())->toBe(0);
    expect(Pa11yUrl::where('company_id', $company->id)->count())->toBe(0);
    Queue::assertNotPushed(ScanAccessibilityJob::class);
});

it('preserves query string handling for referrers while normalizing monitored urls', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany(['exclude_query_string_urls' => false]);

    app(WidgetReferrerService::class)->process(
        eventUuid: (string) Str::uuid(),
        companyUlid: $company->ulid,
        httpReferrer: 'https://www.example.com/query-page?variant=1',
    );

    $this->assertDatabaseHas('referrers', [
        'ulid' => $company->ulid,
        'referrer' => 'https://www.example.com/query-page?variant=1',
        'count' => 0,
    ]);
    $this->assertDatabaseHas('pa11y_urls', [
        'company_id' => $company->id,
        'url' => 'https://www.example.com/query-page',
    ]);
});

it('keeps the company url limit when new referrers are discovered', function () {
    Queue::fake([ScanAccessibilityJob::class]);
    $company = makeWidgetReferrerCompany();

    foreach (range(1, 5) as $i) {
        Pa11yUrl::create([
            'company_id' => $company->id,
            'url' => "https://www.example.com/existing-{$i}",
        ]);
    }

    app(WidgetReferrerService::class)->process(
        eventUuid: (string) Str::uuid(),
        companyUlid: $company->ulid,
        httpReferrer: 'https://www.example.com/over-limit',
    );

    expect(Pa11yUrl::where('company_id', $company->id)->count())->toBe(5);
    $this->assertDatabaseHas('referrers', [
        'ulid' => $company->ulid,
        'referrer' => 'https://www.example.com/over-limit',
        'count' => 0,
    ]);
    Queue::assertNotPushed(ScanAccessibilityJob::class);
});
