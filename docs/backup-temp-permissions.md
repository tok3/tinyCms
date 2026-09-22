# Gemeinsames Temp-Verzeichnis und Backup-Ausschlüsse

Der Scheduler läuft auf diesem Server als `admintfc`, Webanfragen und Queue-Worker
als `www-data`. Beide benötigen Zugriff auf `storage/app/temp`. `admintfc` ist
Mitglied der Gruppe `www-data`; `storage/app` vererbt diese Gruppe über setgid.

`SharedTemporaryDirectory::run()` ersetzt die bisherigen
`Storage::disk('local')->makeDirectory('temp')`-Aufrufe in Bildverarbeitung und
Rechnungsexport. Flysystem würde selbst bestehende Verzeichnisse auf den privaten
Standard 0700 zurücksetzen. Der neue Helfer lässt bestehende Verzeichnisrechte
unangetastet und erzeugt fehlende Verzeichnisse mit 2770. Während der Operation gilt
umask 0007, damit auch native PHP-, Imagick- und ZIP-Schreibvorgänge gemeinsam
beschreibbare Dateien erzeugen. Anschließend wird die vorherige umask auch bei
Fehlern wiederhergestellt.

Vorhandene Dateien wurden einmalig mit `scripts/repair-temp-permissions.py`
korrigiert: Gruppe www-data, Verzeichnisse 2770, reguläre Dateien 0660. Eigentümer
und Dateiinhalte bleiben erhalten; Symlinks werden nicht verfolgt. Vorherige ACLs
werden unter `/var/backups/akb/temp-permissions-*.acl` gesichert. Das Temp-Verzeichnis
hat zusätzlich eine Default-ACL für die gemeinsame Gruppe. Das Skript verlangt
Root-Rechte und prüft die Gruppenvererbung von storage/app, bevor es Änderungen macht.

## Backup

`storage/app/temp` bleibt ausdrücklich ausgeschlossen. Ein angepasster
`App\Backup\PrunedFileSelection` übergibt ausgeschlossene Unterverzeichnisse an
Symfony Finder, bevor dieser rekursiv hineingeht. Sonstige Lesefehler werden nicht
ignoriert; `ignore_unreadable_directories` bleibt false. Dynamisch hinzugefügte
Ausschlüsse des Backup-Jobs, etwa dessen Arbeitsverzeichnis, bleiben wirksam.

`AppServiceProvider` bindet Spaties BackupCommand an `App\Backup\BackupCommand`.
Dieser verwendet den angepassten Job-Factory-Aufruf; Optionen, Wiederholungen,
Signalbehandlung und Benachrichtigungsverhalten folgen dem installierten
Spatie-Befehl. An vendor-Dateien wurde nichts geändert. Beim Upgrade von
spatie/laravel-backup den überschriebenen handle()-Ablauf mit dem Paket vergleichen.

## Verifikation

```sh
php vendor/bin/pest tests/Unit/BackupPermissionsTest.php
```

Die sechs Tests prüfen frühe Ausschlüsse, weiterhin sichtbare echte Lesefehler,
Pfadgrenzen, spät hinzugefügte Ausschlüsse, setgid, Dateirechte und umask-Rücksetzung.
Sie benötigen keine Produktionsdatenbank. Den Lesefehler-Test ohne Root ausführen.

Zusätzlich wurden auf dem Server die gesamte Backup-Dateiauswahl als admintfc
(12.715 Einträge, etwa 704 MB Dateiinhalte) sowie gegenseitige Schreibzugriffe
zwischen admintfc und www-data geprüft. Temporäre Testdateien wurden entfernt.
Produktive Bildbeschreibungs-Jobs wurden für diese Prüfung nicht manuell gestartet.

Am 11.09.2026 wurde anschließend ein vollständiges Backup einschließlich Datenbank
mit `backup:run --disable-notifications --tries=1` als admintfc erfolgreich erstellt,
verschlüsselt und auf dem lokalen Backup-Laufwerk gespeichert:
`Aktion Barrierefrei/2026-09-11-14-14-05.zip` (12.719 Einträge, 759.732.058 Bytes).
Die abschließende Prüfung bestätigte ein konsistentes ZIP-Verzeichnis, einen lesbaren
Datenbank-Dump, die korrekte Entschlüsselung einer Projektdatei und das Fehlen von
storage/app/temp im Archiv. Dies ersetzt keinen vollständigen Wiederherstellungstest.
Alle Worker wurden über queue:restart nach Abschluss ihrer Jobs neu gestartet;
abschließend waren keine Systemdienste im Fehlerzustand und die Temp-Rechte weiterhin 2770.
