# Kontaktformular: Mail-Header-Hardening

Stand: 2026-09-09

## Anlass

Im Dependency-Audit wurde eine Laravel-Advisory zur E-Mail-Validierung als akut relevant bewertet. Das oeffentliche Kontaktformular hat die vom Nutzer eingegebene Adresse bisher direkt als `From`-Header verwendet.

Das ist riskant, weil manipulierte E-Mail-Eingaben bei verwundbaren Validator-/Mailer-Kombinationen zu Header-Injection oder missbraeuchlichem Mailversand fuehren koennen.

## Aenderung

Die Aenderung betrifft `app/Http/Controllers/ContactController.php`.

- Die Nutzeradresse wird nicht mehr als `From` gesetzt.
- `From` kommt jetzt aus `config('mail.from.address')` und `config('mail.from.name')`.
- Die Nutzeradresse wird nur noch als `Reply-To` verwendet.
- `name` und `email` werden auf Laenge, String-Typ und Steuerzeichen beziehungsweise CR/LF geprueft.
- Die Nachricht selbst darf weiterhin Zeilenumbrueche enthalten, wird aber auf eine maximale Laenge begrenzt.

## Verhalten Vorher/Nachher

Vorher:

- Eingabe `email` wurde validiert und anschliessend direkt als Mail-Absender gesetzt.
- Der Mail-Header hing dadurch an nutzerkontrollierten Daten.

Nachher:

- Berechtigte normale Kontaktanfragen werden weiterhin versendet.
- Mail-Authentifizierung bleibt stabiler, weil die Absenderadresse zur eigenen Domain-Konfiguration gehoert.
- Antworten gehen weiterhin an den Nutzer, weil `Reply-To` gesetzt wird.
- CR/LF- beziehungsweise Control-Character-Angriffe in `name` und `email` werden vor dem Mailversand abgewiesen.

## Tests

Ergaenzt wurde `tests/Feature/ContactControllerTest.php`.

Die Tests pruefen:

- normale Kontaktanfragen werden angenommen;
- CR/LF-Injection in `email` wird abgewiesen;
- CR/LF-Injection in `name` wird abgewiesen;
- bei abgewiesenen Eingaben wird kein Mailversand angestossen.

## Deployment-Hinweise

- Vor Deployment pruefen, dass `MAIL_FROM_ADDRESS` und optional `MAIL_FROM_NAME` korrekt gesetzt sind.
- Danach wie gewohnt Laravel-Caches leeren, falls Konfiguration gecached ist: `php artisan optimize:clear`.
- Diese Aenderung ersetzt kein spaeteres Composer-Security-Update, reduziert aber den unmittelbar sichtbaren Angriffsvektor im Kontaktformular.
