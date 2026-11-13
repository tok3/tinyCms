# Browserumstellung am 13.11.2026

Die Accessibility-Scanner verwenden jetzt eine getrennte, fest versionierte Laufzeit:
Chrome for Testing 157.0.8103.50, Puppeteer 25.17.0 und Pa11y 10.0.0 unter
`/opt/akb/browser-runtimes/chrome157-2026-11-13`.
Der direkte WCAG-2.2-Teil bleibt bei axe-core 4.10.2; Pa11y 10 bringt axe-core 4.13.0 mit.
Daher können sich Pa11y-Befunde gegenüber Pa11y 8 ändern, ohne dass die Kundenseite
geändert wurde. Siehe [Kundenvergleich](browser-customer-test-2026-11-13.md).

## Konfiguration

Produktive `.env`-Werte (keine Zugangsdaten):

```dotenv
A11Y_NODE_MODULES_PATH=/opt/akb/browser-runtimes/chrome157-2026-11-13/node_modules
A11Y_PA11Y_BINARY=/opt/akb/browser-runtimes/chrome157-2026-11-13/node_modules/.bin/pa11y
A11Y_BROWSER_PATH=/opt/akb/browser-runtimes/chrome157-2026-11-13/browsers/chrome/linux-157.0.8103.50/chrome-linux64/chrome
A11Y_BROWSER_TLS_OPTION=acceptInsecureCerts
```

Für lokale Entwicklung mit der alten Kombination die ersten beiden Variablen
weglassen, den vorhandenen lokalen Browserpfad verwenden und setzen:

```dotenv
A11Y_BROWSER_TLS_OPTION=ignoreHTTPSErrors
```

Das ist auch der Code-Default. `pa11y` wird dann über PATH und Puppeteer/axe aus den
bisherigen Projekt-`node_modules` geladen. Die Frontend-Abhängigkeiten bleiben unabhängig.
Für die neue lokale Kombination kann `npm ci --prefix tools/accessibility-scanner`
verwendet werden; Node >=22.13 ist erforderlich. Anschließend die drei Pfade passend
zur lokalen Installation setzen. Puppeteers Browserpfad lässt sich mit
`node -e "console.log(require('puppeteer').executablePath())"` nicht versionsübergreifend
synchron bestimmen; bei Puppeteer 25 stattdessen im installierten Werkzeugverzeichnis:

```sh
node --input-type=module -e "import puppeteer from 'puppeteer'; console.log(await puppeteer.executablePath())"
```

Die Option betrifft das Akzeptieren ungültiger HTTPS-Zertifikate, keine TLS-Protokollversion.
Nur die bisherigen Pa11y/axe-Runner von WCAG 2.1/2.2 behalten ihre bestehende Ausnahme.
Direkte axe-, WCAG-2.0-HTMLCS- und öffentliche Diagnosescans behalten Zertifikatsprüfung bei.
Ungültige Optionsnamen werden abgewiesen. Hintergrund:
[Puppeteer-Umbenennung](https://github.com/puppeteer/puppeteer/issues/12341).

Chrome erhält je Scan eigene temporäre XDG-Verzeichnisse, damit auch `www-data`
Crashpad starten kann, ohne ein beschreibbares Home-Verzeichnis zu benötigen.
Die Verzeichnisse werden nach dem Scan entfernt. Snapshot-Signaturen berücksichtigen
Laufzeitpfade, Browseroptionen und das jeweilige Lockfile; alte Ergebnisse werden nach
der Umstellung nicht als unveränderte Scans wiederverwendet.

## Installation und Betrieb

Die exakten Node-Abhängigkeiten sind in `tools/accessibility-scanner/package-lock.json`
festgeschrieben. Eine neue Laufzeit immer in einem neuen Verzeichnis installieren,
beispielsweise mit `PUPPETEER_CACHE_DIR=<runtime>/browsers npm ci --prefix <runtime>`
nach Kopieren der beiden Paketdateien. Der Browserdownload gehört zur Installation.
Dann gezielt testen und erst danach `.env` auf die neuen Pfade umstellen.
Die produktive Installation wurde aus der bereits getesteten Installation übernommen,
root gehört sie; `www-data` hat nur Lese-/Ausführungsrechte.

Nach Konfigurationsänderungen gegebenenfalls Laravel-Konfigurationscache erneuern und
`php artisan queue:restart` ausführen; laufende Jobs dürfen fertiglaufen. Apache wurde
bei dieser Umstellung zusätzlich sanft neu geladen. Es gab keinen Konfigurationscache.
Die vorherige `.env` liegt zugriffsgeschützt im Unterverzeichnis `deployment-private`
der neuen Laufzeit. Sie enthält Geheimnisse und gehört nicht ins Repository.

Der systemweite Chrome 153 und die alten Node-Pakete bleiben als Rückfall erhalten.
Andere Browsernutzer wie QR-PDF/Browsershot sind von dieser gezielten Scannerumstellung
nicht automatisch erfasst. APT aktualisiert diese getrennte Chrome-for-Testing-Laufzeit
nicht; weitere Browserupdates benötigen erneut Installation und Tests.
Der vorhandene APT-Hold auf systemweitem Chrome bleibt bestehen.

## Validierung

- Konfigurationstests für alte/neue TLS-Option, Ablehnung ungültiger Werte sowie
  Verzeichnisisolation und Aufräumen bei den zertifikatsprüfenden Scans.
- Acht Kunden-Startseiten über die echten PHP-Scanmethoden als `www-data`, zunächst mit
  expliziter neuer Konfiguration und anschließend mit der geladenen Produktionskonfiguration.
- Lokaler HTTPS-Test mit selbstsigniertem Zertifikat: alte Kombination/alte Option OK;
  neue Kombination/alte Option erwartungsgemäß Zertifikatsfehler; neue Kombination/neue Option OK.
- Vollständiger `ScanAccessibilityJob` für WCAG 2.0, 2.1 und 2.2 mit echten
  Browseraufrufen und isolierter SQLite-Datenbank: Statistiken, Befunde und
  abgeschlossene Snapshots vorhanden. Öffentlicher Diagnosebefehl und älterer
  WCAG-2.1-Befehl ebenfalls erfolgreich.
- Lokaler Rückfalltest über die echten PHP-Methoden: Chrome 153, Puppeteer 22 und
  Pa11y 8 erfolgreich, Plauen 58 Pa11y-Befunde gegenüber 66 mit Pa11y 10.
- Bestehender Speichertest: 64 Kombinationen aus Vergleichsdaten und WCAG-Standard,
  einschließlich Statistiken, Kontrastfilter und Behandlung fehlgeschlagener Teilscans.
  SQLite nur in-memory, kein Zugriff auf Produktionsdatenbank.

Die [vorherige Laufzeit wurde separat gesichert und getestet](browser-rollback-snapshot-2026-11-13.md).
Für den Rückfall die vorherigen Pfade und `ignoreHTTPSErrors` wiederherstellen,
Konfigurationscache gegebenenfalls erneuern und Worker sanft neu starten.
