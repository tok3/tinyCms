# Vertragslaufzeit: Rollout und Betrieb

Diese Änderung wird manuell hochgeladen. Sie führt keine Kündigung und keinen Mollie-Aufruf während des Deployments aus. Der tägliche Scheduler verarbeitet Verlängerungen und fällige Mollie-Kündigungen anschließend automatisch.

## Vor dem Upload

1. Vollständiges Datenbank-Backup erstellen und Wiederherstellung kurz prüfen.
2. Anwendungscode einschließlich der beiden neuen Migrationen hochladen.
3. Sicherstellen, dass der Laravel-Scheduler weiterhin minütlich durch den Server gestartet wird.

## Deployment

Im Release-Verzeichnis ausführen:

```bash
php artisan migrate --force
php artisan optimize:clear
php artisan schedule:list
```

In der Schedule-Liste muss `contracts:process-lifecycle` täglich um 07:30 Uhr in `Europe/Berlin` vor `app:generate-recurring-invoices` und dem Feature-Cleanup erscheinen.

## Stichproben nach der Migration

Die folgenden Abfragen sind nur lesend. Tabellennamen oder SQL-Syntax bei abweichender Datenbank anpassen.

```sql
-- Aktive, wiederkehrende Verträge: automatische Verlängerung aktiv
SELECT id, `interval`, end_date, status, auto_renew,
       notice_period_months, renewal_period_months
FROM contracts
WHERE deleted_at IS NULL
  AND end_date >= CURRENT_DATE
  AND `interval` IN ('daily', 'weekly', 'monthly', 'annual', 'yearly')
ORDER BY id DESC
LIMIT 20;

-- Einmalverträge: keine automatische Verlängerung
SELECT id, `interval`, end_date, status, auto_renew
FROM contracts
WHERE deleted_at IS NULL AND `interval` = 'one_time'
ORDER BY id DESC
LIMIT 20;

-- Bereits abgelaufene Verträge: beendet, nicht erneut aktiviert
SELECT id, `interval`, end_date, status, auto_renew
FROM contracts
WHERE deleted_at IS NULL AND end_date < CURRENT_DATE
ORDER BY end_date DESC
LIMIT 20;

-- Gelöschte Verträge: nicht in die Verlängerung aufgenommen
SELECT id, `interval`, end_date, status, auto_renew, deleted_at
FROM contracts
WHERE deleted_at IS NOT NULL
ORDER BY deleted_at DESC
LIMIT 20;
```

Erwartung: aktive wiederkehrende Verträge sind `active` und `auto_renew = 1`; Einmalverträge, abgelaufene und gelöschte Verträge werden nicht automatisch verlängert.

## Vertrag 142 prüfen und kündigen

1. Im Admin Vertrag 142 öffnen.
2. Aktion **Kündigung vormerken** verwenden; die Lifecycle-Felder nicht direkt ändern.
3. Als Eingangsdatum `24.03.2027` eintragen.
4. Die Vorschau muss als reguläres Vertragsende `24.06.2027` zeigen.
5. Speichern und kontrollieren:
   - Status `cancellation_pending` / Kündigung vorgemerkt;
   - automatische Verlängerung aus;
   - Kündigungseingang `24.03.2027`;
   - wirksames Ende `24.06.2027`;
   - Mollie bleibt zunächst aktiv.

Mollie wird erst einen Kalendertag vor dem wirksamen Ende durch `contracts:process-lifecycle` gekündigt. Bis einschließlich Vertragsende bleiben die Vertragsfeatures aktiv.

## Rücknahme und Kulanz

- Eine vorgemerkte Kündigung kann im Vertrag über **Kündigung zurücknehmen** mit Pflichtbegründung aufgehoben werden.
- Ist Mollie noch aktiv, bleibt die bestehende Subscription bestehen.
- Wurde Mollie schon gekündigt, kann sie nicht fortgesetzt werden. Die Rücknahme muss dann die Umstellung auf normale Rechnung bestätigen; die alte Mollie-ID bleibt im Audit-Verlauf erhalten.
- Für eine frühere Beendigung aus Kulanz muss ein Grund und ein Datum ab heute bis höchstens zum regulär berechneten Ende angegeben werden.

## Laufende Kontrolle

Der Befehl kann bei Bedarf manuell ausgeführt werden:

```bash
php artisan contracts:process-lifecycle
```

Ein Fehler bei Mollie führt zu einem fehlerhaften Exit-Code und bleibt wiederholbar. Bei einer bezahlten Mollie-Zahlung nach Vertragsende wird nichts automatisch erstattet; Zahlung und Rechnung bleiben erhalten, und ein kritischer Logeintrag plus Lifecycle-Ereignis fordert eine manuelle Prüfung an.

## Rollback-Hinweis

Code und noch nicht ausgeführte Datenbankänderungen können nach dem üblichen Release-Verfahren zurückgerollt werden. Eine von Mollie bereits bestätigte Subscription-Kündigung lässt sich jedoch nicht widerrufen. In diesem Fall darf die alte Subscription-ID nicht wieder aktiviert werden; eine Vertragsreaktivierung läuft über normale Rechnungen. Deshalb vor einem Rollback zuerst `contract_lifecycle_events`, `mollie_canceled_at` und den Remote-Status der betroffenen Subscription prüfen.
