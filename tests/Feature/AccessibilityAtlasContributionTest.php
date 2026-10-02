<?php

namespace Tests\Feature;

use App\Mail\AccessibilityAtlasContributionMail;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AccessibilityAtlasContributionTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_public_accessibility_atlas_contribution_page_is_available(): void
    {
        $this->get('/barrierefreiheitsatlas/beitrag')
            ->assertOk()
            ->assertSee('Hilf uns, das Web zugänglicher zu machen.')
            ->assertSee('Barrierefreiheitsatlas im Web');
    }

    public function test_atlas_tab_is_only_visible_on_the_homepage(): void
    {
        $this->createPage('/', 'Startseite', '00000000-0000-0000-0000-000000000101');
        $this->createPage('test-unterseite', 'Test-Unterseite', '00000000-0000-0000-0000-000000000102');

        $this->get('/')
            ->assertOk()
            ->assertSee('Ich bin betroffen');

        $this->get('/test-unterseite')
            ->assertOk()
            ->assertDontSee('Ich bin betroffen');
    }

    public function test_contribution_page_contains_the_low_threshold_form(): void
    {
        $this->get(route('accessibility-atlas.contribute'))
            ->assertOk()
            ->assertSee('name="page_url"', false)
            ->assertSee('name="body"', false)
            ->assertSee('name="expected_help"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="privacy_accepted"', false)
            ->assertSee('Beitrag zum Atlas senden');
    }

    public function test_contribution_page_has_a_descriptive_title(): void
    {
        $this->get(route('accessibility-atlas.contribute'))
            ->assertOk()
            ->assertSee(
                '<title>Beitrag zum Barrierefreiheitsatlas | Aktion Barrierefrei</title>',
                false,
            );
    }

    public function test_valid_contribution_is_emailed_to_the_configured_recipient(): void
    {
        Mail::fake();
        config(['mail.accessibility_atlas_recipient' => 'atlas@example.org']);

        $response = $this->post('/barrierefreiheitsatlas/beitrag', $this->validPayload([
            'email' => 'hinweisgeberin@example.org',
        ]));

        $response
            ->assertRedirect(route('accessibility-atlas.contribute'))
            ->assertSessionHas('accessibility_atlas_sent', true)
            ->assertSessionHasNoErrors();

        Mail::assertSent(AccessibilityAtlasContributionMail::class, function (AccessibilityAtlasContributionMail $mail): bool {
            return $mail->hasTo('atlas@example.org')
                && $mail->hasReplyTo('hinweisgeberin@example.org')
                && $mail->hasSubject('Neuer Beitrag zum Barrierefreiheitsatlas')
                && $mail->contribution['page_url'] === 'https://example.org/barriere';
        });
    }

    public function test_optional_email_may_be_blank_without_adding_reply_to(): void
    {
        Mail::fake();

        $this->post('/barrierefreiheitsatlas/beitrag', $this->validPayload(['email' => '']))
            ->assertRedirect(route('accessibility-atlas.contribute'))
            ->assertSessionHasNoErrors();

        Mail::assertSent(AccessibilityAtlasContributionMail::class, function (AccessibilityAtlasContributionMail $mail): bool {
            return empty($mail->replyTo);
        });
    }

    public function test_required_contribution_fields_are_validated_before_sending(): void
    {
        Mail::fake();

        $this->from(route('accessibility-atlas.contribute'))
            ->post('/barrierefreiheitsatlas/beitrag', [
                'page_url' => '',
                'body' => '',
            ])
            ->assertRedirect(route('accessibility-atlas.contribute'))
            ->assertSessionHasErrors(['page_url', 'body', 'privacy_accepted']);

        Mail::assertNothingSent();
    }

    public function test_non_http_and_oversized_urls_are_rejected(): void
    {
        Mail::fake();

        foreach (['javascript:alert(1)', 'ftp://example.org/datei', 'https://example.org/' . str_repeat('a', 2040)] as $url) {
            $this->from(route('accessibility-atlas.contribute'))
                ->post('/barrierefreiheitsatlas/beitrag', $this->validPayload(['page_url' => $url]))
                ->assertRedirect(route('accessibility-atlas.contribute'))
                ->assertSessionHasErrors('page_url');
        }

        Mail::assertNothingSent();
    }

    public function test_body_length_limits_are_enforced(): void
    {
        Mail::fake();

        foreach ([str_repeat('a', 9), str_repeat('a', 5001)] as $body) {
            $this->from(route('accessibility-atlas.contribute'))
                ->post('/barrierefreiheitsatlas/beitrag', $this->validPayload(['body' => $body]))
                ->assertRedirect(route('accessibility-atlas.contribute'))
                ->assertSessionHasErrors('body');
        }

        Mail::assertNothingSent();
    }

    public function test_expected_help_may_not_exceed_3000_characters(): void
    {
        Mail::fake();

        $this->from(route('accessibility-atlas.contribute'))
            ->post('/barrierefreiheitsatlas/beitrag', $this->validPayload([
                'expected_help' => str_repeat('a', 3001),
            ]))
            ->assertRedirect(route('accessibility-atlas.contribute'))
            ->assertSessionHasErrors('expected_help');

        Mail::assertNothingSent();
    }

    public function test_invalid_oversized_and_header_injection_emails_are_rejected(): void
    {
        Mail::fake();

        $emails = [
            'keine-mailadresse',
            str_repeat('a', 245) . '@example.org',
            "person@example.org\r\nBcc: attacker@example.org",
        ];

        foreach ($emails as $email) {
            $this->from(route('accessibility-atlas.contribute'))
                ->post('/barrierefreiheitsatlas/beitrag', $this->validPayload(['email' => $email]))
                ->assertRedirect(route('accessibility-atlas.contribute'))
                ->assertSessionHasErrors('email');
        }

        Mail::assertNothingSent();
    }

    public function test_valid_input_is_preserved_after_a_validation_error(): void
    {
        Mail::fake();

        $this->from(route('accessibility-atlas.contribute'))
            ->post('/barrierefreiheitsatlas/beitrag', $this->validPayload(['privacy_accepted' => null]))
            ->assertRedirect(route('accessibility-atlas.contribute'))
            ->assertSessionHasErrors('privacy_accepted')
            ->assertSessionHasInput('page_url', 'https://example.org/barriere')
            ->assertSessionHasInput('body', 'Die Navigation ist nur mit einer Maus bedienbar.');

        Mail::assertNothingSent();
    }

    private function createPage(string $slug, string $title, string $externalId): void
    {
        DB::table('pages')->insert([
            'external_id' => $externalId,
            'title' => $title,
            'slug' => $slug,
            'published' => true,
            'navbar_type' => 1,
            'blocks' => '[]',
            'meta' => json_encode(['description' => $title]),
            'meta_og' => json_encode(['description' => $title]),
            'meta_twitter' => json_encode(['description' => $title]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'page_url' => 'https://example.org/barriere',
            'body' => 'Die Navigation ist nur mit einer Maus bedienbar.',
            'expected_help' => 'Eine vollständige Bedienung mit der Tastatur.',
            'email' => '',
            'privacy_accepted' => '1',
            'website' => '',
        ], $overrides);
    }
}
