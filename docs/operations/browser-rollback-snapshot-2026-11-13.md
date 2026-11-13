# Rückfallsicherung vor Browserwechsel, 13.11.2026

Dauerhafte Sicherung auf diesem Server:
`/opt/akb/browser-backups/production-chrome153-2026-11-13_102026-UTC/`

Enthält die vollständigen installierten Dateien von Chrome 153.0.8010.36,
Puppeteer 22.15.0, axe-core 4.10.2, Pa11y 8.0.0 mit Abhängigkeiten,
zusätzlich axe-cli und die Node.js-22.23.5-Binärdatei. Das vollständige
Anwendungs-node_modules-Verzeichnis sowie ausgewählte Scannerdateien,
Konfigurationsreferenzen, Lockfile und Chrome-Paketmetadaten sind gesichert.
Keine .env, Kundendatenbank oder privaten TLS-Schlüssel enthalten.

`runtime/` ist eine direkt benutzbare Rückfallkopie. `snapshot.tar.gz` enthält
zusätzlich eine komprimierte Kopie. `manifest.json` enthält Dateiprüfsummen und
Symlinkziele, `SHA256SUMS` die Archivprüfsumme. `RESTORE.md` erklärt die Rücknahme.

Die gesicherten Node-/Browser-/Scannerdateien wurden direkt aus diesem Verzeichnis
als www-data getestet: Chrome 153, axe OK, Pa11y OK, PDF 11665 Bytes.
Die produktive Installation und Browserpfade wurden nicht geändert.

Diese Sicherung ermöglicht eine Rücknahme des Browserwechsels auf demselben
System; sie ist kein vollständiges OS-Backup und enthält keine Systembibliotheken.
Für Schutz gegen Server-/Datenträgerverlust muss das Archiv zusätzlich auf
separaten Speicher kopiert werden. Keine externe Kopie wurde angelegt.
