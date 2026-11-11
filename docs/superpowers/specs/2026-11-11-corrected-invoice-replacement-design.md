# Ersatzrechnung nach Korrektur - Entwurf

## Absicht

Wenn eine bereits versendete Vertragsrechnung korrigiert und anschließend Preis oder Zahlungsintervall des Vertrags berichtigt wird, soll der nächste reguläre Rechnungslauf genau eine neue, positive Ersatzrechnung erzeugen und versenden. Für Gemeinde Krailling bedeutet das: Die Monatsrechnung über 55,20 EUR wird korrigiert, Vertrag 242 wird auf jaehrlich und 463,87 EUR netto umgestellt, und der nächste Lauf stellt 552,00 EUR brutto in Rechnung.

## Ziele

- Korrekturrechnung und korrigierte Originalrechnung dürfen den Abrechnungstakt nicht blockieren oder verschieben.
- Die Ersatzrechnung bleibt mit dem Vertrag verknüpft und verwendet den ursprünglichen Abrechnungsstichtag.
- Eine Änderung von Vertragspreis oder Zahlungsintervall verwirft den alten `pricing_snapshot`, damit der sichtbare Nettopreis im Vertrag wieder die verbindliche Rechnungsgrundlage ist.
- Wiederholte Rechnungsläufe erzeugen und versenden keine zweite Ersatzrechnung.
- Nicht korrigierte Verträge behalten ihr bisheriges Monats- oder Jahresintervall unverändert bei.

## Nicht-Ziele

- Keine neue Admin-Oberfläche und kein vollautomatischer Ein-Klick-Korrekturprozess.
- Keine Änderung am Aufbau der Korrekturrechnung oder an der manuellen Versendung der Korrekturrechnung.
- Keine Änderung an Vertragslaufzeit, Kündigungsfrist, Leistungsumfang oder Umsatzsteuersatz.
- Keine Sonderlogik, die nur für Gemeinde Krailling oder Vertrag 242 gilt.

## Gewählter Ansatz

Der Rechnungslauf erhält eine gemeinsame Definition für abrechnungstakt-relevante Rechnungen: Korrekturrechnungen selbst sowie Originalrechnungen, zu denen eine Korrekturrechnung existiert, werden ausgeschlossen. Diese Definition wird sowohl für die Ermittlung der letzten Rechnung als auch für die Dublettenprüfung verwendet. Falls für denselben Stichtag bereits ein früherer Rechnungslauf-Claim existiert, bekommt die Ersatzrechnung einen an die konkrete Korrekturrechnung gebundenen Claim-Schlüssel.

Beim Ändern von `price` oder `interval` entfernt das Contract-Modell einen vorhandenen `data.pricing_snapshot`. Der Vertrag erhält zusätzlich einen expliziten Brutto-Rechnungsbetrag in `data.billing_total_gross_cents`, der im Admin neben dem Nettopreis gepflegt wird. Der Rechnungslauf erzeugt eine einzelne Netto-Position aus `contract.price` und `invoice_text`; wenn ein Brutto-Rechnungsbetrag hinterlegt ist, gilt dieser als verbindlich und die Umsatzsteuer wird als Differenz berechnet. Dadurch werden 463,87 EUR netto, 88,13 EUR Umsatzsteuer und 552,00 EUR brutto centgenau abgebildet.

## Verworfene Ansätze

- Eine neue Admin-Aktion könnte Korrektur, Vertragsänderung und Ersatzrechnung atomar erledigen, wäre für diesen klaren Ablauf aber unnötig groß und würde zusätzliche UI- und Berechtigungslogik erfordern.
- Eine einmalige Datenbankkorrektur für Vertrag 242 wäre schneller, ließe den Fehler aber für alle zukünftigen Fälle bestehen.

## Ablauf

1. Eine Korrekturrechnung wird wie bisher erstellt und manuell versendet.
2. Der Vertrag wird auf den korrekten Nettopreis, den verbindlichen Brutto-Rechnungsbetrag und das korrekte Intervall geändert; dabei wird der alte Preissnapshot entfernt.
3. Der nächste Rechnungslauf findet für den korrigierten Stichtag keine abrechnungstakt-relevante Rechnung.
4. Er erzeugt eine neue positive Rechnung mit Vertragszuordnung, ursprünglichem Stichtag und zehn Werktagen Zahlungsziel und versendet sie über den bestehenden Rechnungsversand.
5. Die Ersatzrechnung ist anschließend der neue Taktgeber; der nächste Jahreslauf liegt genau ein Jahr später.

## Sicherheit und Nachweis

- Regressionstests bilden Originalrechnung, Korrekturrechnung, Vertragsumstellung, Ersatzrechnung, erneuten Lauf und den folgenden Jahreslauf ab.
- Ein Test belegt, dass eine Änderung von Preis oder Intervall den alten Snapshot entfernt; eine fachfremde Vertragsänderung darf ihn nicht entfernen.
- Die vorhandenen Contract-Billing-Tests und die gesamte Testsuite müssen grün bleiben.
- Es sind keine Datenbankmigrationen vorgesehen.
- Produktivänderungen an Rechnung, Vertrag und E-Mail-Versand erfolgen erst nach Deployment, Sichtprüfung und einer ausdrücklichen Bestätigung direkt vor den finanziellen Aktionen.
