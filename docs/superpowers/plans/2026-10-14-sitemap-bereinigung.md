# Sitemap-Bereinigung Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Die crawlerbasierte Sitemap dauerhaft von nicht indexierbaren, doppelten und fehlerhaften URLs freihalten.

**Architecture:** Eine kleine `SitemapUrlPolicy` kapselt alle Crawl- und Aufnahmeentscheidungen und wird vom bestehenden CMS-Generator verwendet. `robots.txt` erhält ausschließlich die korrekte `.org`-Sitemap-Adresse.

**Tech Stack:** PHP 8.1+, Laravel 10, Spatie Laravel Sitemap 7, PHPUnit

**Spec:** `docs/superpowers/specs/2026-10-14-sitemap-bereinigung-design.md`

## Global Constraints

- Produktive Basis-URL ist `https://aktion-barrierefrei.org`.
- Keine Navigation, CMS-Inhalte, Slugs oder Weiterleitungen verändern.
- Keine neuen Abhängigkeiten einführen.
- Bestehende fremde Änderungen und ungetrackte Dateien unangetastet lassen.

## Review Focus

- Erlaubte Pfade mit Query oder Fragment werden ausgeschlossen.
- Authentifizierungs- und Verwaltungsrouten werden auch mit Unterpfaden ausgeschlossen.
- Nur Status 200 mit HTML-Inhalt wird aufgenommen.
- Beide Root-Schreibweisen ergeben exakt einen Eintrag mit abschließendem `/`.
- Normale öffentliche Seiten bleiben erlaubt.

---

### Task 1: URL-Regeln testgetrieben implementieren

**Files:**
- Create: `app/Services/SitemapUrlPolicy.php`
- Create: `tests/Unit/SitemapUrlPolicyTest.php`

**Interfaces:**
- Produces: `shouldCrawl(UriInterface $url): bool`
- Produces: `toSitemapUrl(Url $url, ?ResponseInterface $response): ?Url`

- [ ] Failing Tests für öffentliche, interne, Query-, Fragment- und fehlerhafte URLs schreiben.
- [ ] Mit `php artisan test tests/Unit/SitemapUrlPolicyTest.php` den erwarteten RED-Zustand prüfen.
- [ ] `shouldCrawl()` minimal implementieren.
- [ ] Failing Tests für Status, Content-Type und Root-Normalisierung ergänzen.
- [ ] `toSitemapUrl()` minimal implementieren und denselben Test grün ausführen.
- [ ] Änderungen committen.

### Task 2: CMS-Generator integrieren

**Files:**
- Modify: `app/Http/Controllers/PageController.php`
- Create: `tests/Unit/SitemapGeneratorConfigurationTest.php`

**Interfaces:**
- Consumes: beide Methoden aus `SitemapUrlPolicy`
- Produces: gefilterte Sitemap beim vorhandenen CMS-Button

- [ ] Failing Test für die Generator-Konfiguration schreiben und RED prüfen.
- [ ] Policy per Laravel-Container an `shouldCrawl()` und `hasCrawled()` anbinden.
- [ ] Generator- und Policy-Tests grün ausführen.
- [ ] Änderungen committen.

### Task 3: Robots-Datei korrigieren und gesamthaft prüfen

**Files:**
- Modify: `public/robots.txt`
- Create: `tests/Unit/RobotsTxtTest.php`

**Interfaces:**
- Produces: Sitemap-Hinweis `https://aktion-barrierefrei.org/sitemap.xml`

- [ ] Failing Test für `.org` statt `.de` schreiben und RED prüfen.
- [ ] `robots.txt` korrigieren und Test grün ausführen.
- [ ] Neue Unit-Tests sowie die Projekttests ausführen; unabhängige bestehende Fehler getrennt berichten.
- [ ] Änderungen committen und pushen.
- [ ] Nach Deployment Sitemap im CMS neu erzeugen und Live-XML kontrollieren.
