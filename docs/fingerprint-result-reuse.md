# Wiederverwendung abgeschlossener Scans

Ein unveränderter HTML-Fingerprint allein reicht nicht zum Überspringen des
Scans. `AccessibilitySnapshotReplicationService` verlangt ein erfolgreich
abgeschlossenes Ergebnis für dieselbe URL-ID, denselben Standard, denselben
Fingerprint und dieselben Scan-Einstellungen. Die Zuordnung gilt damit innerhalb
eines Mandanten; gleiche URL-Zeichenfolgen anderer Mandanten werden nicht vermischt.

Die drei Scan-Commands erfassen den Fingerprint unmittelbar vor der Prüfung unter
einer gemeinsamen Sperre je URL-ID. `DetermineScan` plant die URLs, schreibt aber
keine Fingerprints mehr vorab fort. Die frühere Entscheidungsmatrix anhand der
letzten beiden HTML-Abrufe wird in diesem Ablauf nicht mehr verwendet. Die Option
`--skip-fingerprint` wird aus Kompatibilitätsgründen akzeptiert, umgeht die Prüfung
aber nicht mehr.

Nach erfolgreicher Speicherung aller angeforderten Scan-Teile legt der Command im
vorhandenen JSON-Feld `pa11y_url_fingerprints.decision_context.completed_snapshot`
die Statistikwerte und Einzelbefunde zusammen mit `measured_at` und einer Signatur
der Optionen ab. Leere Ergebnislisten sind erfolgreiche Scans. Fehlgeschlagene
oder unvollständige Scans erzeugen keinen solchen Abschluss. Es ist keine Migration
nötig. Bestehende Fingerprints ohne Abschlussnachweis führen beim nächsten Aufruf
zunächst zu einem echten Scan.

Bei Wiederverwendung stammen Zahlen und Einzelbefunde aus diesem festen Ergebnis,
nicht aus unabhängig ausgewählten jüngsten Statistik- und Befundzeilen. Tageswerte
werden weiterhin für die Auswertung angelegt beziehungsweise aktualisiert;
wiederholte Wiederverwendung am selben Tag erzeugt keine weiteren Zeilen. Die
Prüfhistorie enthält `reused_from_fingerprint_id` und `source_scanned_at`. Damit
bleibt das ursprüngliche Messdatum erhalten, obwohl `scanned_at` der Tagesstatistik
weiterhin den Berichtstag repräsentiert. Die Benutzeroberfläche wurde nicht geändert.

Die vorhandene Einstellung `fingerprint.stale_after_minutes` begrenzt das Alter
wiederverwendbarer tatsächlicher Messungen (Standard: sieben Tage). Kopien verlängern
diese Frist nicht. Änderungen an Kontrasteinstellung, Scanoptionen, Browserkonfiguration
oder Projekt-Node-Abhängigkeiten verhindern ebenfalls eine Wiederverwendung.
Updates global installierter Scanner erfordern bei Bedarf eine Erhöhung von
`snapshot_version` in der Optionssignatur; deren Versionen werden nicht automatisch
ermittelt. Die HTML-Normalisierung bleibt unverändert und ist kein Fingerprint aller
CSS-/JavaScript-Ressourcen oder des vollständig gerenderten Browserzustands.

Historische doppelte oder widersprüchliche Tagesstatistiken werden nicht pauschal
bereinigt. Neue Commands müssen beim Deployment von allen aufrufenden Workern geladen
werden; laufende Worker erst nach Abschluss ihrer Jobs wechseln lassen. Gemischte
alte/neue Worker verwenden nicht dieselbe Sperrlogik.

## Tests

`tests/Integration/FingerprintSnapshotTest.php` bootet keine Produktionskonfiguration.
Es benötigt eine separate leere MySQL-Datenbank mit dem zwingenden Namenspräfix
`akb_fingerprint_test_`. Es erstellt seine eigenen drei Testtabellen darin.

```sh
AKB_FINGERPRINT_TEST_DATABASE=akb_fingerprint_test_local \
AKB_FINGERPRINT_TEST_USER=test_user \
php vendor/bin/phpunit tests/Integration/FingerprintSnapshotTest.php
```

Optional: `AKB_FINGERPRINT_TEST_PASSWORD` und `AKB_FINGERPRINT_TEST_SOCKET`.
Ohne Testdatenbankvariable werden die Tests übersprungen. Geprüft werden fehlender
Scan-Abschluss, unterschiedliche Fingerprints/Optionen/Standards/Mandanten, unveränderliche
Ergebnisse, Messzeitpunkt, wiederholte Tagesübernahme, leere Ergebnisse, Ablauf und
unvollständige Mehrfachscans.
