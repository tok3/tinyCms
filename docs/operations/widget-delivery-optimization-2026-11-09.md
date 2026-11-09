# Widget-Auslieferung: erste Optimierung, 2026-11-09

## Anlass und Umfang

Gemeldet wurden CPU-Saettigung von PHP 8.3 und MariaDB-Fehler 1040
(Too many connections) bei der Widget-Auslieferung. Der Zusammenhang mit
Last, langsamen Abfragen, Backups oder einem Angriff ist damit noch nicht
geklaert. MaxRequestWorkers=150 und fuenf Queue-Worker stammen aus dem Auftrag;
das wirkliche DB-Verbindungslimit ist unbekannt.

Diese Aenderung wurde ausschliesslich lokal vorbereitet und getestet.
Keine Produktionsdatenbank, Produktionsdienste oder Serverkonfiguration wurden
verwendet oder geaendert. Vorhandene fremde lokale Aenderungen bleiben erhalten.

## Umsetzung

- DashboardPanelProvider: Die Company-Abfrage mit Request::segment(2) beim
  allgemeinen Panel-Aufbau entfaellt. Auch /service/ULID/fixstern.js,
  /service/fixstern.css und /service/fixstern-icons.svg durchliefen diesen Aufbau.
  Die Upsell-Navigation wertet ihre Sichtbarkeit jetzt erst im Dashboard aus und
  benutzt den von Filament bereits aufgeloesten Mandanten. Der Render-Hook fuer
  Upsell-Links bekommt ebenfalls dessen ID. Das funktioniert auch bei Livewire,
  wo das zweite Request-Segment nicht die Mandanten-ID enthalten muss.
- VerifyCustomerAccess: Nach der bestehenden Zugriffspruefung wird das geladene
  Company-Objekt als internes Request-Attribut widget_company weitergereicht.
  Ein Client-Query-Parameter kann dieses Attribut nicht setzen.
- ScriptController: Benutzt dieses Objekt statt einer zweiten Company-Abfrage.
  Ohne passendes Objekt bzw. bei abweichender ULID liefert er 403.
- Die aktiven Feature-Slugs werden pro Widget-Anfrage einmal ueber features()
  geladen. Damit gilt weiterhin wherePivotNull(deleted_at). Wie bisher genuegt
  die Existenz einer Zuordnung; der Pivot-Wert value=0 sperrt kein Feature.
- WidgetScriptProfileResolver enthaelt die fixstern-Kombinationen und die drei
  Sonderkunden. leichte-sprache hat Vorrang; regulaere Kombinationen haben
  Vorrang vor den drei *-only-Fallbacks, deren Reihenfolge ebenfalls gleich bleibt.
- AltStar beachtet weiter altstar_type und beide Alt-Tag-Features. Die Ausnahme
  fuer 01JE6A5H2NQZCT4P9N3FEZG2CX gilt weiterhin nur ohne jegliche Zuordnung.
  Schon eine geloeschte Zuordnung verhindert diese Ausnahme (404 statt 403).
  Nur fuer diese Unterscheidung wird bei fehlender aktiver AltStar-Berechtigung
  zusaetzlich exists() auf company_feature ausgefuehrt.

Company::hasFeature() bleibt global unveraendert. Es gibt keinen neuen
uebergreifenden Cache mit Invalidierungsrisiko. Referrer-Job, UUID-Idempotenz,
Locks, Transaktionen, Zaehler und Scan-Auftraege wurden nicht geaendert.
JS-Transformation, Sprite-Injektion und HTTP-Cache-Header bleiben gleich.

## Messung und Tests

Testdatei: tests/Feature/WidgetDeliveryTest.php.
Die Tests erstellen vor dem Application-Boot eine eigene temporaere SQLite-Datei
mit einem kleinen Testschema und entfernen sie anschliessend. Die lokale
Kundendatenbank und Produktionsdaten werden nicht verwendet. Die DB-Umgebungswerte
werden nach jedem Test wiederhergestellt.

Ein Ausgangslauf mit dem alten Controller pruefte alle 128 Kombinationen der
sieben fixstern-Features erfolgreich gegen dieselbe unabhaengige Wahrheitstabelle.
Er mass maximal 24 SQL-Anweisungen pro HTTP-Widget-Anfrage ohne Referrer.
Nach der Aenderung sind es fuer alle Kombinationen genau 2 (Company + Features),
also im schlechtesten gemessenen Fall rund 92 Prozent weniger. Die fruehere
Company-Abfrage waehrend des Application-Boots liegt ausserhalb dieses
Request-Messfensters und kommt als zusaetzliche Einsparung hinzu.

Ergebnis: 11 Tests, 763 Assertions erfolgreich, PHP 8.3.36.

Abgedeckt sind:

- alle 128 Kombinationen mit exaktem Response-Text und ETag anhand kleiner
  JS-Fixtures; regulaere Varianten und alle *-only-Prioritaeten;
- zusaetzlich elf wirkliche Repository-Scripts: vollstaendiger Template-Inhalt
  nach ULID-Ersetzung bleibt als Response-Suffix erhalten, Sprite-Loader und
  ETag sind vorhanden wie erwartet;
- alle drei fixstern-Sonderkunden, AltStar-Sonderkunde, beide AltStar-Features,
  beide Einstellungen, geloeschte Zuordnungen und value=0;
- unbekannte Firmen (403), fehlende Dateien (404), Content-Type, keine Cookies,
  ETag/If-None-Match und Last-Modified/If-Modified-Since mit 304;
- ein alter ETag bestaetigt nach Feature-Wechsel keine falsche Variante und
  umgeht bei inzwischen geloeschter Firma nicht die Zugriffskontrolle;
- CSS-Query-Parameter, SVG und CSS ohne Dashboard-/sonstige SQL-Abfragen;
- Panel-Registrierung ohne SQL, aktuelle Feature-Sichtbarkeit und Mandantenwechsel;
- echte database-Queue und Laravel-Worker runNextJob(): Request legt bei belegter
  Referrer-Sperre nur einen Job ab; erst der Worker erstellt Referrer und URL sowie
  genau einen Accessibility-Scan-Auftrag mit WCAG 2.2. Wiederholung derselben UUID zaehlt nicht
  doppelt, ein neues Ereignis erhoeht den Zaehler. Fremde/ungueltige Domains werden
  weiter ignoriert;
- unerreichbare Queue-Tabelle: JavaScript bleibt 200, Queue-Fehler wird geloggt;
- sync-Treiber: keine synchrone Referrer-Verarbeitung.

Reproduzierbarer lokaler Aufruf (PHP-Pfad ggf. anpassen):

```sh
PHPRC=/dev/null PHP_INI_SCAN_DIR= /opt/homebrew/opt/php@8.3/bin/php vendor/bin/phpunit tests/Feature/WidgetDeliveryTest.php
```

PHPRC umgeht hier ausschliesslich fuer den Testprozess eine lokale Imagick-
Versionswarnung; die benoetigten Extensions sind in dieser PHP-Installation
eingebaut. Die Tests umgehen ausserdem eine fremde lokale _Dashboard.php-
Sicherung mit falschem Klassennamen durch einen Test-Alias. Diese Datei wird
nicht geaendert. Das Testschema wird absichtlich ohne Projektmigrationen erzeugt.

Die Queue-Pruefung ist kein Fake, aber der Worker laeuft im Testprozess auf
SQLite. Das ist kein MariaDB-Parallelitaets-, Apache-Last- oder vollstaendiger
Browser-/Dashboard-Test. Bestehende Referrer-Parallelitaetsgarantien wurden
nicht neu unter konkurrierenden MariaDB-Workern bewiesen. Keine Aussage ueber
CPU-Prozente oder maximale Produktionsverbindungen aus diesem Test ableiten.

## Verbleibende Befunde

Company::hasAccessToTool() gibt im aktuellen Stand pauschal true zurueck.
Die Middleware sperrt unbekannte/geloeschte Firmen, hat damit aber keine
allgemeine tarifbasierte Tool-Pruefung. AltStar hat seine eigene Feature-Pruefung.
Das vorhandene Zugriffsverhalten wird beibehalten, nicht stillschweigend erweitert.

304-Anfragen lesen/transformieren/hashen weiterhin das Script. Der ETag muss
auch das Feature-Profil repraesentieren; nur mit Script-mtime vorab 304 zu liefern
koennte nach einem Feature-Wechsel die falsche Variante bestaetigen.

Der Auftrag nennt retry_after=1200. Im lokalen config/queue.php stehen dagegen
90 Sekunden, waehrend ScanAccessibilityJob timeout=300 verwendet. Die effektiven
Werte auf dem Zielsystem einschliesslich Config-Cache/Worker-Optionen muessen
ueberprueft werden. retry_after muss laenger als das wirksame Job-/Worker-Timeout
inklusive Reserve sein, sonst kann derselbe Job parallel erneut reserviert werden.
Das passende Intervall fuer lange Scans nicht aus Referrer-Zeiten ableiten.

## Groessere Folgeschritte

| Massnahme | Nutzen und Aufwand | Voraussetzungen und Auswirkungen |
| --- | --- | --- |
| Versioniertes statisches SVG-Sprite | Hoch fuer haeufige SVG-Anfragen; kleiner bis mittlerer Aufwand | Im Build aus der bestehenden Icon-Liste erzeugen, Content-Hash im Dateinamen, Manifest und Loader anpassen. Apache kann PHP/DB komplett umgehen. CORS und fetch(credentials:omit), Symbol-IDs und Inline-Injektion erhalten; alte Versionen fuer gecachte JS-Dateien weiter anbieten. |
| Statisches Basis-CSS + Anpassungen | Hoch fuer CSS-Anfragen; mittlerer Aufwand | Hash-Dateiname fuer Basis-CSS; mt/mr/mb/ml/unit als kleine zusaetzliche Regeln behandeln. Lade-Reihenfolge, CSP und CSS-Spezifitaet testen. Bestehende Einbindungen/Query-URLs kompatibel weiter bedienen. Ein globales Rewrite auf statisches CSS wuerde aktuelle Parameter verlieren. |
| Cache fuer Profil/fertiges JS | Kann Transformations-CPU und Profil-Abfragen senken; mittlerer bis hoher Aufwand | Cache-Key mit ULID, Tool, aktiven Feature-Slugs, relevanten Einstellungen, Script-Content-Hash und Loader-Version. Zugriff vorher weiterhin pruefen. Fuer Profil-Cache zuverlaessige Revisionen bei attach/detach, Pivot-Softdelete/-restore, Feature-Slug-Aenderung, Einstellungen und Rechtewechseln vorsehen; Query-Builder-Updates loesen keine Model-Observer aus. Stampede-Schutz und kurze Fallback-Zeiten einplanen. File-Cache-Disklast messen. |
| Referrer buendeln | Weniger Queue-Inserts und Transaktionen; hoher Aufwand | Eindeutige Ereignis-UUIDs behalten, erst dann normalisierte URLs gruppieren. N neue Ereignisse fuer vorhandenen Referrer: +N, erstmaliger Referrer: count=N-1. Firmenweites URL-Limit und genau einmalige Scan-Anlage transaktional erhalten. Wiederholbare Batches, atomare Uebergabe und Teilfehler testen. Browser-Caching reduziert die Zahl beobachteter Requests bereits heute; Referrer sind keine vollstaendige Besucherstatistik. |
| Redis optional | Entlastet DB-Queue und kann File-Lock-I/O senken; mittlerer Betriebsaufwand | Keine Voraussetzung dieser Aenderung. Persistenz, Ausfallstrategie, Monitoring, Redis-Client und getrennte Timeout-/retry_after-Werte je Queue planen. Beim Wechsel alte DB-Queues abarbeiten. Idempotenz bleibt auch mit Redis erforderlich. |

Schon heute nutzt CSS ein Jahr immutable ohne erzwungenen Content-Hash in der
URL. Eine Aenderung derselben URL kann deshalb lange unsichtbar bleiben.
Diese bestehende Cache-Strategie sollte beim statischen Umbau auf echte
Versionierung umgestellt werden. Dasselbe gilt fuer spaetere Rechteaenderungen
an bereits oeffentlich gecachtem JS: Server-Pruefungen koennen bereits
ausgelieferte und im Browser noch frische Dateien nicht zurueckrufen.

## Produktionsmessung und Dimensionierung

Weniger SQL reduziert Abfragearbeit und die Dauer belegter PHP-/DB-Ressourcen.
Ein DB-nutzender Request oeffnet weiterhin typischerweise eine Verbindung;
die Abfragezahl ist kein Mass fuer die Zahl gleichzeitig offener Verbindungen.
Auch terminating-Callbacks belegen bis zum Abschluss Ressourcen des Webprozesses.

Vor Anpassungen zeitlich korreliert messen:

- MariaDB: tatsaechliches max_connections, Threads_connected, Threads_running,
  Max_used_connections, Connection_errors_max_connections, Abfragedauer,
  langsame Queries, Locks und Connection-Lebensdauer/Persistenz;
- Apache/PHP: Busy-/IdleWorkers, Request-Dauer p50/p95/p99, Requests/s nach Route,
  CPU und Speicher je Prozess, Anzahl aktiver Requests, KeepAlive-Belegung;
- Queue: Workerzahl, aktive DB-Verbindungen auch im Leerlauf, Laufzeiten und
  Wartezeit pro Queue, Retry-/Fehlerraten und Lock-Konflikte;
- Scheduler, Backup und weitere Anwendungen: gleichzeitig genutzte Verbindungen,
  CPU, Disk-I/O und Speicherreserven; Peaks waehrend Backups gesondert betrachten.

Apache/PHP-Parallelitaet, Worker, Scheduler und weitere DB-Clients muessen
zusammen in das gemessene DB-/Speicher-/CPU-Budget mit Reserve passen.
150 Apache-Worker plus fuenf Queue-Worker sind kein Beleg fuer einen passenden
DB-Grenzwert von 151. Keinen festen neuen max_connections-Wert ohne Daten setzen.

## Einspielen und Ruecknahme

Zuerst auf dem Testserver die zusammengehoerigen Dateien ausliefern:
DashboardPanelProvider, VerifyCustomerAccess, ScriptController und den neuen
WidgetScriptProfileResolver. Keine Migration, Composer-Abhaengigkeit oder
neue Infrastruktur erforderlich.

Bei gecachten PHP-/Laravel-Dateien Views gezielt leeren und PHP-OPcache ueber
den ueblichen Deployment-Ablauf aktualisieren. Neue Worker-Konfiguration ist
fuer diese Aenderung nicht erforderlich. Bestehende Referrer-/Accessibility-
Worker muessen weiter laufen. Keine pauschale Cache-Loeschung im laufenden
Betrieb: der File-Cache wird auch fuer verteilte Sperren verwendet.

Auf dem Testserver mehrere bekannte ULIDs, Sonderkunden, CSS-Parameter, SVG,
304-Verhalten, Dashboard-Mandantenwechsel und Upsell-Links pruefen; dazu
Request-Dauer und SQL-/Verbindungsmessung unter kontrollierter Last erfassen.
Ruecknahme durch gemeinsames Zuruecknehmen der vier Implementierungsdateien
und Aktualisieren des PHP-Code-Caches; keine Datenrueckmigration notwendig.

Die Auslieferung auf Test- oder Produktionsserver erfolgt separat nach dem
Commit. Im Rahmen der lokalen Umsetzung wurden keine Server geaendert.
