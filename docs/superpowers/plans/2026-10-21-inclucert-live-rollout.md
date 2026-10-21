# IncluCert Isolated Live Rollout Plan

**Goal:** Publish only the new IncluCert product page without changing existing product, pricing, checkout, or customer behavior.

**Architecture:** Add the reusable IncluCert CMS block and the conflict-safe single-page import command. Transfer the reviewed page snapshot as an unpublished CMS page, verify it in production, then publish it deliberately. Navigation and other rewritten pages stay outside this release.

**Tech Stack:** Laravel, Filament, Blade, SCSS/Vite, PHPUnit.

---

### Task 1: Isolate the required CMS infrastructure

**Files:**
- Add: `app/Console/Commands/{DiffCmsPage,ExportCmsPage,ImportCmsPage}.php`
- Add: `app/Services/CmsPageTransferService.php`
- Add: `app/Support/CmsPage*.php`
- Modify: `app/Models/Page.php`
- Tests: `tests/Feature/CmsPageTransfer*.php`, `tests/Unit/CmsPageSnapshotTest.php`

1. Bring over only the conflict-safe single-page transfer implementation.
2. Run the focused transfer tests.

### Task 2: Add the IncluCert page block and final page snapshot

**Files:**
- Modify: `app/Filament/Resources/Admin/PageResource.php`
- Modify: `resources/scss/custom/components/_components.scss`
- Add: `resources/scss/custom/components/_inclucert-presentation.scss`
- Add: `resources/views/components/inclucert-presentation.blade.php`
- Add: `resources/views/content-sections/inclucert-teaser.blade.php`
- Modify: `public/js/inclucert-badge.js`
- Add: `public/assets/img/produkte/inclucert-badge-backend.png`
- Add: `content/pages/bfd71c27-dc08-41f3-bf54-d2b25bff7e56-inclucert.json`
- Tests: `tests/Feature/IncluCertCmsBlockTest.php`, `tests/Feature/IncluCertProductPageTest.php`

1. Transfer the reviewed component and page content.
2. Keep the snapshot unpublished.
3. Verify one H1, safe links, responsive presentation, and the badge theme variants.

### Task 3: Release verification

1. Run focused PHPUnit tests for the transfer, CMS block, and product page.
2. Run the commercial safety test to prove pricing and checkout configuration are unchanged.
3. Run `npm run build`.
4. Inspect the final diff against `origin/main`; it must contain no other public-page rewrite or navigation migration.

### Task 4: Production handoff

1. Merge the isolated release only after all checks pass.
2. On production, pull and build assets.
3. Preview the page import first; create it unpublished.
4. Review the authenticated preview in wide, mobile, light, and dark views.
5. Ask for the final publish confirmation, then publish and verify `/produkte/inclucert` publicly.
