import puppeteer from 'puppeteer';

(async () => {
    const url = 'https://www.breuberg.de/';
    const cookieSelector = '.cookie-consent-form__save-button'; // Cookie-Banner-Button

    // Starte den Browser
    const browser = await puppeteer.launch({
        headless: true, // Headless-Modus
        args: ['--no-sandbox', '--disable-setuid-sandbox'] // Wichtig für Server-Umgebungen
    });

    const page = await browser.newPage();

    // Cookies löschen, damit der Banner sicher erscheint
    await page.deleteCookie(...(await page.cookies()));

    console.log(`🔍 Öffne ${url}...`);
    await page.goto(url, { waitUntil: 'networkidle2' });

    // Versuche den Cookie-Banner zu akzeptieren
    try {
        await page.waitForSelector(cookieSelector, { timeout: 5000 });
        await page.click(cookieSelector);
        console.log(`✅ Cookie-Banner akzeptiert.`);
    } catch (error) {
        console.log(`⚠️ Kein Cookie-Banner gefunden.`);
    }

    // Warte 2 Sekunden, damit die Seite sich anpasst
    await page.waitForTimeout(2000);

    // Browser schließen
    await browser.close();
    console.log(`🚀 Fertig, Cookies akzeptiert!`);
})();
