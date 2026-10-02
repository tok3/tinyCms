const assert = require('node:assert/strict');
const puppeteer = require('puppeteer');

const pageUrl = process.env.ATLAS_PAGE_URL
    || 'http://127.0.0.1:8012/barrierefreiheitsatlas/beitrag';

(async () => {
    const browser = await puppeteer.launch({ headless: true });

    try {
        for (const viewport of [
            { width: 1440, height: 900 },
            { width: 439, height: 811 },
        ]) {
            const page = await browser.newPage();
            await page.setViewport(viewport);
            await page.goto(pageUrl, { waitUntil: 'networkidle0' });

            const result = await page.evaluate(() => {
                const marker = document.querySelector('.accessibility-atlas-marker');
                const matrix = new DOMMatrixReadOnly(getComputedStyle(marker).transform);

                return {
                    angle: Math.round(Math.atan2(matrix.b, matrix.a) * 180 / Math.PI),
                    hasHorizontalOverflow:
                        document.documentElement.scrollWidth > document.documentElement.clientWidth,
                };
            });

            assert.equal(result.angle, 25, `${viewport.width}px: Das Signet ist nicht um 25° gedreht`);
            assert.equal(
                result.hasHorizontalOverflow,
                false,
                `${viewport.width}px: Die Drehung erzeugt horizontalen Überlauf`,
            );

            await page.close();
        }
    } finally {
        await browser.close();
    }
})();
