import puppeteer from 'puppeteer';
import { exec } from 'child_process';

(async () => {
    const browser = await puppeteer.launch({ headless: true });
    const page = await browser.newPage();

    // Gehe zur Webseite
    await page.goto('https://www.breuberg.de/', { waitUntil: 'networkidle2' });

    // Falls Cookie-Banner existiert, klicke auf den Akzeptieren-Button
    try {
        await page.waitForSelector('.cookie-consent-form__save-button', { timeout: 5000 });
        await page.click('.cookie-consent-form__save-button');
        console.log("✅ Cookie-Banner akzeptiert.");
    } catch (error) {
        console.log("⚠️ Kein Cookie-Banner gefunden.");
    }

    // Alternativer Timeout-Fix
    await new Promise(resolve => setTimeout(resolve, 2000));

    // Schließe den Browser
    await browser.close();

    // Starte Pa11y-Scan
    exec('/opt/homebrew/bin/pa11y https://www.breuberg.de/ --runner axe --reporter json', (error, stdout, stderr) => {
        if (error) {
            console.error(`❌ Fehler bei Pa11y: ${error.message}`);
            return;
        }
        if (stderr) {
            console.error(`⚠️ Warnung: ${stderr}`);
            return;
        }
        console.log(stdout);
    });

})();
