# Barrierefreiheitsatlas: öffentlicher Beitrag

## Ziel

Aktion Barrierefrei erhält einen niedrigschwelligen öffentlichen Meldeweg für digitale Barrieren. Der Einstieg soll auf der Startseite deutlich, aber nicht aufdringlich sichtbar sein. Die Kommunikation lädt zu einem konstruktiven Beitrag für einen „Barrierefreiheitsatlas im Web“ ein und vermeidet den Eindruck eines Beschwerde- oder „Petzportals“.

Ein Beitrag wird ausschließlich per E-Mail an `info@aktion-barrierefrei.org` gesendet. Es entsteht keine neue Datenbanktabelle und keine dauerhafte Speicherung im Projekt.

## Nutzererlebnis

### Einstieg auf der Startseite

Nur auf der Startseite erscheint unmittelbar unter der Hauptnavigation eine gelbe Atlas-Lasche, die optisch leicht in den dunkelblauen Hero hineinragt.

Die Lasche enthält:

- ein eigenständiges, dekoratives Globus-/Atlas-Symbol als eingebettetes SVG;
- den Haupttext „Ich bin betroffen“;
- den ergänzenden Text „Barriere melden“;
- ein sichtbares Pfeilsignal für den Link.

Gelb wird als kontrastreiche Aktionsfarbe verwendet; Text und Fokusdarstellung müssen mindestens WCAG AA erfüllen. Die Form lehnt sich mit weichen Radien, klarer Typografie und einer zurückhaltenden Bewegung an die bestehende Gestaltung an. Die Bewegung wird bei `prefers-reduced-motion: reduce` deaktiviert.

Auf großen Bildschirmen sitzt die Lasche rechts im Übergang von Navigation zu Hero. Auf kleinen Bildschirmen wird sie als kompakter, nahezu vollbreiter CTA am oberen Rand des Hero-Inhalts dargestellt. Sie darf weder Navigation noch Inhalt verdecken und bleibt ohne horizontales Scrollen nutzbar.

Der vollständige Linktext und ein aussagekräftiges `aria-label` machen Ziel und Aktion auch ohne die Illustration verständlich. Tastaturfokus ist deutlich sichtbar.

### Beitragsseite

Die neue öffentliche Seite liegt unter `/barrierefreiheitsatlas/beitrag` und verwendet denselben Header, Footer, dieselbe Typografie und dieselben Grundfarben wie die Website.

Der Kopfbereich verbindet einen dunkelblauen Hintergrund mit gelben Akzenten und einer größeren Atlas-/Globus-Illustration. Die Seite beginnt mit:

- Kennzeichnung: „Barrierefreiheitsatlas im Web“
- Überschrift: „Hilf uns, das Web zugänglicher zu machen.“
- Einführung: „Du bist auf eine digitale Barriere gestoßen? Teile sie mit uns. Dein Hinweis hilft uns dabei, Hindernisse sichtbar zu machen und an einem barrierefreieren Internet zu arbeiten.“

Eine kurze Dreierfolge erklärt den Ablauf ohne technischen Jargon:

1. Website nennen
2. Barriere beschreiben
3. Beitrag senden

Das Formular wird in einer hellen, klar abgegrenzten Karte dargestellt. Dekorative Elemente sind für assistive Technik verborgen.

## Formular

### Felder

1. **Webadresse** (`page_url`, erforderlich): vollständige HTTP- oder HTTPS-URL der betroffenen Seite, maximal 2048 Zeichen.
2. **Was hat nicht funktioniert?** (`body`, erforderlich): freie Beschreibung mit mindestens 10 und maximal 5000 Zeichen.
3. **Was hätte dir geholfen?** (`expected_help`, optional): ergänzender Lösungshinweis mit maximal 3000 Zeichen.
4. **E-Mail für Rückfragen** (`email`, optional): gültige E-Mail-Adresse mit maximal 254 Zeichen. Der Hilfetext erklärt, dass die Adresse nur für mögliche Rückfragen genutzt wird.
5. **Datenschutz** (`privacy_accepted`, erforderlich): Einwilligung in die Verarbeitung der Angaben zum Bearbeiten des Hinweises, mit Link auf `/privacy`.
6. **Website** (`website`, unsichtbarer Honeypot): bleibt für reguläre Nutzer leer.

Alle Pflichtfelder werden im Label textlich gekennzeichnet. Hinweise und Fehlermeldungen werden programmatisch mit den Eingaben verknüpft. Bereits eingegebene Werte bleiben nach einem Validierungsfehler erhalten.

Der primäre Button trägt den Text „Beitrag zum Atlas senden“.

### Erfolgszustand

Nach erfolgreichem Versand erfolgt ein Redirect zurück auf die Beitragsseite. Anstelle des Formulars erscheint eine fokussierbare Erfolgskarte mit der Botschaft:

> Danke, dass du uns hilfst, das Internet barrierefreier zu machen. Dein Hinweis ist bei uns angekommen und fließt in unsere Arbeit am Barrierefreiheitsatlas ein.

Darunter führen zwei Links zurück zur Startseite beziehungsweise zu einem neuen Beitrag.

## Technische Architektur

### Route und Controller

Ein eigener Controller stellt die Beitragsseite per GET bereit und verarbeitet das Formular per POST. Die Routen erhalten eindeutige Namen und werden vor den dynamischen CMS-Fallback-Routen registriert.

Die POST-Route wird auf zehn Versuche pro Minute und Client begrenzt. Der Controller prüft zuerst den Honeypot. Ein gefüllter Honeypot erzeugt denselben öffentlichen Erfolgszustand wie ein regulärer Beitrag, versendet aber keine Nachricht.

### Validierung

Ein eigener Form-Request kapselt Autorisierung, Regeln, deutsche Feldnamen und Fehlermeldungen. URLs sind ausschließlich mit `http` oder `https` zulässig. URL und Freitext werden nicht in Mail-Header übernommen. Die optionale E-Mail-Adresse wird nur nach erfolgreicher RFC-Prüfung als `replyTo` verwendet.

### E-Mail

Ein eigenes Mailable rendert eine HTML- und eine Textversion. Es enthält Webadresse, Beschreibung, optionalen Lösungshinweis, optionale Kontaktadresse und den Eingangszeitpunkt. Absender sind ausschließlich die Werte aus `config('mail.from')`; die optionale Nutzeradresse wird nur als `replyTo` gesetzt.

Der Empfänger ist über `config('mail.accessibility_atlas_recipient')` konfigurierbar und fällt auf `info@aktion-barrierefrei.org` zurück. So bleibt das Produktionsziel eindeutig, während Tests keine reale Zustellung auslösen.

Bei erfolgreicher Übergabe an Laravel Mail wird ein Session-Flag gesetzt und per Post/Redirect/Get zur Erfolgskarte weitergeleitet. Bei einem Mailfehler wird keine Erfolgsmeldung gezeigt; stattdessen erscheint eine freundliche, allgemeine Fehlermeldung mit der Bitte, es später erneut zu versuchen oder direkt an `info@aktion-barrierefrei.org` zu schreiben. Technische Details werden nur serverseitig protokolliert.

## Darstellung und Assets

Die Komponente für die Startseiten-Lasche und die Beitragsseite erhalten einen kleinen, klar benannten SCSS-Bereich im bestehenden Vite-Bundle. Das Globusmotiv wird als lokale, leichtgewichtige SVG-Datei angelegt und in beiden Ansichten wiederverwendet. Für das Feature werden keine neuen JavaScript- oder Drittanbieter-Abhängigkeiten eingeführt.

Die Gestaltung verwendet vorhandene Markenwerte als Basis:

- Primärblau: `#1121c2`
- Aktionsgelb: `#feaf2c`
- dunkle Flächen: bestehende dunkle Theme-Farben
- Schrift: bestehende Poppins-Konfiguration

Das Ergebnis muss bei 320 Pixel Breite, üblichen Tabletbreiten und Desktopdarstellung funktionieren. Vergrößerung bis 200 Prozent, Tastaturbedienung, sichtbare Fokuszustände, Fehlermeldungen und Kontraste werden berücksichtigt.

## Tests und Abnahme

Feature-Tests decken mindestens ab:

- Beitragsseite ist öffentlich erreichbar und enthält die zentrale Atlas-Botschaft.
- Startseite enthält die Atlas-Lasche, andere CMS-Seiten nicht.
- Gültige Pflichtangaben versenden genau eine E-Mail an den konfigurierten Empfänger und zeigen anschließend den Erfolgszustand.
- Die optionale Kontaktadresse wird als `replyTo`, niemals als Absender verwendet.
- Ein leerer oder ungültiger URL-Wert, zu kurze oder zu lange Texte und fehlende Datenschutzeinwilligung verhindern den Versand und erzeugen passende Feldfehler.
- Ein ausgefüllter Honeypot zeigt Erfolg, versendet aber keine E-Mail.
- Die POST-Route besitzt ein Rate-Limit.
- Ein Mailfehler wird ohne Datenverlust oder technische Details verständlich dargestellt.

Zusätzlich werden der Vite-Build, die vollständige bestehende Testsuite und eine visuelle Kontrolle bei mobiler und großer Ansichtsbreite ausgeführt.

## Nicht Bestandteil

- Speicherung der Beiträge in der Datenbank
- öffentlich sichtbare Atlas-Einträge oder eine Kartenansicht
- Anmeldung oder Benutzerkonto
- Dateiuploads oder Screenshots
- automatische Prüfung oder Bewertung der gemeldeten Website
- Benachrichtigungen an die Betreiber der gemeldeten Website
