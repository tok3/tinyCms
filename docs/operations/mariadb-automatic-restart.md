# Automatischer Neustart von MariaDB

Stand: 05.10.2026. Die folgenden Maßnahmen wurden auf dem untersuchten
Produktionsserver eingerichtet und geprüft.

## Anlass und Befund

Am 04.10.2026 um 22:46:26 UTC beendete der Linux-OOM-Killer MariaDB wegen
Arbeitsspeichermangels. Das systemd-Journal enthielt:

```text
mariadb.service: Main process exited, code=killed, status=9/KILL
mariadb.service: Failed with result 'oom-kill'.
```

Der Dienst startete nicht automatisch neu. Erst am 05.10.2026 um 07:09:32 UTC
lief die Datenbank wieder. Die Unterbrechung dauerte etwa 8 Stunden 23 Minuten.

Installiert waren MariaDB 10.6.23 und systemd 249 unter Ubuntu 22.04.
`mysql.service` bezeichnet auf diesem Server denselben Dienst wie
`mariadb.service`.

Die ursprüngliche Paketkonfiguration unter `/lib/systemd/system/mariadb.service`
enthielt `Restart=on-abort` und `RestartSec=5s`. systemd 249 behandelt
`oom-kill` als eigenen Fehlerzustand, den `on-abort` nicht berücksichtigt.
`on-failure` berücksichtigt diesen Zustand dagegen. Die Entscheidung ist im
[systemd-249-Quellcode](https://github.com/systemd/systemd/blob/v249/src/core/service.c#L1497-L1540)
nachvollziehbar.

## Eingerichtete Konfiguration

Es wurde die folgende Datei außerhalb des Git-Repositories angelegt:

`/etc/systemd/system/mariadb.service.d/restart-on-failure.conf`

```ini
[Service]
# Include OOM kills and non-zero exits in automatic recovery.
Restart=on-failure
RestartSec=5s
```

Das Verzeichnis gehört `root:root` und hat Modus `0755`; die Datei gehört
`root:root` und hat Modus `0644`. Die vom Paket bereitgestellte Unit wurde nicht
verändert. Die Ergänzung bleibt daher bei normalen Paketaktualisierungen erhalten.

Die Einstellung veranlasst nach Fehlern einschließlich OOM-Abbrüchen einen
Neustartversuch nach fünf Sekunden. Die Zeit bis zur tatsächlichen Verfügbarkeit
kann wegen der Datenbankwiederherstellung länger sein. Ein bewusstes
`systemctl stop mariadb` löst keinen automatischen Neustart aus.

Folgende vorhandene Werte wurden beibehalten:

| Einstellung | Wert |
| --- | --- |
| `OOMPolicy` | `stop` |
| `StartLimitIntervalUSec` | `10s` |
| `StartLimitBurst` | `5` |
| `RestartPreventExitStatus` | leer |
| `RestartForceExitStatus` | leer |

Es wurde kein zusätzlicher Cronjob, Watchdog oder Monit-Dienst eingerichtet.
Die Wiederanlaufbehandlung erfolgt durch systemd. Sie erkennt kein bloßes Hängen
eines weiterhin laufenden Datenbankprozesses und ersetzt keine Prüfung der
Datenbank-Erreichbarkeit. Bei dauerhaftem Speichermangel oder anderen anhaltenden
Startfehlern ist ein erfolgreicher Wiederanlauf nicht garantiert.

## Einrichtung auf einem weiteren Server

Zuerst die dortige Unit und vorhandene Ergänzungen prüfen, insbesondere abweichende
Dienstnamen und bestehende Neustartregeln:

```bash
systemctl cat mariadb
systemctl show mariadb -p Restart -p RestartUSec -p OOMPolicy -p DropInPaths
```

Anschließend die oben dokumentierte Datei installieren. Der folgende Befehl
überschreibt eine eventuell bereits vorhandene gleichnamige Datei; diese vorher
prüfen und gegebenenfalls sichern.

```bash
sudo install -d -m 0755 /etc/systemd/system/mariadb.service.d
sudo tee /etc/systemd/system/mariadb.service.d/restart-on-failure.conf >/dev/null <<'EOF'
[Service]
# Include OOM kills and non-zero exits in automatic recovery.
Restart=on-failure
RestartSec=5s
EOF
sudo chown root:root /etc/systemd/system/mariadb.service.d/restart-on-failure.conf
sudo chmod 0644 /etc/systemd/system/mariadb.service.d/restart-on-failure.conf
sudo systemd-analyze verify mariadb.service
```

Nach erfolgreicher Validierung die systemd-Konfiguration neu einlesen:

```bash
sudo systemctl daemon-reload
```

Ein Neustart von MariaDB ist für diese Änderung nicht erforderlich.
Das Einchecken dieser Dokumentation oder ein `git pull` installiert die
Systemkonfiguration nicht automatisch.

## Durchgeführte Prüfung

Die Unit wurde mit `systemd-analyze verify mariadb.service` geprüft und mit
`systemctl daemon-reload` neu eingelesen. Bei der Validierung erschien zusätzlich
eine Warnung zu einer unbekannten Einstellung `RestartMode` in `snapd.service`;
sie betraf nicht die MariaDB-Ergänzung. Die Validierung lieferte Exitcode 0.

Danach wurden die effektiven Werte geprüft:

```bash
systemctl show mariadb \
  -p ActiveState -p SubState -p MainPID \
  -p Restart -p RestartUSec -p OOMPolicy \
  -p DropInPaths -p NeedDaemonReload
sudo mariadb --batch --skip-column-names -e 'SELECT 1;'
```

Ergebnis am 05.10.2026:

```text
Restart=on-failure
RestartUSec=5s
MainPID=322310
OOMPolicy=stop
ActiveState=active
SubState=running
DropInPaths=/etc/systemd/system/mariadb.service.d/restart-on-failure.conf
NeedDaemonReload=no
```

Die Abfrage lieferte `1`. Die Prozess-ID war vor und nach der Änderung identisch;
MariaDB wurde nicht neu gestartet. Ein echter Absturz oder OOM-Fall wurde auf der
Produktionsdatenbank nicht absichtlich ausgelöst. Verifiziert wurden die geladene
Konfiguration und die fortbestehende Erreichbarkeit.

## Kontrolle bei einem künftigen Ausfall

```bash
sudo journalctl -u mariadb --since '24 hours ago' --no-pager
sudo journalctl -k --since '24 hours ago' --no-pager \
  | rg -i 'oom|out of memory|killed process'
systemctl show mariadb -p Result -p NRestarts -p ActiveState -p SubState
free -h
swapon --show
```

Im Journal prüfen, ob auf die Fehlermeldung ein automatischer Neustartversuch
und anschließend ein erfolgreicher Start folgen. `NRestarts` ist kein dauerhaftes
Ausfallarchiv; für die zeitliche Rekonstruktion das Journal verwenden.

Falls die Startbegrenzung erreicht wurde, zuerst die Ursache beheben und erst dann
den Fehlerzustand zurücksetzen und den Dienst starten:

```bash
sudo systemctl reset-failed mariadb
sudo systemctl start mariadb
```

## Rücknahme

Nur die hier angelegte Ergänzung entfernen und systemd neu einlesen:

```bash
sudo rm /etc/systemd/system/mariadb.service.d/restart-on-failure.conf
sudo systemctl daemon-reload
systemctl show mariadb -p Restart -p RestartUSec -p DropInPaths
```

Ohne andere Ergänzungen gilt anschließend wieder die Paketkonfiguration
(`Restart=on-abort` zum Zeitpunkt dieser Dokumentation). Andere Drop-ins bleiben
erhalten. Auch hierfür ist kein Datenbankneustart erforderlich.

## Zugehörige Behebung der Speichermangel-Ursache

Zusätzlich zur Wiederanlaufbehandlung wurden im Projekt zwei vorbeugende
Korrekturen umgesetzt:

- Commit `2ffd67b`: Geplante Bildjobs werden durch `flock` gegen parallele Läufe
  geschützt. `timeout` beendet sie nach 300 Sekunden mit TERM und nötigenfalls
  nach weiteren zehn Sekunden mit KILL. Die Regel steht in
  `app/Console/Kernel.php` und gilt für die dort geplanten Aufrufe.
- Commit `7a98dc0`: `app/Console/Commands/ProcessImages.php` übernimmt keine
  vollständigen HTTP-Fehlerseiten mehr in Fehlermeldungen. Andere Fehlertexte
  werden auf 500 Zeichen zuzüglich Kürzungsmarkierung begrenzt und für die
  Konsolenausgabe maskiert. Eine etwa 919 KB große HTML-404-Antwort hatte zuvor
  die Konsolenformatierung lange beschäftigt, sodass sich Bildjobs ansammelten.
  Zwei Regressionstests und ein regulärer Verarbeitungslauf waren erfolgreich.

Zum Ausfallzeitpunkt war kein Swap eingerichtet. Im Rahmen dieser Maßnahmen
wurden weder Swap noch MariaDB-Speicherparameter oder OOM-Prioritäten verändert.
