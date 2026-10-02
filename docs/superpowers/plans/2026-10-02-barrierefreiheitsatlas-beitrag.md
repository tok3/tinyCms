# Barrierefreiheitsatlas Contribution Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a visually distinctive, accessible homepage entry point and a low-threshold form that emails accessibility barrier contributions to Aktion Barrierefrei without database storage.

**Architecture:** A dedicated controller and form request own the public GET/POST flow, while a focused Mailable renders HTML and plain-text notifications. Blade partials and a feature-specific SCSS module provide the homepage tab, contribution page, success/error states, and responsive behavior without new runtime dependencies.

**Tech Stack:** Laravel 10, Blade, Laravel Mail, Pest/PHPUnit feature tests, Bootstrap 5, SCSS/Vite, local SVG.

**Spec:** `docs/superpowers/specs/2026-10-02-barrierefreiheitsatlas-beitrag-design.md`

## Global Constraints

- Contributions are emailed only; do not create database tables or persist submissions.
- Recipient defaults to `info@aktion-barrierefrei.org` through `config('mail.accessibility_atlas_recipient')`.
- Public copy frames the flow as a constructive contribution to the “Barrierefreiheitsatlas im Web,” never as a complaint portal.
- Use Hero-Marineblau `#091543`, Signalgelb `#f6e636`, and the existing Poppins configuration.
- Add no JavaScript or third-party dependency; respect `prefers-reduced-motion: reduce`.
- Support keyboard use, visible focus, associated errors, 200% zoom, and layouts down to 320px.
- Keep the POST route at ten attempts per minute and client.

## Review Focus

- Non-HTTP(S) URLs such as `javascript:` and `ftp:` must be rejected without sending mail (Task 2 test).
- A blank optional email must send successfully without adding a `replyTo` header (Task 2 test).
- An email containing CR/LF header-injection content must be rejected (Task 2 test).
- A mail transport exception must return a generic message, retain safe input, and avoid a success state (Task 3 test).
- A filled honeypot must mimic success while sending no email (Task 3 test).

---

### Task 1: Public page, homepage atlas tab, and responsive presentation

**Files:**
- Create: `app/Http/Controllers/AccessibilityAtlasContributionController.php`
- Create: `resources/views/accessibility-atlas/contribute.blade.php`
- Create: `resources/views/components/accessibility-atlas-tab.blade.php`
- Create: `resources/scss/custom/components/_accessibility-atlas.scss`
- Create: `public/assets/img/barrierefreiheitsatlas-globe.svg`
- Modify: `routes/web.php:314-323`
- Modify: `resources/views/page.blade.php:35-38`
- Modify: `resources/scss/theme.scss:20-27`
- Create: `tests/Feature/AccessibilityAtlasContributionTest.php`
- Modify: `tests/Feature/HomepagePerformanceTest.php`

**Interfaces:**
- Produces: named GET route `accessibility-atlas.contribute`; `AccessibilityAtlasContributionController::create(): \Illuminate\Contracts\View\View`; Blade component `<x-accessibility-atlas-tab />`.
- Consumes: existing `<x-page-layout>`, CMS `$page->slug`, shared header/footer, and Vite `resources/scss/theme.scss`.

- [ ] **Step 1: Write failing route and visibility tests**

Add tests with these behaviors:

```php
it('shows the public accessibility atlas contribution page', function () {
    $this->get('/barrierefreiheitsatlas/beitrag')
        ->assertOk()
        ->assertSee('Hilf uns, das Web zugänglicher zu machen.')
        ->assertSee('Barrierefreiheitsatlas im Web');
});

it('shows the atlas tab only on the homepage', function () {
    $this->get('/')->assertOk()->assertSee('Ich bin betroffen');
    $this->get('/test-unterseite')->assertOk()->assertDontSee('Ich bin betroffen');
});
```

The second test creates a published `test-unterseite` page using the same minimal database fixture fields as the homepage setup.

- [ ] **Step 2: Run the focused tests and confirm RED**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php tests/Feature/HomepagePerformanceTest.php`

Expected: the contribution route is handled by the CMS fallback or returns 404, and the homepage tab assertions fail because the feature does not exist.

- [ ] **Step 3: Add the GET endpoint and page shell**

Implement `AccessibilityAtlasContributionController::create(): View`, returning `accessibility-atlas.contribute` with serialized page metadata for title and description. Register the named GET route before both dynamic CMS fallback routes. Build the page with the exact hero copy, three-step explanation, form-card shell, and shared page layout from the spec.

- [ ] **Step 4: Add the homepage-only tab and visual assets**

Render `<x-accessibility-atlas-tab />` in `page.blade.php` only when `$page->slug === '/'`. Link it to `route('accessibility-atlas.contribute')`, use the local globe SVG decoratively, and add an explicit German `aria-label`.

Implement `_accessibility-atlas.scss` with feature-prefixed selectors, `#091543`/`#f6e636`, responsive desktop/mobile positioning, visible `:focus-visible`, no horizontal overflow at 320px, and a `prefers-reduced-motion` override. Import it from `theme.scss`.

- [ ] **Step 5: Run focused tests and the asset build and confirm GREEN**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php tests/Feature/HomepagePerformanceTest.php`

Expected: all tests in both files pass.

Run: `npm run build`

Expected: Vite exits 0 and emits the theme asset without SCSS errors.

- [ ] **Step 6: Commit the public presentation**

```bash
git add app/Http/Controllers/AccessibilityAtlasContributionController.php routes/web.php resources/views/accessibility-atlas/contribute.blade.php resources/views/components/accessibility-atlas-tab.blade.php resources/views/page.blade.php resources/scss/custom/components/_accessibility-atlas.scss resources/scss/theme.scss public/assets/img/barrierefreiheitsatlas-globe.svg tests/Feature/AccessibilityAtlasContributionTest.php tests/Feature/HomepagePerformanceTest.php
git commit -m "feat: add accessibility atlas contribution entry"
```

### Task 2: Validated email contribution flow

**Files:**
- Create: `app/Http/Requests/AccessibilityAtlasContributionRequest.php`
- Create: `app/Mail/AccessibilityAtlasContributionMail.php`
- Create: `resources/views/emails/accessibility-atlas-contribution.blade.php`
- Create: `resources/views/emails/accessibility-atlas-contribution-text.blade.php`
- Modify: `app/Http/Controllers/AccessibilityAtlasContributionController.php`
- Modify: `config/mail.php:97-105`
- Modify: `routes/web.php` near the Task 1 GET route
- Modify: `resources/views/accessibility-atlas/contribute.blade.php`
- Modify: `tests/Feature/AccessibilityAtlasContributionTest.php`

**Interfaces:**
- Consumes: Task 1 named route `accessibility-atlas.contribute` and page template.
- Produces: named POST route `accessibility-atlas.store`; `AccessibilityAtlasContributionController::store(AccessibilityAtlasContributionRequest $request): RedirectResponse`; validated keys `page_url`, `body`, `expected_help`, `email`, `privacy_accepted`, `website`; delivery key `submitted_at`; `AccessibilityAtlasContributionMail` accepting the contribution array.

- [ ] **Step 1: Write failing happy-path and validation tests**

Add tests that use `Mail::fake()` and assert:

```php
it('emails a valid contribution and redirects to success', function () {
    config(['mail.accessibility_atlas_recipient' => 'info@aktion-barrierefrei.org']);

    $response = $this->post(route('accessibility-atlas.store'), validAtlasPayload());

    $response->assertRedirect(route('accessibility-atlas.contribute'))
        ->assertSessionHas('accessibility_atlas_sent', true);
    Mail::assertSent(AccessibilityAtlasContributionMail::class, 1);
});
```

Also add separate tests proving: required URL/body/privacy errors prevent mail; `javascript:` and `ftp:` URLs fail `page_url`; body limits are 10–5000; `expected_help` is at most 3000; email is optional and, when present, valid and at most 254; CR/LF email input fails; submitted values survive validation redirects.

- [ ] **Step 2: Run the focused test and confirm RED**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php`

Expected: tests fail because the POST route, request, Mailable, and form do not exist.

- [ ] **Step 3: Implement request validation and POST route**

Implement `AccessibilityAtlasContributionRequest::authorize(): bool`, `rules(): array`, `attributes(): array`, and German `messages(): array`. Use `required|url:http,https|max:2048` for `page_url`, `required|string|min:10|max:5000` for `body`, `nullable|string|max:3000` for `expected_help`, RFC email validation plus CR/LF rejection and `max:254` for `email`, `accepted` for privacy, and `nullable|string|max:255` for `website`. Register `accessibility-atlas.store` with `throttle:10,1` before CMS fallbacks.

- [ ] **Step 4: Implement the mail class and templates**

Implement `AccessibilityAtlasContributionMail::__construct(public readonly array $contribution)` with subject `Neuer Beitrag zum Barrierefreiheitsatlas`. Configure `replyTo` only for a non-empty validated email; rely on `config('mail.from')` for the sender. Render HTML and plain text containing the URL, body, optional expected help, optional email, and timestamp. Add `accessibility_atlas_recipient` to `config/mail.php` with environment override `ACCESSIBILITY_ATLAS_RECIPIENT` and fallback `info@aktion-barrierefrei.org`.

- [ ] **Step 5: Implement controller success flow and accessible form**

Implement `store()` using `Mail::to(config('mail.accessibility_atlas_recipient'))->send(...)`. Pass the validated values plus `submitted_at => now()` to the Mailable, then redirect to the GET route with `accessibility_atlas_sent=true`.

Complete the Blade form with CSRF protection, required/optional labels, persistent old input, linked help/error IDs, `aria-invalid`, the hidden honeypot, privacy link to `/privacy`, and button copy `Beitrag zum Atlas senden`. When the session flag is present, replace the form with the exact thank-you copy and links from the spec.

- [ ] **Step 6: Run focused tests and confirm GREEN**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php`

Expected: all contribution tests pass and `Mail::assertSent` confirms the configured recipient, subject data, optional `replyTo`, and no reply-to address for blank email.

- [ ] **Step 7: Commit the email flow**

```bash
git add app/Http/Requests/AccessibilityAtlasContributionRequest.php app/Mail/AccessibilityAtlasContributionMail.php app/Http/Controllers/AccessibilityAtlasContributionController.php config/mail.php routes/web.php resources/views/accessibility-atlas/contribute.blade.php resources/views/emails/accessibility-atlas-contribution.blade.php resources/views/emails/accessibility-atlas-contribution-text.blade.php tests/Feature/AccessibilityAtlasContributionTest.php
git commit -m "feat: email accessibility atlas contributions"
```

### Task 3: Abuse protection, delivery failure handling, and final verification

**Files:**
- Modify: `app/Http/Controllers/AccessibilityAtlasContributionController.php`
- Modify: `resources/views/accessibility-atlas/contribute.blade.php`
- Modify: `tests/Feature/AccessibilityAtlasContributionTest.php`

**Interfaces:**
- Consumes: Task 2 request keys, Mailable, named GET/POST routes, and session success flag.
- Produces: `accessibility_atlas_error` session message for a failed delivery; honeypot success behavior with no mail.

- [ ] **Step 1: Write failing honeypot, rate-limit, and transport-failure tests**

Add tests asserting:

```php
it('silently accepts honeypot submissions without sending mail', function () {
    Mail::fake();
    $payload = validAtlasPayload(['website' => 'bot.example']);

    $this->post(route('accessibility-atlas.store'), $payload)
        ->assertRedirect(route('accessibility-atlas.contribute'))
        ->assertSessionHas('accessibility_atlas_sent', true);

    Mail::assertNothingSent();
});
```

Add a rate-limit test whose eleventh request receives HTTP 429. Add a transport-failure test that forces `Mail::send` to throw, then asserts a redirect with input, `accessibility_atlas_error`, no success flag, generic public copy, and a logged exception without exposing its message in HTML.

- [ ] **Step 2: Run the focused test and confirm RED**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php`

Expected: honeypot currently sends mail and delivery exceptions currently escape as server errors.

- [ ] **Step 3: Implement honeypot and failure behavior**

At the start of `store()`, return the same success redirect when `website` is filled, before constructing the Mailable. Wrap only mail delivery in `try/catch (Throwable $exception)`, log `Accessibility atlas contribution delivery failed` with the exception context, and redirect back with all validated input except `website`. Set `accessibility_atlas_error` to `Dein Beitrag konnte gerade nicht gesendet werden. Bitte versuche es später noch einmal oder schreibe uns direkt an info@aktion-barrierefrei.org.`

Render the error as an accessible `role="alert"` block above the form and include the direct `mailto:info@aktion-barrierefrei.org` fallback.

- [ ] **Step 4: Run focused and full automated verification**

Run: `php artisan test tests/Feature/AccessibilityAtlasContributionTest.php tests/Feature/HomepagePerformanceTest.php`

Expected: all feature-focused tests pass.

Run: `php artisan test`

Expected: the full suite exits 0. If pre-existing failures appear, record their exact test names and output before proceeding.

Run: `npm run build`

Expected: Vite exits 0 with no SCSS compilation error.

- [ ] **Step 5: Perform visual and accessibility smoke checks**

Serve the app locally and inspect `/` and `/barrierefreiheitsatlas/beitrag` at 320px, 768px, and desktop width. Confirm no overlap or horizontal scrolling, keyboard-only completion, clear focus, readable validation and success/error states, correct `#091543`/`#f6e636` treatment, and reduced-motion behavior.

- [ ] **Step 6: Commit hardening and verification fixes**

```bash
git add app/Http/Controllers/AccessibilityAtlasContributionController.php resources/views/accessibility-atlas/contribute.blade.php tests/Feature/AccessibilityAtlasContributionTest.php
git commit -m "test: harden accessibility atlas submissions"
```
