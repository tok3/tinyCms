<?php

namespace Tests\Feature;

use App\Services\EmailDomainBlocklist;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class EmailBlocklistProtectionTest extends TestCase
{
    private string $blocklistPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->blocklistPath = storage_path('framework/testing/disposable-email-domains.txt');

        if (! is_dir(dirname($this->blocklistPath))) {
            mkdir(dirname($this->blocklistPath), 0777, true);
        }

        file_put_contents($this->blocklistPath, "any.pink\nmailinator.com\n");

        config([
            'email-protection.blocklist_path' => $this->blocklistPath,
            'email-protection.fallback_path' => $this->blocklistPath,
            'email-protection.source_url' => 'https://example.test/disposable-email-domains.txt',
            'email-protection.minimum_domains' => 2,
        ]);
    }

    protected function tearDown(): void
    {
        @unlink($this->blocklistPath);
        @unlink($this->blocklistPath.'.tmp');

        parent::tearDown();
    }

    public function test_checkout_rejects_disposable_email_before_creating_customer_or_invoice(): void
    {
        $response = $this->from('/preise')->post('/checkout', [
            'user' => ['email' => 'bgg-671lbkbz0p7mt7ywd@any.pink'],
            'company' => ['email' => 'rechnung@serioeses-unternehmen.de'],
        ]);

        $response
            ->assertRedirect('/preise')
            ->assertSessionHasErrors('user.email');
    }

    public function test_checkout_rejects_reserved_example_domain_even_when_not_in_downloaded_list(): void
    {
        file_put_contents($this->blocklistPath, "mailinator.com\n");

        $response = $this->from('/preise')->post('/checkout', [
            'user' => ['email' => 'besteller@example.org'],
            'company' => ['email' => 'rechnung@legitime-firma.de'],
        ]);

        $response
            ->assertRedirect('/preise')
            ->assertSessionHasErrors('user.email');
    }

    public function test_trial_signup_uses_the_same_disposable_domain_protection(): void
    {
        $this->from('/trial')->post('/trial', [
            'email' => 'test@any.pink',
        ])
            ->assertRedirect('/trial')
            ->assertSessionHasErrors('email');
    }

    public function test_regular_registration_rejects_reserved_example_domains(): void
    {
        $this->from('/register')->post('/register', [
            'email' => 'test@example.org',
        ])
            ->assertRedirect('/register')
            ->assertSessionHasErrors('email');
    }

    public function test_blocklist_matches_subdomains_without_blocking_unlisted_mail_providers(): void
    {
        $blocklist = app(EmailDomainBlocklist::class);

        $this->assertTrue($blocklist->blocks('person@sub.any.pink'));
        $this->assertFalse($blocklist->blocks('person@proton.me'));
    }

    public function test_update_command_normalizes_and_publishes_a_valid_github_list(): void
    {
        Http::fake([
            'https://example.test/disposable-email-domains.txt' => Http::response(
                "MAILINATOR.COM\r\nany.pink\n# comment\ninvalid value\nmailinator.com\n",
                200,
            ),
        ]);

        $this->artisan('email-blocklist:update')
            ->expectsOutputToContain('2 Domains')
            ->assertExitCode(0);

        $this->assertSame("any.pink\nmailinator.com\n", file_get_contents($this->blocklistPath));
    }

    public function test_failed_update_preserves_the_last_known_good_list(): void
    {
        Http::fake([
            'https://example.test/disposable-email-domains.txt' => Http::response('temporarily unavailable', 503),
        ]);

        $this->artisan('email-blocklist:update')->assertExitCode(1);

        $this->assertSame("any.pink\nmailinator.com\n", file_get_contents($this->blocklistPath));
    }
}
