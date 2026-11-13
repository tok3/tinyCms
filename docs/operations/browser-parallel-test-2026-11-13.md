# Parallel browser evaluation, 2026-11-13

> Historischer Testbericht vor der Umstellung. Die anschließende Produktionsumstellung
> ist unter [Browserumstellung](browser-migration-2026-11-13.md) dokumentiert.

No production package, browser path, worker configuration or database scan records changed.

Isolated installation: `/tmp/akb-browser-eval-2026-11-13` (temporary; not a deployment).
Pinned dependencies and lockfile are in that directory:
- Puppeteer 25.17.0
- Chrome for Testing 157.0.8103.50
- Pa11y 10.0.0 (its own axe dependency)
- axe-core 4.10.2 at the top level, matching the production WCAG 2.2 script.
- Node.js 22.23.5

Tests run sequentially as www-data with nice 10, temporary browser profiles and
XDG directories, using the existing launch flags including --no-sandbox.

## Results

Local HTTP fixture with delayed JavaScript, intentionally unlabeled image/button:

| Combination | JavaScript | axe expected rules | Pa11y | PDF |
| --- | --- | --- | --- | --- |
| Puppeteer 22.15 / Chrome 153 / Pa11y 8 | pass | image-alt, button-name | 2 issues | 16181 bytes |
| Puppeteer 22.15 / Chrome 157 / Pa11y 8 | pass | image-alt, button-name | 2 issues | 16181 bytes |
| Puppeteer 25.17 / Chrome 157 / Pa11y 10 | pass | image-alt, button-name | 2 issues | 16181 bytes |

Unmodified copy of scripts/scan-wcag22.cjs executed successfully against the
fixture with the new dependencies. Both old and new combinations also scanned
https://aktion-barrierefrei.org/ successfully, producing no violations for the
script's existing wcag22aa-only selection. This does not assert that the page is
fully accessible. Durations were 2.54 and 2.75 seconds; single runs are not a
performance benchmark.

The evaluation harness needs await puppeteer.executablePath() with Puppeteer 25.
The production script already receives an explicit browser path and needed no edit.
An initial CLI timeout was caused by the harness blocking its local HTTP server
with spawnSync; replacing it with asynchronous execFile resolved it.

Afterward Apache, MariaDB, Supervisor and all five workers remained active with
unchanged worker PIDs. google-chrome-stable remains held.

## Limits before deployment

These are smoke tests, not a complete worker/queue or customer-site regression.
Representative real customer pages, production Pa11y CLI options/report formats,
PDF rendering and repeated scans/resource usage still need checking. The full
production sandbox/security configuration has not been changed or validated as
part of this compatibility test. Do not switch production paths based on these
smoke tests alone.
