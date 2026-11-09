<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Jobs\ProcessWidgetReferrerJob;
use App\Services\WidgetReferrerService;
use App\Providers\Filament\DashboardPanelProvider;
use Filament\Facades\Filament;
use Filament\Panel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tests\TestCase;

class WidgetDeliveryTest extends TestCase
{
    private string $databaseFile;
    private array $previousEnvironment = [];
    private const ULID = '01JTESTWIDGET00000000000000';
    private const SLUGS = ['leichte-sprache', 'eztext', 'ezspeak', 'screen-reader', 'eztext-only', 'ezspeak-only', 'eztext-ezspeak-only'];

    public function createApplication(): \Illuminate\Foundation\Application
    {
        if (is_file(__DIR__.'/../../bootstrap/cache/config.php')) {
            throw new \RuntimeException('Widget tests require uncached configuration to guarantee an isolated database.');
        }
        // An unrelated local backup declares Dashboard in _Dashboard.php. Keep discovery
        // from loading that mismatched class repeatedly when test applications reboot.
        if (!class_exists('App\\Filament\\Pages\\_Dashboard', false)) {
            class_alias(\Filament\Pages\Dashboard::class, 'App\\Filament\\Pages\\_Dashboard');
        }
        // Build a disposable schema before providers boot; never use the configured customer DB.
        $this->databaseFile = tempnam(sys_get_temp_dir(), 'widget-delivery-');
        foreach (['DB_CONNECTION', 'DB_DATABASE', 'DATABASE_URL'] as $name) {
            $this->previousEnvironment[$name] = [getenv($name), $_ENV[$name] ?? null, $_SERVER[$name] ?? null];
        }
        putenv('DB_CONNECTION=sqlite');
        putenv('DB_DATABASE='.$this->databaseFile);
        $_ENV['DB_CONNECTION'] = $_SERVER['DB_CONNECTION'] = 'sqlite';
        $_ENV['DB_DATABASE'] = $_SERVER['DB_DATABASE'] = $this->databaseFile;
        putenv('DATABASE_URL=');
        $_ENV['DATABASE_URL'] = $_SERVER['DATABASE_URL'] = '';
        $pdo = new \PDO('sqlite:'.$this->databaseFile);
        $pdo->exec('CREATE TABLE companies (id INTEGER PRIMARY KEY, ulid TEXT, name TEXT, deleted_at TEXT);
            CREATE TABLE features (id INTEGER PRIMARY KEY, slug TEXT);
            CREATE TABLE company_feature (id INTEGER PRIMARY KEY, company_id INTEGER, feature_id INTEGER, value TEXT, deleted_at TEXT, created_at TEXT, updated_at TEXT);
            CREATE TABLE company_settings (id INTEGER PRIMARY KEY, company_id INTEGER, altstar_type INTEGER, default_standard TEXT, valid_domains TEXT, exclude_query_string_urls INTEGER);
            CREATE TABLE jobs (id INTEGER PRIMARY KEY, queue TEXT, payload TEXT, attempts INTEGER, reserved_at INTEGER, available_at INTEGER, created_at INTEGER);
            CREATE TABLE referrers (id INTEGER PRIMARY KEY, ulid TEXT, referrer TEXT, count INTEGER, created_at TEXT, updated_at TEXT, UNIQUE(ulid, referrer));
            CREATE TABLE referrer_events (id INTEGER PRIMARY KEY, event_uuid TEXT UNIQUE, company_id INTEGER, ulid TEXT, referrer TEXT, status TEXT, processed_at TEXT, created_at TEXT, updated_at TEXT);
            CREATE TABLE pa11y_urls (id INTEGER PRIMARY KEY, company_id INTEGER, url TEXT, deleted_at TEXT, created_at TEXT, updated_at TEXT, UNIQUE(company_id, url));');

        return parent::createApplication();
    }

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
        DB::table('companies')->insert(['id' => 1, 'ulid' => self::ULID, 'name' => 'Local fixture']);
        foreach (array_merge(self::SLUGS, ['image-alt-tags', 'image-alt-tags-all']) as $i => $slug) {
            DB::table('features')->insert(['id' => $i + 1, 'slug' => $slug]);
        }
        foreach (['standard', 'tts', 'eztext', 'ezspeak', 'eztext_ezspeak', 'tts_ezspeak', 'tts_eztext', 'tts_eztext_ezspeak', 'eztext_only', 'ezspeak_only', 'eztext_ezspeak_only', 'futtermedicus', 'img.min', 'imgAlltags.min'] as $variant) {
            Storage::put('scripts/'.$variant.'.js', '/* '.$variant.' */ const customer = "{{ulid}}";');
        }
        DB::disableQueryLog();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        @unlink($this->databaseFile);
        foreach ($this->previousEnvironment as $name => [$process, $env, $server]) {
            $process === false ? putenv($name) : putenv($name.'='.$process);
            if ($env === null) unset($_ENV[$name]); else $_ENV[$name] = $env;
            if ($server === null) unset($_SERVER[$name]); else $_SERVER[$name] = $server;
        }
    }

    private function features(array $slugs, ?string $deletedAt = null): void
    {
        DB::table('company_feature')->delete();
        foreach ($slugs as $slug) {
            DB::table('company_feature')->insert(['company_id' => 1, 'feature_id' => DB::table('features')->where('slug', $slug)->value('id'), 'deleted_at' => $deletedAt, 'value' => '0']);
        }
    }

    public function test_all_128_feature_combinations_keep_variant_priority_and_script_bytes(): void
    {
        $maxQueries = 0;
        for ($mask = 0; $mask < 128; $mask++) {
            $enabled = array_values(array_filter(self::SLUGS, fn ($slug, $i) => (bool) ($mask & (1 << $i)), ARRAY_FILTER_USE_BOTH));
            $this->features($enabled);
            // Independent truth table captured from the original if/elseif chain.
            $regular = [0 => 'standard', 1 => 'tts', 2 => 'ezspeak', 3 => 'tts_ezspeak', 4 => 'eztext', 5 => 'tts_eztext', 6 => 'eztext_ezspeak', 7 => 'tts_eztext_ezspeak'];
            $bits = (($mask & 2) ? 4 : 0) | (($mask & 4) ? 2 : 0) | (($mask & 8) ? 1 : 0);
            $variant = ($mask & 1) ? 'tts_eztext_ezspeak' : ($regular[$bits]);
            if (!($mask & 1) && $bits === 0) {
                $variant = ($mask & 16) ? 'eztext_only' : (($mask & 32) ? 'ezspeak_only' : (($mask & 64) ? 'eztext_ezspeak_only' : 'standard'));
            }
            DB::enableQueryLog();
            DB::flushQueryLog();
            $response = $this->get('/service/'.self::ULID.'/fixstern.js');
            $maxQueries = max($maxQueries, count(DB::getQueryLog()));
            DB::disableQueryLog();
            $body = '/* '.$variant.' */ const customer = "'.self::ULID.'";';
            $response->assertOk()->assertContent($body)->assertHeader('ETag', '"'.hash('sha256', $body).'"');
            $response->assertHeaderMissing('Set-Cookie');
        }
        self::assertSame(2, $maxQueries, 'One authorized company lookup and one active feature lookup.');
    }

    public function test_deleted_features_and_customer_overrides(): void
    {
        $this->features(['leichte-sprache'], now()->toDateTimeString());
        $this->get('/service/'.self::ULID.'/fixstern.js')->assertSee('/* standard */', false);
        foreach (['01JRT7ABK98TYXEXM62N11NHGR' => 'tts_eztext_ezspeak', '01JRSPY9VYFFM60FCSXX52BP8T' => 'tts_eztext_ezspeak', '01JWXJ42G8GZVCMEN1CQMPSD49' => 'futtermedicus'] as $ulid => $variant) {
            DB::table('companies')->where('id', 1)->update(['ulid' => $ulid]);
            $this->get('/service/'.$ulid.'/fixstern.js')->assertOk()->assertSee('/* '.$variant.' */', false);
        }
    }

    public function test_altstar_features_settings_and_legacy_empty_assignment_exception(): void
    {
        $this->get('/service/'.self::ULID.'/altstar.js')->assertForbidden();
        $this->features(['eztext']);
        $this->get('/service/'.self::ULID.'/altstar.js')->assertNotFound();
        foreach (['image-alt-tags', 'image-alt-tags-all'] as $slug) {
            $this->features([$slug]);
            foreach ([0 => 'img.min', 1 => 'imgAlltags.min'] as $setting => $variant) {
                DB::table('company_settings')->delete();
                DB::table('company_settings')->insert(['company_id' => 1, 'altstar_type' => $setting]);
                $this->get('/service/'.self::ULID.'/altstar.js')->assertOk()->assertSee('/* '.$variant.' */', false);
            }
        }
        $this->features(['image-alt-tags'], now()->toDateTimeString());
        $this->get('/service/'.self::ULID.'/altstar.js')->assertNotFound();
        DB::table('companies')->where('id', 1)->update(['ulid' => '01JE6A5H2NQZCT4P9N3FEZG2CX']);
        $this->get('/service/01JE6A5H2NQZCT4P9N3FEZG2CX/altstar.js')->assertNotFound();
        $this->features([]);
        $this->get('/service/01JE6A5H2NQZCT4P9N3FEZG2CX/altstar.js')->assertOk()->assertSee('/* img.min */', false);
    }

    public function test_missing_customers_files_and_http_validators(): void
    {
        $this->get('/service/unknown/fixstern.js')->assertForbidden();
        $this->get('/service/'.self::ULID.'/missing.js')->assertNotFound();
        $url = '/service/'.self::ULID.'/fixstern.js';
        $response = $this->get($url)->assertOk();
        $response->assertHeader('Content-Type', 'application/javascript');
        self::assertStringContainsString('max-age=86400', $response->headers->get('Cache-Control'));
        $this->withHeader('If-None-Match', $response->headers->get('ETag'))->get($url)->assertStatus(304)->assertContent('');
        $this->flushHeaders();
        $this->withHeader('If-Modified-Since', $response->headers->get('Last-Modified'))->get($url)->assertStatus(304);
        $this->flushHeaders();
        Storage::delete('scripts/standard.js');
        $this->get($url)->assertNotFound();
    }

    public function test_old_etag_does_not_hide_changed_features_or_bypass_access(): void
    {
        $url = '/service/'.self::ULID.'/fixstern.js';
        $etag = $this->get($url)->assertOk()->headers->get('ETag');
        $this->features(['screen-reader']);
        $this->withHeader('If-None-Match', $etag)->get($url)->assertOk()->assertSee('/* tts */', false);
        DB::table('companies')->where('id', 1)->update(['deleted_at' => now()]);
        $this->get($url)->assertForbidden();
    }

    public function test_css_parameters_and_svg_cache_contract(): void
    {
        foreach (['/service/fixstern.css?mt=12&unit=px', '/service/fixstern-icons.svg'] as $url) {
            DB::enableQueryLog();
            DB::flushQueryLog();
            $response = $this->get($url)->assertOk()->assertHeaderMissing('Set-Cookie');
            self::assertSame([], DB::getQueryLog(), 'Public CSS/SVG delivery must not query dashboard companies.');
            DB::disableQueryLog();
            $this->withHeader('If-None-Match', $response->headers->get('ETag'))->get($url)->assertStatus(304);
            $this->flushHeaders();
        }
        $this->get('/service/fixstern.css?mt=12')->assertSee('margin-top: 12px;', false);
        $this->get('/service/does-not-exist.css')->assertNotFound();
    }

    public function test_panel_registration_is_database_free_and_navigation_uses_current_tenant(): void
    {
        DB::enableQueryLog();
        DB::flushQueryLog();
        $panel = (new DashboardPanelProvider(app()))->panel(Panel::make());
        self::assertCount(0, DB::getQueryLog(), 'Panel registration must not query a tenant.');
        Filament::setCurrentPanel($panel);
        $company = Company::find(1);
        Filament::setTenant($company, isQuiet: true);
        $items = collect($panel->getNavigationItems())->keyBy(fn ($item) => $item->getLabel());
        self::assertTrue($items['altStar']->isVisible());
        $this->features(['image-alt-tags']);
        self::assertFalse($items['altStar']->isVisible());
        DB::table('companies')->insert(['id' => 2, 'ulid' => 'another-local-company', 'name' => 'Second local fixture']);
        Filament::setTenant(Company::find(2), isQuiet: true);
        self::assertTrue($items['altStar']->isVisible());
        Filament::setTenant(null, isQuiet: true);
        self::assertFalse($items['altStar']->isVisible());
    }

    public function test_repository_scripts_keep_their_content_and_receive_the_sprite_loader(): void
    {
        // Actual script files are read from the repository, never from a customer system.
        $cases = [
            'standard' => [], 'tts' => ['screen-reader'], 'eztext' => ['eztext'],
            'ezspeak' => ['ezspeak'], 'eztext_ezspeak' => ['eztext', 'ezspeak'],
            'tts_eztext' => ['eztext', 'screen-reader'], 'tts_ezspeak' => ['ezspeak', 'screen-reader'],
            'tts_eztext_ezspeak' => ['leichte-sprache'], 'eztext_only' => ['eztext-only'],
            'ezspeak_only' => ['ezspeak-only'], 'eztext_ezspeak_only' => ['eztext-ezspeak-only'],
        ];
        foreach ($cases as $variant => $features) {
            $template = file_get_contents(storage_path('app/scripts/'.$variant.'.js'));
            Storage::put('scripts/'.$variant.'.js', $template);
            $this->features($features);
            $response = $this->get('/service/'.self::ULID.'/fixstern.js')->assertOk();
            $body = $response->getContent();
            self::assertStringEndsWith(str_replace('{{ulid}}', self::ULID, $template), $body);
            self::assertSame(str_contains($template, 'ini-bf-voice-navigation-svg'), str_contains($body, 'window.__iniBfIconSpriteLoading'));
            $response->assertHeader('ETag', '"'.hash('sha256', $body).'"');
        }
    }

    public function test_real_database_queue_defers_processing_and_preserves_event_idempotency(): void
    {
        config(['queue.default' => 'database']);
        DB::table('company_settings')->insert(['company_id' => 1, 'default_standard' => '2.2', 'valid_domains' => 'example.com', 'exclude_query_string_urls' => 1]);
        $lock = Cache::lock('referrer-recording-company:'.self::ULID, 10);
        $lock->get();
        try {
            $this->withHeader('Referer', 'https://www.example.com/page?v=1')
                ->get('/service/'.self::ULID.'/fixstern.js')->assertOk();
            self::assertSame(0, DB::table('referrers')->count());
            self::assertSame(1, DB::table('jobs')->where('queue', 'referrers')->count());
        } finally {
            $lock->release();
        }
        $payload = json_decode(DB::table('jobs')->where('queue', 'referrers')->value('payload'), true);
        $job = unserialize($payload['data']['command']);
        $worker = app('queue.worker');
        $worker->runNextJob('database', 'referrers', new \Illuminate\Queue\WorkerOptions(sleep: 0));
        self::assertSame(0, DB::table('jobs')->where('queue', 'referrers')->count());
        self::assertSame(0, (int) DB::table('referrers')->value('count'));
        self::assertSame(1, DB::table('pa11y_urls')->count());
        self::assertSame(1, DB::table('jobs')->where('queue', 'accessibility')->count());
        $scanPayload = json_decode(DB::table('jobs')->where('queue', 'accessibility')->value('payload'), true);
        $scan = unserialize($scanPayload['data']['command']);
        self::assertSame('2.2', (new \ReflectionProperty($scan, 'standard'))->getValue($scan));
        $service = app(WidgetReferrerService::class);
        $job->handle($service);
        self::assertSame(0, (int) DB::table('referrers')->value('count'));
        $service->process((string) Str::uuid(), self::ULID, 'https://www.example.com/page?v=2');
        self::assertSame(1, (int) DB::table('referrers')->value('count'));
        self::assertSame(1, DB::table('jobs')->where('queue', 'accessibility')->count());
        foreach (['https://other.example/page', 'http://[invalid'] as $referrer) {
            $service->process((string) Str::uuid(), self::ULID, $referrer);
        }
        self::assertSame(1, DB::table('referrers')->count());
    }

    public function test_queue_outage_is_logged_without_losing_javascript_response(): void
    {
        config(['queue.default' => 'database', 'queue.connections.database.table' => 'unavailable_jobs']);
        Log::spy();
        $this->withHeader('Referer', 'https://www.example.com/page')
            ->get('/service/'.self::ULID.'/fixstern.js')->assertOk();
        Log::shouldHaveReceived('error')->with('Widget referrer processing could not be queued.', \Mockery::type('array'))->once();
    }

    public function test_sync_queue_is_never_used_for_inline_processing(): void
    {
        config(['queue.default' => 'sync']);
        $this->withHeader('Referer', 'https://www.example.com/page')
            ->get('/service/'.self::ULID.'/fixstern.js')->assertOk();
        self::assertSame(0, DB::table('referrers')->count());
        self::assertSame(0, DB::table('jobs')->count());
    }
}
