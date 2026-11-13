# Kundenvergleich der Browserkombinationen, 13.11.2026

> Historischer Testbericht vor der Umstellung. Die anschließende Produktionsumstellung
> ist unter [Browserumstellung](browser-migration-2026-11-13.md) dokumentiert.

## Ergebnis

Alle acht ausgewählten Kunden-Startseiten wurden mit beiden Kombinationen erfolgreich
geprüft. Beim direkten Browservergleich mit unverändertem axe-core 4.10.2 stimmen
Regel-IDs und betroffene Elemente auf allen acht Seiten exakt überein, sowohl für
die produktive wcag22aa-Auswahl als auch für die zusätzlich geprüften WCAG-2.x-Tags.

Die neue Kombination ist damit ein brauchbarer Kandidat. Keine produktive Umstellung
wurde vorgenommen. Ein Pa11y-Upgrade verändert jedoch Prüfergebnisse. Außerdem muss
die TLS-Ausnahme vor einer Umstellung angepasst werden.

## Kombinationen und Methode

- Bisher: Chrome 153.0.8010.36, Puppeteer 22.15.0, Pa11y 8.0.0.
- Kandidat: Chrome for Testing 157.0.8103.50, Puppeteer 25.17.0, Pa11y 10.0.0.
- Direkter axe-Test: in beiden Fällen axe-core 4.10.2.
- Pa11y verwendet dagegen eigene Abhängigkeiten: axe 4.8.4 beziehungsweise 4.13.0.
- Node.js 22.23.5; Lauf als www-data, nice 10, immer nur ein Testprozess gleichzeitig.
- Je Kombination: Browsernavigation, JavaScript/axe, produktive und breitere Tags;
  anschließend wirklicher Pa11y-CLI-Aufruf mit --runner axe --reporter json,
  --include-warnings und derselben Struktur der Browserkonfiguration wie produktiv.
- Frische temporäre Profile/XDG-Verzeichnisse. Abwechselnde Reihenfolge alt/neu.
- Die acht URLs sind in der vorhandenen Scan-URL-Tabelle hinterlegt. Auswahl:
  Kommunen mit umfangreichen Menüs, internationale Unternehmensseite, Organisation,
  Shop, dynamische Inhalte und Cookiebanner. Nur Startseiten, keine Anmeldung,
  Formulareingabe, Warenkorbaktion oder vollständiger Crawl.

## Erster Vergleich

Pa11y-Treffer umfassen die durch --include-warnings mitgelieferten Warnungen.
Die absoluten Zahlen sind keine Aussage über eine Verschlechterung der Kundenseite.

| URL | HTTP alt/neu | axe 4.10.2 gleicher Befund | Pa11y 8 / Pa11y 10 |
| --- | --- | --- | --- |
| https://www.plauen.de/ | 200 / 200 | ja | 58 / 66 |
| https://www.burkardroth.de/ | 200 / 200 | ja | 23 / 23 |
| https://www.northeim.de/ | 200 / 200 | ja | 211 / 278 |
| https://www.karlstein.de/ | 200 / 200 | ja | 65 / 72 |
| https://www.bdo.dk/ | 200 / 200 | ja | 172 / 171 |
| https://unwomen.de/ | 200 / 200 | ja | 134 / 134 |
| https://www.futtermedicus.de/ | 200 / 200 | ja | 90 / 90 |
| https://www.krailling.de/ | 200 / 200 | ja | 42 / 42 |

Pa11y liefert gültige JSON-Arrays mit den von der Anwendung benötigten Feldern.
Auffällige JavaScript-Meldung bei BDO: "MktoForms2 is not defined" tritt bei beiden
Kombinationen und auch im Kontrolllauf auf, also kein neu beobachteter Browserfehler.

## Kontrollläufe und Wiederholungen

Zusätzlich wurde auf Plauen, Northeim, Karlstein und BDO ausschließlich der Browser
auf 157 gewechselt, während Puppeteer 22.15 und Pa11y 8 unverändert blieben.

- Northeim: wieder 211 Pa11y-Treffer. Drei Läufe pro Hauptkombination ergeben
  stabil 211 (alt) und 278 (neu). Unterschiede betreffen vor allem Kontrast,
  link-in-text-block und zwei aria-valid-attr-value-Treffer. Der Browser allein
  erklärt die Unterschiede hier nicht; Pa11y/axe wechseln ebenfalls ihre Version.
- Plauen: Browser-Kontrolle 57 statt 58; drei Hauptläufe stabil 58 versus 66.
  Die Abweichungen liegen bei Kontrasttreffern. Neue Prüfsoftware und geringe
  Schwankungen der Live-Seite müssen auseinandergehalten werden.
- BDO: Browser-Kontrolle 172, neue Kombination 171. Das ist eine kleine
  Live-/Prüfsoftware-Abweichung, kein nachgewiesener Browserdefekt.
- Karlstein: Browser-Kontrolle zunächst nur 7 Treffer. Gezielte Wiederholung
  ergibt mit dem bisherigen Browser ebenfalls einmal 7, danach 65; mit dem neuen
  Browser zweimal 65. Damit ist der Ausreißer nicht spezifisch für Browser 157.
  Vermutlich Lade-/Bannerzustand; dessen genaue Ursache ist nicht bewiesen.

Insgesamt 32 erfolgreiche Testdurchläufe, jeweils direkter axe- und Pa11y-Scan.
Alle direkten axe-Befunde bleiben auch in den Wiederholungen gleich.

## PDF und Darstellung

Für Plauen, BDO und Futtermedicus wurden je Kombination PDFs und Screenshots erzeugt.
Alle sechs PDFs haben einen gültigen PDF-Header und konnten mit Ghostscript gerendert
werden. Visuell geprüfte Screenshots und erste PDF-Seiten zeigen keine auffälligen
Darstellungsregressionen. Das ist kein vollständiger Vergleich aller PDF-Seiten und
kein visueller Regressionstest der produktiven Rechnung-/Zertifikat-Templates.

## Laufzeit und Ressourcen

Erste acht Vergleichspaare, pro Lauf beide Scans einschließlich eventueller PDF:

| Messung | Bisher | Kandidat |
| --- | ---: | ---: |
| Median Laufzeit | 8,08 s | 8,24 s |
| Summe CPU-Zeit aller acht Läufe | 29,58 s | 32,20 s |
| Größter Einzelprozess-RSS | 221,2 MiB | 235,6 MiB |

Messung mit /usr/bin/time, CPU einschließlich beendeter Kindprozesse. RSS ist das
Maximum eines Einzelprozesses, NICHT der gleichzeitig summierte Speicher aller
Browserprozesse. Live-Netzwerk und kleine Stichprobe erlauben keine belastbare
Kapazitätsprognose; kein deutlicher Laufzeit-Sprung in dieser Stichprobe.

## Isolierter Anwendungstest

Die echten Ergebnisdateien wurden mit den unveränderten Methoden der Klasse
ScanAccessibility22 verarbeitet: normalizeAxeResults, storeResults, deleteOldIssues,
updateStats/saveOrUpdateStat. Eine eigens erstellte SQLite-:memory:-Datenbank enthält
nur das benötigte Testschema. Kein Laravel-Application-Boot, keine .env, keine
Produktions-DB-Verbindung. Die fehlende passende PHP-SQLite-Erweiterung wurde nur
nach /tmp entpackt und per -d extension für diesen PHP-Prozess geladen; keine
Systeminstallation oder Änderung der PHP-Konfiguration.

64 Kombinationen aus Ergebnisdatei und WCAG-Standard 2.1/2.2 bestanden:
- korrekte Normalisierung, Zusammenführung und Anzahl gespeicherter Befunde;
- Fehlerstatistik mit ein-/ausgeschalteter Kontrastzählung;
- erneute Statistikaktualisierung ohne doppelte Tagesstatistik;
- Fehlerzustand mit NULL-Statistik statt falscher Null-Fehler-Meldung.

Dies ist ein echter Speichertest auf isoliertem Testschema, aber KEIN vollständiger
Worker-/Queue-/Fingerprint-/Snapshot-End-to-End-Test auf MariaDB. Ein solcher Test
ist vor einem breiten Rollout weiterhin sinnvoll.

## Konkreter Anpassungsbedarf: TLS

Ein lokaler HTTPS-Testserver mit selbstsigniertem Testzertifikat liefert:

| Kombination / Launch-Option | Ergebnis |
| --- | --- |
| Pa11y 8, Puppeteer 22: ignoreHTTPSErrors=true | erfolgreich |
| Pa11y 10, Puppeteer 25: ignoreHTTPSErrors=true | ERR_CERT_AUTHORITY_INVALID |
| Pa11y 10, Puppeteer 25: acceptInsecureCerts=true | erfolgreich |

Die produktive buildPa11yConfigFile-Methode verwendet die alte Option. Sie muss
vor einem Wechsel auf den neuen Puppeteer angepasst werden, wenn das bisherige
Verhalten bei ungültigen Zertifikaten erhalten bleiben soll. Der direkte axe-Pfad
setzt diese Ausnahme bisher nicht; dort wurde keine Ausnahme hinzugefügt.

## Betriebszustand und nächste Schritte

Apache, MariaDB, Supervisor, Cron und Certbot-Timer aktiv. Alle fünf Worker laufen
mit denselben PIDs wie vor den Tests. HTTPS 200, Connection_errors_max_connections=0
seit dem Neustart; kein fehlgeschlagener Systemdienst beim Abschlusscheck.
Produktive Browserpfade, npm-Pakete, Chrome-Paketsperre und Scan-Ergebnisse wurden
nicht geändert. Keine Scan-Jobs ausdrücklich eingestellt. Die normalen GET-Aufrufe
öffentlicher Kundenseiten können deren übliche Widgets/Analytics auslösen.

Vor Umstellung:
1. TLS-Konfiguration kompatibel machen und gezielt testen.
2. Browser-/Puppeteer-Wechsel und fachliche Auswirkungen des Pa11y-/axe-Upgrades
   getrennt freigeben. Pa11y-Trefferzahlen können trotz unveränderter Seite wechseln.
3. Vollständigen Job-/Queue-Lauf auf isolierter Testdatenbank prüfen; danach einen
   begrenzten produktiven Rollout mit nachvollziehbarer Rücknahme vorbereiten.

Kompakte Messdaten: browser-customer-test-2026-11-13-summary.json neben diesem Bericht.
Temporäre Rohdaten und PDFs: /tmp/akb-customer-browser-eval-2026-11-13.
Temporäre Programme/Installation: /tmp/akb-browser-eval-2026-11-13.
Die /tmp-Artefakte sind nicht als dauerhafte Installation zu betrachten.
