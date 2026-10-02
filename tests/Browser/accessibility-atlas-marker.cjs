const assert = require('node:assert/strict');
const puppeteer = require('puppeteer');

const pageUrl = process.env.ATLAS_PAGE_URL
    || 'http://127.0.0.1:8012/barrierefreiheitsatlas/beitrag';

async function measureAlignment(page, viewport) {
    await page.setViewport(viewport);
    await page.goto(pageUrl, { waitUntil: 'networkidle0' });
    await page.waitForFunction(() => {
        const signet = document.querySelector('.accessibility-atlas-marker__signet');

        return signet?.complete && signet.naturalWidth > 0;
    });

    return page.evaluate(() => {
        const emblem = document.querySelector('.accessibility-atlas-marker__emblem');
        const signet = document.querySelector('.accessibility-atlas-marker__signet');
        const caption = document.querySelector('.accessibility-atlas-marker strong');

        return {
            branchBottom: emblem.offsetTop + signet.offsetTop + signet.offsetHeight,
            captionTop: caption.offsetTop,
        };
    });
}

(async () => {
    const browser = await puppeteer.launch({ headless: true });

    try {
        for (const viewport of [
            { width: 1440, height: 900 },
            { width: 439, height: 811 },
        ]) {
            const page = await browser.newPage();
            const geometry = await measureAlignment(page, viewport);
            const gap = geometry.captionTop - geometry.branchBottom;

            assert.ok(
                gap >= 0 && gap <= 5,
                `${viewport.width}px: Zweigenden und Textoberkante liegen ${Math.abs(gap)}px auseinander`,
            );

            await page.close();
        }
    } finally {
        await browser.close();
    }
})();
