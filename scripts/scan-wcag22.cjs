'use strict';

const puppeteer = require('puppeteer');
const axe = require('axe-core');

async function main() {
    const [url, executablePath, argsJson = '[]'] = process.argv.slice(2);
    if (!url || !executablePath) {
        throw new Error('Usage: node scan-wcag22.cjs URL CHROME_PATH ARGS_JSON');
    }
    const args = JSON.parse(argsJson);
    if (!Array.isArray(args) || args.some(arg => typeof arg !== 'string')) {
        throw new Error('Chrome arguments must be an array of strings.');
    }
    if (axe.getRules(['wcag22aa']).length === 0) {
        throw new Error('Installed axe-core has no WCAG 2.2 AA rules.');
    }

    // Puppeteer creates and removes a separate temporary browser profile.
    const browser = await puppeteer.launch({ executablePath, args, headless: true });
    try {
        const page = await browser.newPage();
        page.setDefaultNavigationTimeout(60000);
        await page.goto(url, { waitUntil: 'networkidle2' });
        await page.addScriptTag({ content: axe.source });
        const results = await page.evaluate(async () => {
            return window.axe.run(document, {
                runOnly: { type: 'tag', values: ['wcag22aa'] },
            });
        });
        process.stdout.write(JSON.stringify(results));
    } finally {
        await browser.close();
    }
}

main().catch(error => {
    process.stderr.write(`${error.message}\n`);
    process.exitCode = 1;
});
