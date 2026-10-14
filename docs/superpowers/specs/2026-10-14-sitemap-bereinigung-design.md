# Sitemap-Bereinigung – Design

## Ziel

Die automatisch erzeugte Sitemap enthält ausschließlich öffentliche, indexierbare und eindeutige URLs der produktiven `.org`-Website.

## Umfang

- Login-, Passwort-, Konto-, Dashboard- und Admin-URLs ausschließen.
- URLs mit Query-String oder Fragment ausschließen.
- Den bekannten fehlerhaften Pfad `/Barrierefrei-imWeb/...` ausschließen.
- Nur erfolgreiche HTML-Antworten aufnehmen.
- Die Startseite auf genau `https://aktion-barrierefrei.org/` normalisieren und nur einmal ausgeben.
- `public/robots.txt` auf `https://aktion-barrierefrei.org/sitemap.xml` korrigieren.
- Den bisherigen crawlerbasierten CMS-Generator beibehalten und seine Regeln automatisiert testen.

## Nicht Bestandteil

Navigation, CMS-Menüpunkte, Seiteninhalte, Slugs und Weiterleitungen werden nicht verändert.

## Rollout

Nach Tests werden die lokalen Änderungen committed und gepusht. Nach dem Deployment wird die Sitemap im CMS einmal neu erzeugt und die veröffentlichte XML-Datei kontrolliert.
