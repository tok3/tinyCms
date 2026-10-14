# Sitemap und Navigation „Soziale Träger“ – Design

## Ziel

Die öffentlich erreichbare Sitemap soll ausschließlich indexierbare, kanonische Seiten enthalten. Die neue Seite für soziale Träger wird als reguläres Handlungsfeld in die Hauptnavigation aufgenommen und erhält eine eindeutige kanonische URL.

## Navigation und kanonische URL

- Im CMS wird unter **Handlungsfelder** der Menüpunkt **Soziale Träger** angelegt.
- Er verweist auf die bereits veröffentlichte Seite mit dem Slug `barrierefreie-websites-fuer-soziale-traeger`.
- Die kanonische öffentliche Adresse lautet danach:
  `https://aktion-barrierefrei.org/handlungsfelder/barrierefreie-websites-fuer-soziale-traeger`
- Die bisherigen Root-Adressen werden dauerhaft auf diese Adresse umgeleitet:
  - `/barrierefreie-websites-fur-soziale-trager`
  - `/barrierefreie-websites-fuer-soziale-traeger`

Damit wird die Seite öffentlich auffindbar, in der Hauptnavigation sichtbar und beim nächsten Sitemap-Lauf automatisch gefunden, ohne unter mehreren URLs indexiert zu werden.

## Bereinigung der Sitemap-Erzeugung

Der bestehende crawlerbasierte Generator bleibt erhalten, erhält aber zentrale, testbare URL-Regeln.

Nicht aufgenommen werden:

- Authentifizierungs-, Konto-, Dashboard- und Administrationsseiten,
- URLs mit Query-Strings oder Fragmenten, insbesondere Preisfilter,
- nicht kanonische oder bekannte fehlerhafte Pfade,
- fehlgeschlagene beziehungsweise weiterleitende Antworten.

Die Startseite wird auf genau `https://aktion-barrierefrei.org/` normalisiert und darf nur einmal erscheinen. Die Basisadresse bleibt die produktive `.org`-Domain.

## Fehlerhafter Unternehmensseiten-Link

Der Link `/Barrierefrei-imWeb/uebersicht-barrierefreiheitsstaerkungsgesetz-bfsg` stammt aus dem Inhalt der veröffentlichten Unternehmensseite. Er wird im CMS an der Quelle auf `/Barrierefrei-im-Web/uebersicht-barrierefreiheitsstaerkungsgesetz-bfsg` korrigiert. Die Sitemap-Regeln verhindern zusätzlich, dass die fehlerhafte Variante erneut aufgenommen wird.

## Robots-Datei

`public/robots.txt` verweist auf:

`https://aktion-barrierefrei.org/sitemap.xml`

Die bisherige `.de`-Adresse wird entfernt.

## Absicherung und Rollout

Automatische Tests prüfen mindestens:

- Ausschluss von Login, Passwort-Reset, Admin/Dashboard und Query-URLs,
- Ausschluss des fehlerhaften Pfads,
- Erhalt normaler öffentlicher Seiten einschließlich „Soziale Träger“,
- einmalige, normalisierte Startseite,
- beide permanenten Weiterleitungen auf die kanonische Handlungsfeld-URL.

Nach lokaler Prüfung werden die Änderungen committed und gepusht. Nach dem Deployment werden Anwendungscaches geleert, die Sitemap im CMS neu erzeugt und die veröffentlichte XML-Datei sowie die Navigation kontrolliert.
