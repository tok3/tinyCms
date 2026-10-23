const assert = require('node:assert/strict');
const fs = require('node:fs');
const path = require('node:path');
const test = require('node:test');
const puppeteer = require('puppeteer');

const badgeScript = fs.readFileSync(
    path.resolve(__dirname, '../../public/js/inclucert-badge.js'),
    'utf8',
);

test('compact panel stays inside the nearest clipping container', async () => {
    const browser = await puppeteer.launch({ headless: true });

    try {
        const page = await browser.newPage();
        await page.setViewport({ width: 840, height: 320 });
        await page.setRequestInterception(true);
        page.on('request', request => {
            const url = request.url();

            if (url === 'https://badge.test/') {
                request.respond({
                    contentType: 'text/html',
                    body: `<!doctype html>
                        <html>
                        <head><meta charset="utf-8"></head>
                        <body style="margin:0">
                            <div class="clip" style="position:absolute;inset:20px 40px 20px;height:280px;overflow:hidden">
                                <div style="position:absolute;left:100px;top:205px">
                                    <inclucert-badge data-ulid="01TEST" data-appearance="compact"></inclucert-badge>
                                </div>
                            </div>
                            <script src="https://badge.test/inclucert-badge.js"></script>
                        </body>
                        </html>`,
                });
                return;
            }

            if (url === 'https://badge.test/inclucert-badge.js') {
                request.respond({ contentType: 'application/javascript', body: badgeScript });
                return;
            }

            if (url === 'https://badge.test/assets/img/produkte/inclu-cert-shield.svg') {
                request.respond({
                    contentType: 'image/svg+xml',
                    body: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 1 22 5v7c0 6-4 10-10 11C6 22 2 18 2 12V5z"/></svg>',
                });
                return;
            }

            if (url === 'https://badge.test/api/inclucert/01TEST') {
                request.respond({
                    contentType: 'application/json',
                    body: JSON.stringify({
                        status: 'active',
                        score: 66,
                        qr: 'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg"/>',
                        trend_label: 'verbessert',
                        trend: 26,
                        last_scan: '23.10.2026',
                        wcagStd: '2.1',
                        monitoring_status: 'active',
                        url: 'https://badge.test/nachweis',
                    }),
                });
                return;
            }

            if (url.endsWith('/visit')) {
                request.respond({ contentType: 'application/json', body: '{}' });
                return;
            }

            request.abort();
        });

        await page.goto('https://badge.test/', { waitUntil: 'networkidle0' });
        await page.waitForSelector('.akb-anchor');
        await page.click('.akb-strip .akb-toggle');
        await new Promise(resolve => setTimeout(resolve, 450));

        const geometry = await page.evaluate(() => {
            const clip = document.querySelector('.clip').getBoundingClientRect();
            const panel = document.querySelector('.akb-panel').getBoundingClientRect();

            return {
                clip: { top: clip.top, bottom: clip.bottom },
                panel: { top: panel.top, bottom: panel.bottom },
            };
        });

        assert.ok(
            geometry.panel.top >= geometry.clip.top + 12,
            `Panel beginnt ${geometry.clip.top + 12 - geometry.panel.top}px oberhalb des sicheren Bereichs`,
        );
        assert.ok(
            geometry.panel.bottom <= geometry.clip.bottom - 12,
            `Panel ragt ${geometry.panel.bottom - (geometry.clip.bottom - 12)}px unter den sicheren Bereich`,
        );
    } finally {
        await browser.close();
    }
});
