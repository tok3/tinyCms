'use strict';

const path = require('node:path');
const fs = require('node:fs');
const os = require('node:os');
const load = name => require(process.env.A11Y_NODE_MODULES_PATH
    ? path.join(process.env.A11Y_NODE_MODULES_PATH, name) : name);
const puppeteer = load('puppeteer');
const axe = load('axe-core');

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
    const scratch = fs.mkdtempSync(path.join(os.tmpdir(), 'axe-profile-'));
    let browser;
    try {
        browser = await puppeteer.launch({ executablePath, args, headless: true,
            env: { ...process.env, XDG_CONFIG_HOME: path.join(scratch, 'config'),
                XDG_CACHE_HOME: path.join(scratch, 'cache') },
        });
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
        try {
            if (browser) await browser.close();
        } finally {
            fs.rmSync(scratch, { recursive: true, force: true });
        }
    }
}

main().catch(error => {
    process.stderr.write(`${error.message}\n`);
    process.exitCode = 1;
});
