# WCAG-2.2-Scanner

Der Command `scan:accessibility-22 --standard=22` kombiniert weiterhin den
Pa11y-Scan mit einer Prüfung der zusätzlichen `wcag22aa`-Regeln. Diese führt
`scripts/scan-wcag22.cjs` mit den Projektabhängigkeiten Puppeteer und axe-core
aus. Das globale `axe-cli` und ChromeDriver werden dafür nicht mehr benötigt.

Der Browser wird über `config/accessibility_scan.php` beziehungsweise
`A11Y_BROWSER_PATH` gewählt. `AXE_CHROME_OPTIONS` überschreibt bei Bedarf die
Browserargumente des zusätzlichen Scans. Puppeteer nutzt ein temporäres Profil.
Der PHP-Aufruf begrenzt die Laufzeit auf 180 Sekunden und verarbeitet stdout
als JSON; Prozessfehler führen zu einem fehlgeschlagenen Teilscan. Ein
fehlgeschlagener Teilscan wird nicht als vollständiges WCAG-2.2-Ergebnis gewertet.

Die in `package.json` und `package-lock.json` festgehaltenen Node-Abhängigkeiten
müssen auf dem Zielserver installiert sein. Laufende Queue-Worker übernehmen
PHP-Änderungen erst beim nächsten Prozessstart; der eingerichtete automatische
Workerwechsel oder ein kontrollierter, schonender Queue-Neustart übernimmt sie.

Am 11.09.2026 geprüft mit Chrome 150.0.7871.114, Puppeteer 22.15.0 und
axe-core 4.10.2 unter `www-data` in der Worker-Umgebung:

- Öffentliche Startseite: zusätzliche WCAG-2.2-Prüfung erfolgreich.
- Testseite mit zwei zu kleinen Schaltflächen: beide `target-size`-Verstöße erkannt.
- Ergebnistests: getrennte DOM-Ziele, verschachtelte Ziele und leere Ergebnisse.

Gezielter Test: `php vendor/bin/pest tests/Unit/Wcag22ResultsTest.php`.
Die zusätzlichen automatisierten Prüfungen decken nicht alle WCAG-Anforderungen ab.
