# Sicherheitsprüfung der Abhängigkeiten — 8. September 2026

## Auftrag und Grenzen

Erfassung bekannter Schwachstellen, Abgleich mit den tatsächlich installierten
Produktionspaketen und Priorisierung. Keine Updates, Installationen, Änderungen
an Anwendung oder Konfiguration, Exploit-Tests oder Deployments durchgeführt.

Die ursprünglichen 209 Dependabot-Alerts konnten **nicht einzeln abgerufen**
werden: kein authentifizierter GitHub-API-Zugang vorhanden, API antwortet mit
HTTP 401. Git-Zugriff über SSH ersetzt diese Berechtigung nicht. Daher ist Punkt 1
nur durch eine unabhängige Paketprüfung abgedeckt; die genaue Zuordnung aller
209 GitHub-Alerts bleibt offen. Dafür wird ein authentifizierter lesender Zugriff
oder ein Export der offenen Alerts benötigt. Keine Tokens in Chat oder Git ablegen.

Paketversionen wurden lokal geprüft; aktuelle Advisory-Daten stammen aus
Composer/Packagist und npm. Die Priorität beschreibt die Relevanz für diese
Anwendung, nicht allein den vom Advisory vergebenen Schweregrad. Eine passende
Paketversion belegt noch keinen ausnutzbaren Aufrufpfad.

## Ergebnisübersicht

| Geprüfter Bestand | Ergebnis | Bedeutung |
| --- | --- | --- |
| Installierte PHP-Pakete | 37 Advisory-Einträge für 8 Laufzeitpakete: 16 hoch, 18 mittel, 2 niedrig, 1 ohne Schweregrad | Kein als kritisch markierter Eintrag. Die Laravel-E-Mail-Lücke ist doppelt enthalten; insgesamt 36 verschiedene GHSA-IDs. |
| Eingechecktes `composer.lock` | 62 Einträge: 1 kritisch, 18 hoch, 34 mittel, 8 niedrig, 1 ohne Schweregrad | 61 verschiedene GHSA-IDs; der Git-Lockstand ist älter als der installierte PHP-Bestand. |
| Tatsächlich installierter npm-Bestand | 27 betroffene Paketpositionen: 2 kritisch, 19 hoch, 5 mittel, 1 niedrig | Enthält direkte und durch Abhängigkeiten weitergegebene Meldungen; 89 unterschiedliche direkte Advisory-URLs. |
| Root-`package-lock.json` | 17 betroffene Paketpositionen: 0 kritisch, 15 hoch, 1 mittel, 1 niedrig | Beschreibt nicht den tatsächlichen installierten npm-Bestand. |
| `public/js/jquery-smartwizard/package-lock.json` | 91 betroffene Paketpositionen: 15 kritisch, 50 hoch, 21 mittel, 5 niedrig | Alter separater Entwicklungsbaum; zugehöriges `node_modules` ist auf Produktion nicht vorhanden. |

Die Zahlen sind **nicht addierbar** und nicht mit den 209 GitHub-Alerts
gleichzusetzen: Composer zählt Advisory-Einträge, npm auch abhängige Pakete;
verschiedene Lockfiles und Bestände überlappen. Der npm-Bestandsaudit wurde aus
`node_modules/.package-lock.json` in einem temporären Verzeichnis aufgebaut.
Alle 269 dort verzeichneten Paketversionen wurden gegen ihre tatsächlichen
`package.json`-Dateien geprüft, ohne Abweichung. Die dafür synthetisch erzeugte
Root-Manifestdatei dient nur dem Audit; deren prod/dev-Metadaten sind keine
belastbare Klassifizierung der Anwendungsnutzung.

## Priorisierung für die anschließende Bearbeitung

### Priorität 1: öffentlich genutzte Funktionen und reproduzierbarer Paketbestand

**Laravel 10.50.2 — E-Mail-Validierung, hohe Einstufung.**
Die betroffene Standardregel `email` wird unter anderem in Registrierung,
Passwort-Zurücksetzung und `ContactController::send` verwendet. Im Kontaktformular
wird die eingegebene Adresse anschließend als Absender genutzt. Damit sind
relevante Eingangspfade vorhanden. Die konkrete Ausnutzbarkeit hängt zusätzlich
von Mailer, Mime-Verarbeitung und Mailtransport ab; sie wurde nicht aktiv getestet.
Quelle: [GHSA-5vg9-5847-vvmq](https://github.com/laravel/framework/security/advisories/GHSA-5vg9-5847-vvmq).

**Guzzle 7.12.1 / PSR-7 2.12.1 — externe URL-Abrufe.**
Guzzle wird über Laravels HTTP-Client tatsächlich verwendet, beispielsweise in
`AccessibilityFingerprintService::captureForUrl` und `DemoUrlDiscoveryService`.
Die aktuelle Guzzle-Version ist laut Advisory von der Umgehung bestimmter
Hostprüfungen betroffen. Extern beeinflusste Ziel-URLs machen diesen Bereich
relevant; eine konkrete Umgehung vorhandener Schutzmaßnahmen wurde nicht getestet.
Ein Paketupdate allein ersetzt keine Prüfung von Zieladressen und Redirects.
Quelle: [GHSA-v5mv-p594-2x33](https://github.com/advisories/GHSA-v5mv-p594-2x33).

**Abweichende Paketstände — hohe betriebliche Priorität.**
Der installierte PHP-Bestand stimmt vollständig mit dem lokal geänderten
`composer.lock` überein, aber zahlreiche Versionen weichen vom eingecheckten
Lockfile ab. Bei npm ist der installierte Bestand vielfach älter als das
eingecheckte Lockfile. Dadurch können GitHub-Warnungen sowohl bereits behobene
Probleme anzeigen als auch Probleme des tatsächlich laufenden Bestands nicht
abbilden. Vor späteren Updates muss der gewünschte, getestete Sollstand eindeutig
festgelegt werden. In dieser Prüfung wurden keine Lockfiles geändert.

| Paket | Git-/Root-Lockstand | Installiert |
| --- | --- | --- |
| phpoffice/phpspreadsheet | 1.30.4 | 1.30.5 |
| guzzlehttp/guzzle | 7.10.0 | 7.12.1 |
| livewire/livewire | 3.8.0 | 3.8.1 |
| axios | 1.13.6 | 1.7.9 |
| basic-ftp | 5.2.0 | 5.0.5 |
| form-data | 4.0.5 | 4.0.0 |
| vite | 6.4.1 | 5.4.11 |

### Priorität 2: betroffene Laufzeitpakete mit bedingter oder ungeklärter Erreichbarkeit

**form-data 4.0.0 — kritisch, Version bestätigt.**
Vorhersagbare Multipart-Grenzen können zusätzliche Parameter in ausgehende
Anfragen einschleusen, wenn Angreifer passende Zufallswerte beobachten und
Feldinhalte beeinflussen können. Das Paket ist eine Axios-Abhängigkeit. Im
untersuchten Anwendungscode wurde Axios vor allem in `resources/js/bootstrap.js`
für den Browser gefunden. Ein serverseitiger Node-Multipart-Aufruf mit den
nötigen Voraussetzungen wurde nicht nachgewiesen. Der kritische Versionsbefund
ist echt, ein ausnutzbarer Live-Endpunkt aber nicht belegt.
Quelle: [GHSA-fjxv-7rqg-78g4](https://github.com/advisories/GHSA-fjxv-7rqg-78g4).

**basic-ftp 5.0.5 — kritisch, Version bestätigt.**
Die kritische Lücke betrifft `downloadToDir()` gegen einen bösartigen FTP-Server.
Die installierte Abhängigkeitskette enthält `proxy-agent` → `pac-proxy-agent` →
`get-uri` → `basic-ftp`. Der geprüfte `get-uri`-Code verwendet `downloadTo()` in
einen Stream, nicht die betroffene Verzeichnisdownload-Methode. Im Anwendungscode
wurde kein `downloadToDir()`-Aufruf gefunden. Weitere hohe FTP-Advisories betreffen
andere Methoden; der kritische Befund darf daher weder als bestätigter
Remote-Angriffspfad noch als generelle Entwarnung gelesen werden.
Quelle: [GHSA-5rq4-664w-9x2c](https://github.com/advisories/GHSA-5rq4-664w-9x2c).

**Browsershot 4.4.0 — drei hohe und drei mittlere Einträge.**
Enthält Meldungen zu SSRF, Pfadmanipulation und lokalen Dateien. Ein
`Browsershot::url()`-Aufruf ist in `QrPromoHelper::colorsFromScreenshot` vorhanden.
Der Screenshot-Modus ist standardmäßig deaktiviert; ein Anwendungscall zur
Aktivierung wurde in der statischen Suche nicht gefunden. Die Bibliothek ist
betroffen, die konkrete Erreichbarkeit dieses Pfades bleibt ungeklärt.
Quellen: [SSRF](https://github.com/advisories/GHSA-qw64-6vcc-8ghx),
[Pfadmanipulation](https://github.com/advisories/GHSA-j2gw-r24m-j2qw).

**CommonMark 2.8.2 — acht hohe und zwei mittlere Einträge.**
DoS-/XSS-Meldungen betreffen unterschiedliche Parserfunktionen und Erweiterungen.
Die Bibliothek ist eine Laufzeitabhängigkeit. Eine direkte Verwendung der
betroffenen Erweiterungen auf frei eingegebenem Markdown wurde in `app/` nicht
gefunden; Framework-/Filament-Verwendung benötigt vor einer Risikofreigabe eine
gezielte Prüfung. Einzelne Advisory-Links stehen in der PHP-Inventarliste.

**PHPSpreadsheet 1.30.5 — drei hohe Einträge bleiben offen.**
Die kritische [GHSA-87m4-826x-3crx](https://github.com/advisories/GHSA-87m4-826x-3crx)
des Git-Stands 1.30.4 ist laut Advisory ab 1.30.5 behoben und trifft auf den
installierten Bestand nicht mehr zu. Andere hohe Meldungen betreffen XLS/OLE,
Gnumeric-Dekompression und `WEBSERVICE()`-Redirects. Im Projekt wurde Excel-Export
gefunden, aber kein direkter Import fremder Tabellen oder `WEBSERVICE()`-Aufruf.
Die verbliebenen Meldungen sind daher gesondert zu bewerten.

**Weitere aktive Pakete.**
Dompdf 2.0.8 wird für PDFs verwendet (sechs mittlere/niedrige Einträge), Livewire
3.8.1 für die Oberfläche (ein mittlerer XSS-Eintrag). Bei npm sind unter anderem
Axios, Puppeteer 22.15.0, `ws` und Archiv-/Proxy-Abhängigkeiten betroffen.
Puppeteer wird in Repository-Skripten importiert. Auswirkungen hängen je nach
Advisory von Browser-, Netzwerk-, Proxy-, Download- oder Build-Nutzung ab.
Die vollständigen Paketpositionen und Advisory-Verknüpfungen sind als CSV/JSON
beigefügt; es wurde kein vollständiger dynamischer Datenflussnachweis durchgeführt.

### Priorität 3: historische Entwicklungsabhängigkeiten und Build-Werkzeuge

Der separate SmartWizard-Lockstand enthält viele kritische Meldungen, darunter
Babel, Handlebars, Lodash, Bower und shell-quote. Sein npm-Paketbaum ist auf dem
Server nicht installiert. Die Bibliotheksdateien unter `public/` sind davon zu
unterscheiden: ein ausgeliefertes jQuery-Plugin führt nicht automatisch seine
alten npm-Build-Werkzeuge auf dem Webserver aus. Die Altdateien sind dennoch vor
einem späteren Neuaufbau zu bereinigen beziehungsweise zu aktualisieren.

Vite ist tatsächlich installiert, aber bei der Prozess-/Portprüfung lief kein
Vite-Entwicklungsserver. Mehrere Vite-Advisories betreffen genau diesen Server,
einige zusätzlich nur Windows. Ihre unmittelbare Relevanz für die aktuelle
Linux-Auslieferung ist damit geringer; Build-/Entwicklungsrisiken bleiben.

## Nicht vollständig abgedeckte Bestände

- `node_modules Kopie/.package-lock.json` und alle dort gefundenen
  `package.json`-Dateien sind leer. Daraus kann kein gültiger Paketbestand
  rekonstruiert werden. Diese Dateien nicht als installierte Bibliotheken zählen.
- FlipClock und eine manuell abgelegte PHPMailer-Version 6.8.0 liegen außerhalb
  der zentralen Lockfiles. Sie sind nicht vollständig von den obigen Audits
  abgedeckt. Der alte `send_mail.php` verweist zudem auf einen nicht vorhandenen
  PHPMailer-Unterpfad; kein Aufruf wurde ausgeführt.
- Ein separater Node-Crawler unter `/home/admintfc/crawler` läuft auf Port 4000.
  Sein eigener Paketbestand gehört nicht zum untersuchten Repository und wurde
  nicht als durch den Root-npm-Audit abgedeckt behandelt.
- Betriebssystem-, PHP-/Node-Laufzeit- und Chromium-Schwachstellen sowie ein
  vollständiger Anwendungsaudit sind nicht Teil dieser Paketprüfung.

## Belege und nächste Entscheidung

- [Rohdaten der fünf erfolgreichen Audits](dependency-audit-2026-09-08-evidence.json)
- [PHP-Advisories mit Git- und Istversion](dependency-audit-2026-09-08-php.csv)
- [npm-Pakete mit tatsächlichen Versionen und Advisory-Links](dependency-audit-2026-09-08-npm.csv)
- [Abweichungen der Paketstände](dependency-audit-2026-09-08-version-drift.csv)

Der genaue Abschluss der GitHub-Erfassung benötigt noch lesenden Zugang zu den
privaten Dependabot-Alerts oder deren Export. Die vorhandenen Befunde reichen
bereits für die oben aufgeführte vorläufige Priorisierung. Punkt 4 — Änderungen
und getestete Updates — wurde ausdrücklich nicht begonnen.
