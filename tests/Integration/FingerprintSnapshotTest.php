<?php

use App\Models\Pa11yUrl;
use App\Models\Pa11yUrlFingerprint;
use App\Services\AccessibilitySnapshotReplicationService;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;

/** Dedicated empty MySQL database only; never boot the application's .env. */
class FingerprintSnapshotTest extends TestCase
{
    private Capsule $database;
    private AccessibilitySnapshotReplicationService $service;
    private Pa11yUrl $url;
    private ?Container $previousContainer = null;

    protected function setUp(): void
    {
        $name = getenv('AKB_FINGERPRINT_TEST_DATABASE');
        if (! $name) {
            $this->markTestSkipped('Set AKB_FINGERPRINT_TEST_DATABASE to an isolated akb_fingerprint_test_* database.');
        }
        if (! preg_match('/^akb_fingerprint_test_[a-z0-9_]+$/', $name)) {
            throw new RuntimeException('Refusing a database without the dedicated test prefix.');
        }
        $this->previousContainer = Container::getInstance();
        $container = new Container();
        Container::setInstance($container);
        $container->instance('config', new Repository([
            'accessibility_scan' => ['fingerprint' => ['stale_after_minutes' => 10080]],
        ]));
        $this->database = new Capsule($container);
        $this->database->addConnection([
            'driver' => 'mysql', 'unix_socket' => getenv('AKB_FINGERPRINT_TEST_SOCKET') ?: '/run/mysqld/mysqld.sock',
            'database' => $name, 'username' => getenv('AKB_FINGERPRINT_TEST_USER') ?: 'root',
            'password' => getenv('AKB_FINGERPRINT_TEST_PASSWORD') ?: '',
            'charset' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci', 'prefix' => '',
        ]);
        $this->database->setAsGlobal();
        $this->database->bootEloquent();
        $container->instance('db', $this->database->getDatabaseManager());
        Facade::clearResolvedInstances();
        Facade::setFacadeApplication($container);
        $schema = $this->database->schema();
        foreach (['pa11y_url_fingerprints', 'pa11y_statistics', 'pa11y_accessibility_issues'] as $table) {
            $schema->dropIfExists($table);
        }
        $schema->create('pa11y_url_fingerprints', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('url_id'); $table->unsignedBigInteger('company_id');
            $table->string('standard'); $table->string('fingerprint')->nullable();
            $table->string('fingerprint_state')->nullable(); $table->timestamp('fingerprint_scan_date')->nullable();
            $table->string('decision_action')->nullable(); $table->string('decision_reason')->nullable();
            $table->json('decision_context')->nullable(); $table->timestamps(); $table->softDeletes();
        });
        $schema->create('pa11y_statistics', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('url_id'); $table->unsignedBigInteger('company_id');
            $table->string('standard'); $table->string('wcag_level')->nullable();
            foreach (['error_count', 'warning_count', 'notice_count'] as $field) $table->integer($field)->nullable();
            $table->timestamp('scanned_at'); $table->timestamps(); $table->softDeletes();
        });
        $schema->create('pa11y_accessibility_issues', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('url_id'); $table->string('standard');
            foreach (['issue', 'selector', 'wcag_level', 'code', 'type', 'typeCode', 'context', 'runner', 'runnerExtras'] as $field) {
                $table->text($field)->nullable();
            }
            $table->timestamps();
        });
        Carbon::setTestNow(Carbon::parse('2026-09-11 12:00:00'));
        $this->service = new AccessibilitySnapshotReplicationService();
        $this->url = new Pa11yUrl();
        $this->url->forceFill(['id' => 1, 'company_id' => 1, 'url' => 'https://example.test/']);
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        if ($this->previousContainer) {
            $this->database->getConnection()->disconnect();
            Facade::clearResolvedInstances();
            Facade::setFacadeApplication($this->previousContainer);
            Container::setInstance($this->previousContainer);
        }
        parent::tearDown();
    }

    private function fingerprint(string $hash = 'html-a', string $standard = '2.1'): Pa11yUrlFingerprint
    {
        return Pa11yUrlFingerprint::create([
            'url_id' => 1, 'company_id' => 1, 'standard' => $standard, 'fingerprint' => $hash,
            'fingerprint_state' => 'unchanged', 'fingerprint_scan_date' => now(), 'decision_context' => [],
        ]);
    }

    private function statistics(int $errors = 1, int $warnings = 38, string $level = 'combined', string $standard = '2.1'): void
    {
        $this->database->table('pa11y_statistics')->insert([
            'url_id' => 1, 'company_id' => 1, 'standard' => $standard, 'wcag_level' => $level,
            'error_count' => $errors, 'warning_count' => $warnings, 'notice_count' => 0, 'scanned_at' => now(),
        ]);
    }

    public function testUnchangedFetchWithoutCompletedScanNeverCopiesOldStatistics(): void
    {
        $this->statistics(156, 5);
        $this->fingerprint(); // Fetch A, scan not finished.
        $next = $this->fingerprint(); // Fetch B sees the same HTML.
        $this->assertSame(0, $this->service->replicateLatestSnapshot($this->url, '2.1', $next)['stats_copied']);
        $this->assertSame(1, $this->database->table('pa11y_statistics')->count());
    }

    public function testReuseUsesFrozenCompletedResultAndKeepsItsSourceTime(): void
    {
        $source = $this->fingerprint();
        $this->statistics();
        $this->database->table('pa11y_accessibility_issues')->insert([
            'url_id' => 1, 'standard' => '2.1', 'code' => 'heading-order', 'selector' => '#original',
        ]);
        $this->service->recordCompletedScan($this->url, $source, [], ['combined']);
        $originalTime = $source->fresh()->decision_context['completed_snapshot']['measured_at'];
        // Other legacy rows and the mutable issue table must not determine reuse.
        $this->database->table('pa11y_statistics')->update(['warning_count' => 2]);
        $this->database->table('pa11y_accessibility_issues')->delete();
        Carbon::setTestNow(now()->addDay());
        $next = $this->fingerprint();
        $result = $this->service->replicateLatestSnapshot($this->url, '2.1', $next);
        $this->assertSame(['stats_copied' => 1, 'issues_copied' => 1], $result);
        $this->assertSame(38, $this->database->table('pa11y_statistics')->orderByDesc('id')->value('warning_count'));
        $this->assertSame('#original', $this->database->table('pa11y_accessibility_issues')->value('selector'));
        $context = $next->fresh()->decision_context;
        $this->assertSame($source->id, $context['reused_from_fingerprint_id']);
        $this->assertSame($originalTime, $context['source_scanned_at']);
        $this->assertArrayNotHasKey('completed_snapshot', $context);
        // Repeating the reuse on the same day must not add statistics or duplicate issues.
        $this->service->replicateLatestSnapshot($this->url, '2.1', $this->fingerprint());
        $this->assertSame(2, $this->database->table('pa11y_statistics')->count());
        $this->assertSame(1, $this->database->table('pa11y_accessibility_issues')->count());
    }

    public function testChangedHtmlFailedScanAndChangedOptionsCannotReuseAnUnrelatedSuccess(): void
    {
        $source = $this->fingerprint();
        $this->statistics();
        $this->service->recordCompletedScan($this->url, $source, ['contrast' => 0], ['combined']);
        foreach ([$this->fingerprint('html-b'), $this->fingerprint('html-b'), $this->fingerprint('')] as $next) {
            $this->assertSame(0, $this->service->replicateLatestSnapshot($this->url, '2.1', $next, ['contrast' => 0])['stats_copied']);
        }
        $this->assertSame(0, $this->service->replicateLatestSnapshot($this->url, '2.1', $this->fingerprint(), ['contrast' => 1])['stats_copied']);
        $this->assertSame(0, $this->service->replicateLatestSnapshot($this->url, '2.2', $this->fingerprint('html-a', '2.2'), ['contrast' => 0])['stats_copied']);
        $otherUrl = clone $this->url; $otherUrl->id = 2;
        $this->assertSame(0, $this->service->replicateLatestSnapshot($otherUrl, '2.1', $source, ['contrast' => 0])['stats_copied']);
    }

    public function testZeroIssuesIsAReusableSuccessButCopiesDoNotExtendItsLifetime(): void
    {
        $source = $this->fingerprint();
        $this->statistics(0, 0);
        $this->service->recordCompletedScan($this->url, $source, [], ['combined']);
        Carbon::setTestNow(now()->addDays(6));
        $this->assertSame(1, $this->service->replicateLatestSnapshot($this->url, '2.1', $this->fingerprint())['stats_copied']);
        Carbon::setTestNow(now()->addDays(2));
        $this->assertSame(0, $this->service->replicateLatestSnapshot($this->url, '2.1', $this->fingerprint())['stats_copied']);
    }

    public function testIncompleteMultiLevelScanIsNeverPublishedAsCompleted(): void
    {
        $source = $this->fingerprint('html-a', '2.0');
        $this->statistics(1, 2, 'A', '2.0');
        $this->service->recordCompletedScan($this->url, $source, [], ['A', 'AA']);
        $this->assertArrayNotHasKey('completed_snapshot', $source->fresh()->decision_context);
    }
    public function testNullStatisticsCannotBecomeASuccessfulSnapshot(): void
    {
        $source = $this->fingerprint();
        $this->statistics();
        $this->database->table('pa11y_statistics')->update(['error_count' => null]);
        $this->service->recordCompletedScan($this->url, $source, [], ['combined']);
        $this->assertArrayNotHasKey('completed_snapshot', $source->fresh()->decision_context);
    }

    public function testCompletedMultiLevelScanRestoresEveryRequestedLevel(): void
    {
        $source = $this->fingerprint('html-a', '2.0');
        $this->statistics(1, 2, 'A', '2.0');
        $this->statistics(3, 4, 'AA', '2.0');
        $this->service->recordCompletedScan($this->url, $source, ['levels' => ['A', 'AA']], ['A', 'AA']);
        Carbon::setTestNow(now()->addDay());
        $result = $this->service->replicateLatestSnapshot(
            $this->url, '2.0', $this->fingerprint('html-a', '2.0'), ['levels' => ['A', 'AA']]
        );
        $this->assertSame(2, $result['stats_copied']);
        $this->assertSame(4, $this->database->table('pa11y_statistics')->count());
    }

}
