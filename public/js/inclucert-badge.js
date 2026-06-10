// ── inclucert-badge.js ──────────────────────────────────────────────────────
//
// ════════════════════════════════════════════════════════════════════════════
// EINBINDUNG — drei Wege, alle funktionieren gleichzeitig
// ════════════════════════════════════════════════════════════════════════════
//
// ── WEG 1: Empfohlen für Entwickler / CMS-Admins mit Footer-Zugang ──────────
//
//   Schritt 1: Script EINMALIG im <head> oder vor </body> einbinden:
//
//     <script src="https://aktion-barrierefrei.org/js/inclucert-badge.js" defer></script>
//
//   Schritt 2: Badge-Tag beliebig oft im Seiteninhalt platzieren:
//
//     <inclucert-badge
//       data-ulid="DEINE-ULID-HIER"
//       data-appearance="full">
//     </inclucert-badge>
//
//   Verfügbare Varianten für data-appearance:
//     full     → Großes Badge mit Score, Status, QR-Code und Footer (Standard)
//     compact  → Schmaler Streifen, klappbar zum vollen Badge
//     minimal  → Kleine Karte mit QR-Code und Score
//     micro    → Einzeilige Pill mit Icon und Score, ideal für Navigation/Header
//
//   Verfügbare Themes für data-theme:
//     default  → Navy/Blau mit Gold (Standard, wird verwendet wenn nicht angegeben)
//     dark     → Alias für default, identisch
//     stealth  → Dunkelgrau, nur Gold-Akzente bleiben, Trend-Farben dezent
//     light    → Weiß/Hellgrau, dunkle Schrift, gedämpftes Gold
//     mono     → Komplett Graustufen, kein Farbakzent
//     auto     → Folgt prefers-color-scheme des OS (dark→default, light→light)
//               Wechselt live wenn der Nutzer das OS-Theme ändert
//
//   Mehrere Badges auf einer Seite sind kein Problem — API-Requests werden
//   pro ULID automatisch gecacht (nur ein Fetch pro ULID, egal wie viele Badges).
//
//
// ── WEG 2: Für Content-Editoren ohne Footer-Zugang (HTML-Block / Embed) ─────
//
//   In WordPress "Custom HTML"-Block, Webflow Embed-Widget, Jimdo HTML-Element
//   oder jedem anderen WYSIWYG-Editor mit HTML-Einbettung einfach einfügen:
//
//     <script
//       src="https://aktion-barrierefrei.org/js/inclucert-badge.js"
//       data-ulid="DEINE-ULID-HIER"
//       data-appearance="compact">
//     </script>
//
//   Das Script erkennt die eigenen data-Attribute und rendert das Badge
//   direkt an der Stelle des Script-Tags. Kein Admin-Zugang nötig.
//
//   Optional: Badge in ein bestimmtes Element einsetzen statt an Script-Position:
//
//     <script
//       src="https://aktion-barrierefrei.org/js/inclucert-badge.js"
//       data-ulid="DEINE-ULID-HIER"
//       data-appearance="full"
//       data-target="#mein-badge-container">
//     </script>
//
//     data-target akzeptiert jeden CSS-Selektor: "#id", ".klasse", "footer div" etc.
//
//
// ── WEG 3: Maximale Kompatibilität — nur ein <div> nötig ────────────────────
//
//   Wenn der Editor alle <script>- und Custom-Element-Tags herausfiltert,
//   reicht ein einfaches <div> mit data-Attributen. Das Script (per Weg 1
//   im Footer geladen) findet alle solchen Divs automatisch beim Seitenstart.
//
//   Script einmalig im Footer (von Admin, einmalig):
//
//     <script src="https://aktion-barrierefrei.org/js/inclucert-badge.js" defer></script>
//
//   Badge-Platzhalter im Content (vom Editor, kein Admin nötig):
//
//     <div
//       data-inclucert-ulid="DEINE-ULID-HIER"
//       data-inclucert-appearance="compact">
//     </div>
//
//   Der <div> wird beim Laden automatisch durch das fertige Badge ersetzt.
//   Ein normales <div> wird von keinem Editor gefiltert.
//
//
// ════════════════════════════════════════════════════════════════════════════
// ÜBERSICHT ALLER ATTRIBUTE
// ════════════════════════════════════════════════════════════════════════════
//
//   Attribut                      Werte / Beschreibung
//   ─────────────────────────────────────────────────────────────────────────
//   data-ulid                     Pflicht. Die ULID deines IncluCert-Eintrags.
//   data-inclucert-ulid           Gleichwertig, nur für Weg 3 (div-Variante).
//
//   data-appearance               full | compact | minimal | micro
//   data-inclucert-appearance     Gleichwertig, nur für Weg 3 (div-Variante).
//
//   data-theme                    default | dark | light | stealth | mono | auto
//   data-inclucert-theme          Gleichwertig, nur für Weg 3 (div-Variante).
//
//   data-target                   CSS-Selektor. Badge wird in dieses Element
//                                 eingefügt statt an die Script-Position.
//                                 Nur für Weg 2 (<script data-ulid>).
//                                 Beispiel: data-target="#footer-badge-wrap"
//
//   data-pulse                    Monitoring-Status als atmenden Dot anzeigen.
//                                 Standard: aus. Mit "true" aktivieren.
//                                 Beispiel: data-pulse="true"
//   data-inclucert-pulse          Gleichwertig, nur für Weg 3 (div-Variante).
//
// ════════════════════════════════════════════════════════════════════════════
// ℹ️  MONITORING-STATUS (Pulse-Dot)
// ════════════════════════════════════════════════════════════════════════════
//
//   Mit data-pulse="true" zeigt das Badge einen dezenten atmenden Punkt der
//   den aktuellen Monitoring-Status signalisiert:
//
//     🟢 grün (pulsierend)  → aktiv überwacht, letzter Scan ≤ 8 Tage
//     🟡 amber (pulsierend) → Scan überfällig, letzter Scan 8–14 Tage
//     ⚫ grau (statisch)    → inaktiv, letzter Scan > 14 Tage
//
//   Beispiel:
//     <inclucert-badge
//       data-ulid="DEINE-ULID-HIER"
//       data-appearance="compact"
//       data-pulse="true">
//     </inclucert-badge>
//
// ════════════════════════════════════════════════════════════════════════════
// ℹ️  BADGE IN BESTIMMTES ELEMENT EINSETZEN (data-target)
// ════════════════════════════════════════════════════════════════════════════
//
//   Mit data-target kann das Badge in ein beliebiges Element auf der Seite
//   eingefügt werden statt direkt an der Script-Position zu erscheinen.
//   Nützlich wenn das Script im <head> oder Footer steht, das Badge aber
//   an einer anderen Stelle erscheinen soll.
//
//   Schritt 1: Platzhalter-Element im HTML anlegen:
//     <div id="mein-badge"></div>
//
//   Schritt 2: data-target im Script-Tag angeben:
//     <script
//       src="https://aktion-barrierefrei.org/js/inclucert-badge.js"
//       data-ulid="DEINE-ULID-HIER"
//       data-appearance="full"
//       data-target="#mein-badge">
//     </script>
//
//   data-target akzeptiert jeden CSS-Selektor:
//     "#mein-badge"        → Element mit ID "mein-badge"
//     ".footer-badge"      → Element mit Klasse "footer-badge"
//     "footer .badge-wrap" → Element im Footer mit Klasse "badge-wrap"
//
// ════════════════════════════════════════════════════════════════════════════
//
// Monitoring-Status / Pulse-Dot:
//   Das Badge zeigt einen dezenten pulsierenden Punkt der den Monitoring-
//   Status signalisiert:
//     🟢 grün   → aktiv überwacht (letzter Scan ≤ 8 Tage)
//     🟡 amber  → Scan überfällig (letzter Scan 8–14 Tage)
//     ⚫ grau   → inaktiv / kein Scan (> 14 Tage)
//   Per data-pulse="true" kann der Dot deaktiviert werden.
//
// Technische Details:
//   - API-Responses werden pro ULID gecacht (ein Fetch, beliebig viele Badges)
//   - CSS wird nur einmal in den <head> injiziert, auch bei mehrfachem Laden
//   - Alle drei Wege können auf derselben Seite gleichzeitig verwendet werden
//   - Content Security Policy (CSP): falls Ihre Website eine strenge CSP hat,
//     muss aktion-barrierefrei.org als erlaubte Script-Quelle eingetragen werden.
//
// ────────────────────────────────────────────────────────────────────────────

(function () {
    'use strict';

  /*  const API_BASE   = 'http://localhost:8003/api/inclucert';
    const SHIELD_PATH = '/assets/img/produkte/inclu-cert-shield.svg';*/

    const scriptElement =
        document.currentScript ||
        document.querySelector('script[src*="inclucert-badge.js"]');

    const scriptUrl = new URL(scriptElement.src);

    const API_BASE = `${scriptUrl.origin}/api/inclucert`;
    const SHIELD_PATH = `${scriptUrl.origin}/assets/img/produkte/inclu-cert-shield.svg`;

    // ── CSS einmalig injizieren ───────────────────────────────────────────────
    if (!document.getElementById('akb-styles')) {
        const style = document.createElement('style');
        style.id = 'akb-styles';
        style.innerHTML = `
/* ── Pulse Dot ───────────────────────────────────────────────────────────── */
/* Nur Halo, kein ausgefüllter Dot — langsam atmend, sehr dezent             */
@keyframes akb-breathe {
    0%, 100% { box-shadow: 0 0 0 0 var(--akb-pulse-color, rgba(76,217,100,.5)); opacity: .9; }
    50%       { box-shadow: 0 0 0 4px var(--akb-pulse-color, rgba(76,217,100,0)); opacity: .6; }
}

.akb-pulse {
    display: inline-block;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
    animation: akb-breathe 3s ease-in-out infinite;
}

.akb-pulse-active  { background: #4cd964; --akb-pulse-color: rgba(76,217,100,.5); }
.akb-pulse-overdue { background: #f5a623; --akb-pulse-color: rgba(245,166,35,.5); }
.akb-pulse-inactive { background: #666; --akb-pulse-color: rgba(102,102,102,.3); animation: none; opacity: .5; }

/* ── Full Badge ──────────────────────────────────────────────────────────── */
.akb-badge {
    width: 300px;
    border-radius: 20px;
    background: linear-gradient(155deg,#010314 0%,#02082a 15%,#04124a 45%,#02072e 70%,#010314 100%);
    color: #fff;
    font-family: system-ui;
    padding: 16px;
    cursor: pointer;
    box-sizing: border-box;
    transition: transform .2s ease;
}
.akb-badge:hover { transform: translateY(-3px); }

/* ── Compact: Anchor + Strip + Panel ────────────────────────────────────── */
.akb-anchor {
    position: relative;
    display: inline-block;
}

.akb-strip {
    width: 260px;
    border-radius: 20px;
    background: linear-gradient(155deg,#010314 0%,#02082a 15%,#04124a 45%,#02072e 70%,#010314 100%);
    color: #fff;
    font-family: system-ui;
    padding: 10px 14px;
    cursor: pointer;
    box-sizing: border-box;
    transition: transform .15s ease, opacity .2s ease;
}
.akb-strip:hover { transform: translateY(-2px); }
.akb-anchor.akb-open .akb-strip { opacity: .4; }

.akb-panel {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
    width: 300px;
    opacity: 0;
    pointer-events: none;
    transform: rotateY(90deg) scale(.97);
    transform-origin: left center;
    transition: opacity .35s ease, transform .4s cubic-bezier(.4,0,.2,1);
    border-radius: 20px;
    background: linear-gradient(155deg,#010314 0%,#02082a 15%,#04124a 45%,#02072e 70%,#010314 100%);
    color: #fff;
    font-family: system-ui;
    padding: 16px;
    box-sizing: border-box;
    box-shadow: 0 8px 32px rgba(0,0,0,.55), 0 2px 8px rgba(0,0,0,.4);
}
.akb-anchor.akb-open .akb-panel {
    opacity: 1;
    pointer-events: auto;
    transform: rotateY(0deg) scale(1);
}

/* ── Compact Strip Innenleben ────────────────────────────────────────────── */
.akb-compact-row { display:flex; align-items:center; justify-content:space-between; gap:12px; }
.akb-compact-left { display:flex; align-items:center; gap:10px; }
.akb-compact-icon { width:32px; height:32px; color:#d4a62a; display:flex; flex-shrink:0; }
.akb-compact-icon svg { position:relative; top:-2px; width:100%; height:100%; }
.akb-compact-text { display:flex; flex-direction:column; line-height:1.1; }
.akb-compact-title { font-size:1em; font-weight:800; font-style:italic; }
.akb-compact-score {
    font-size:20px; font-weight:700;
    background:linear-gradient(180deg,#f7d37a,#d4a62a);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.akb-compact-score span { font-size:11px; opacity:.6; -webkit-text-fill-color:#fff; margin-left:2px; }
.akb-compact-right { display:flex; align-items:center; gap:8px; }
.akb-compact-qr { width:40px; border-radius:4px; background:#fff; padding:3px; display:block; }

/* ── Toggle / Close ──────────────────────────────────────────────────────── */
.akb-toggle {
    background:none; border:0; color:#fff;
    font-size:28px; line-height:18px; font-weight:bold; letter-spacing:1px;
    padding:0; cursor:pointer; opacity:.7; position:relative; right:-4px;
}
.akb-toggle-dots {
    margin-left:0; padding:0; position:relative; top:-5px; left:5px;
    width:1px; height:20px; display:flex; align-items:center; justify-content:center;
    border-radius:50%; color:#fff; font-size:24px; cursor:pointer; opacity:1; z-index:10;
}

/* ── Full / Panel Innenleben ─────────────────────────────────────────────── */
.akb-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; }
.akb-title-wrap { display:flex; align-items:center; gap:12px; margin-top:-10px; }
.akb-icon { width:55px; height:55px; color:#d4a62a; flex-shrink:0; }
.akb-icon svg { width:100%; height:100%; display:block; }
.akb-title-text { display:flex; flex-direction:column; }
.akb-title { font-size:1.5em; font-weight:800; font-style:italic; line-height:1; }
.akb-sub { font-size:11px; opacity:.7; white-space:nowrap; }

/* STATUS label mit Pulse-Dot */
.akb-label-row { display:flex; align-items:center; gap:5px; }

.akb-qr-wrap { background:#fff; border-radius:7px; padding:6px; }
.akb-qr { width:50px; display:block; }

.akb-main { position:relative; display:flex; justify-content:space-between; align-items:center; margin-top:5px; }
.akb-main::after {
    content:""; position:absolute; left:55%; top:8px; bottom:8px;
    width:1px; background:rgba(255,255,255,.12);
}
.akb-score-wrap, .akb-status-wrap { display:flex; flex-direction:column; }
.akb-status-wrap { text-align:right; }
.akb-label { font-size:11px; letter-spacing:1px; margin-bottom:4px; }
.akb-score {
    font-size:2.5em; font-weight:700; line-height:30px;
    background:linear-gradient(180deg,#f7d37a,#d4a62a);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.akb-score span { font-size:14px; opacity:.6; -webkit-text-fill-color:#fff; }
.akb-status { text-align:right; font-size:13px; max-width:140px; display:flex; flex-direction:column; align-items:flex-end; gap:2px; color:#fff; }
.akb-status-line { font-size:1.1em; display:flex; align-items:center; gap:4px; }
.akb-trend-icon { margin-left:4px; font-size:14px; color:#4cd964; }
.akb-status.down .akb-trend-icon { color:#ff5c5c; }
.akb-status.flat .akb-trend-icon { color:#aaa; }

/* ── Footer ──────────────────────────────────────────────────────────────── */
.akb-footer {
    position:relative; display:flex; justify-content:space-between;
    margin-top:10px; font-size:11px;
    background:linear-gradient(180deg,#f7f7f7,#ececec); color:#222;
    padding:10px 6px 8px 6px;
    margin-left:-16px; margin-right:-16px; margin-bottom:-16px;
    overflow:hidden; border-top:1px solid rgba(0,0,0,.06);
    border-bottom-left-radius:20px; border-bottom-right-radius:20px;
}
.akb-footer::before {
    content:""; position:absolute; top:-40px; left:0; width:100%; height:80px;
    background:inherit; border-bottom-left-radius:50% 100%; border-bottom-right-radius:50% 100%;
}
.akb-footer > * { position:relative; z-index:2; }
.akb-footer div { flex:1; text-align:center; }
.akb-footer div:not(:last-child) { border-right:1px solid rgba(0,0,0,.02); }
.akb-footer-line { display:flex; align-items:center; justify-content:center; gap:6px; }
.akb-footer-icon { width:14px; height:14px; display:inline-flex; align-items:center; justify-content:center; color:#666; }
.akb-footer-icon svg { width:100%; height:100%; }

/* ── Minimal (Mini-Karte) ────────────────────────────────────────────────── */
.akb-mini {
    width:150px !important; padding:14px 12px 0 12px !important;
    border-radius:18px !important; display:flex !important;
    flex-direction:column !important; align-items:center !important;
    gap:0 !important; cursor:pointer;
    transition:transform .2s ease, box-shadow .2s ease;
    box-shadow:0 4px 18px rgba(0,0,0,.45); overflow:hidden;
}
.akb-mini:hover { transform:translateY(-3px); box-shadow:0 8px 28px rgba(0,0,0,.6); }
.akb-mini-head { display:flex; flex-direction:column; align-items:center; gap:4px; width:100%; padding-bottom:8px; border-bottom:1px solid rgba(255,255,255,.08); }
.akb-mini-icon { width:38px; height:38px; color:#d4a62a; display:flex; flex-shrink:0; }
.akb-mini-icon svg { width:100%; height:100%; }
.akb-mini-name { font-size:1em; font-weight:800; font-style:italic; line-height:1; letter-spacing:-.3px; }
.akb-mini-sub { font-size:9px; opacity:.55; text-align:center; line-height:1.2; white-space:nowrap; }
.akb-mini-qr-wrap { background:#fff; border-radius:8px; padding:6px; margin:10px 0 8px; }
.akb-mini-qr { width:90px; display:block; }
.akb-mini-score-row { display:flex; align-items:baseline; gap:4px; margin-bottom:8px; }
.akb-mini-score {
    font-size:1.9em; font-weight:800; line-height:1;
    background:linear-gradient(180deg,#f7d37a,#d4a62a);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.akb-mini-score-max { font-size:11px; opacity:.45; -webkit-text-fill-color:#fff; color:#fff; }
.akb-mini-trend { font-size:13px; font-weight:700; margin-left:2px; }
.akb-mini-trend.up   { color:#4cd964; }
.akb-mini-trend.down { color:#ff5c5c; }
.akb-mini-trend.flat { color:#aaa; }
/* Pulse im minimal: neben dem Score */
.akb-mini-score-row .akb-pulse { margin-left:4px; align-self:center; }
.akb-mini-footer {
    width:calc(100% + 24px); margin-left:-12px;
    background:linear-gradient(180deg,#f0f0f0,#e4e4e4); color:#333;
    font-size:9px; text-align:center; padding:5px 8px 6px; line-height:1.35;
    font-weight:500; letter-spacing:.2px; border-top:1px solid rgba(0,0,0,.06);
}
.akb-mini-footer strong { display:block; font-size:10px; color:#111; }

/* ── Micro ───────────────────────────────────────────────────────────────── */
.akb-micro { padding:8px 12px !important; width:auto !important; display:inline-flex !important; align-items:center !important; }
.akb-micro-row { display:flex; align-items:center; gap:8px; }
.akb-micro-icon { width:22px; height:22px; color:#d4a62a; display:flex; }
.akb-micro-icon svg { width:100%; height:100%; }
.akb-micro-score {
    font-size:14px; font-weight:700;
    background:linear-gradient(180deg,#f7d37a,#d4a62a);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.akb-micro-score span { font-size:10px; opacity:.6; -webkit-text-fill-color:#fff; margin-left:2px; }
.akb-micro-trend { font-size:12px; margin-left:2px; }
.akb-micro-trend.up   { color:#4cd964; }
.akb-micro-trend.down { color:#ff5c5c; }
.akb-micro-trend.flat { color:#aaa; }

/* ── stealth theme ───────────────────────────────────────────────────────── */
.akb-theme-stealth.akb-badge,
.akb-theme-stealth.akb-strip,
.akb-theme-stealth.akb-panel {
    background: linear-gradient(155deg,#1c1c1c 0%,#242424 40%,#1e1e1e 100%) !important;
    color: #c8c8c8 !important;
    box-shadow: 0 8px 32px rgba(0,0,0,.6), 0 2px 8px rgba(0,0,0,.4);
}
.akb-theme-stealth .akb-compact-icon,
.akb-theme-stealth .akb-icon,
.akb-theme-stealth .akb-mini-icon,
.akb-theme-stealth .akb-micro-icon { color: #d4a62a; }
.akb-theme-stealth .akb-compact-score,
.akb-theme-stealth .akb-score,
.akb-theme-stealth .akb-mini-score,
.akb-theme-stealth .akb-micro-score {
    background: linear-gradient(180deg,#f7d37a,#d4a62a);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.akb-theme-stealth .akb-compact-score span,
.akb-theme-stealth .akb-score span,
.akb-theme-stealth .akb-mini-score-max,
.akb-theme-stealth .akb-micro-score span { -webkit-text-fill-color: #aaa; color: #aaa; }
.akb-theme-stealth .akb-footer { background: linear-gradient(180deg,#2e2e2e,#282828); color: #aaa; border-top: 1px solid rgba(255,255,255,.05); }
.akb-theme-stealth .akb-footer strong { color: #d0d0d0; }
.akb-theme-stealth .akb-footer-icon { color: #777; }
.akb-theme-stealth .akb-mini-footer { background: linear-gradient(180deg,#2e2e2e,#282828); color: #aaa; border-top: 1px solid rgba(255,255,255,.05); }
.akb-theme-stealth .akb-mini-footer strong { color: #d0d0d0; }
.akb-theme-stealth .akb-mini-head { border-bottom: 1px solid rgba(255,255,255,.07); }
.akb-theme-stealth .akb-main::after { background: rgba(255,255,255,.08); }
.akb-theme-stealth .akb-trend-icon,
.akb-theme-stealth .akb-mini-trend.up,
.akb-theme-stealth .akb-micro-trend.up   { color: #7aad7a; }
.akb-theme-stealth .akb-status.down .akb-trend-icon,
.akb-theme-stealth .akb-mini-trend.down,
.akb-theme-stealth .akb-micro-trend.down { color: #ad7a7a; }
.akb-theme-stealth .akb-status.flat .akb-trend-icon,
.akb-theme-stealth .akb-mini-trend.flat,
.akb-theme-stealth .akb-micro-trend.flat { color: #666; }
.akb-theme-stealth .akb-toggle,
.akb-theme-stealth .akb-toggle-dots { color: #aaa; }

/* ── dark (Alias für default) ────────────────────────────────────────────── */
.akb-theme-dark.akb-badge,
.akb-theme-dark.akb-strip,
.akb-theme-dark.akb-panel { /* inherits default styles */ }

/* ── light theme ─────────────────────────────────────────────────────────── */
.akb-theme-light.akb-badge,
.akb-theme-light.akb-strip,
.akb-theme-light.akb-panel {
    background: linear-gradient(155deg,#f8f9fc 0%,#eef0f7 40%,#f4f5fb 100%) !important;
    color: #1a1f36 !important;
    box-shadow: 0 8px 32px rgba(100,120,180,.15), 0 2px 8px rgba(100,120,180,.08);
}
.akb-theme-light .akb-compact-icon,
.akb-theme-light .akb-icon,
.akb-theme-light .akb-mini-icon,
.akb-theme-light .akb-micro-icon { color: #b87800; }
.akb-theme-light .akb-compact-score,
.akb-theme-light .akb-score,
.akb-theme-light .akb-mini-score,
.akb-theme-light .akb-micro-score { background: linear-gradient(180deg,#c8900a,#9a6800); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.akb-theme-light .akb-compact-score span,
.akb-theme-light .akb-score span,
.akb-theme-light .akb-mini-score-max,
.akb-theme-light .akb-micro-score span { -webkit-text-fill-color: #555; color: #555; }
.akb-theme-light .akb-compact-title { color: #1a1f36; }
.akb-theme-light .akb-title { color: #1a1f36; }
.akb-theme-light .akb-sub { color: rgba(26,31,54,.5); }
.akb-theme-light .akb-label { color: rgba(26,31,54,.5); }
.akb-theme-light .akb-status { color: #1a1f36; }
.akb-theme-light .akb-mini-name { color: #1a1f36; }
.akb-theme-light .akb-mini-sub { color: rgba(26,31,54,.45); }
.akb-theme-light .akb-qr-wrap,
.akb-theme-light .akb-mini-qr-wrap { background: #e8eaf2; }
.akb-theme-light .akb-main::after { background: rgba(26,31,54,.12); }
.akb-theme-light .akb-footer { background: linear-gradient(180deg,#e4e7f2,#d8dcee); color: #2a2f4a; border-top: 1px solid rgba(0,0,0,.08); }
.akb-theme-light .akb-footer strong { color: #0d1020; }
.akb-theme-light .akb-footer-icon { color: #555a7a; }
.akb-theme-light .akb-mini-footer { background: linear-gradient(180deg,#e4e7f2,#d8dcee); color: #2a2f4a; border-top: 1px solid rgba(0,0,0,.08); }
.akb-theme-light .akb-mini-footer strong { color: #0d1020; }
.akb-theme-light .akb-mini-head { border-bottom: 1px solid rgba(26,31,54,.12); }
.akb-theme-light .akb-trend-icon,
.akb-theme-light .akb-mini-trend.up,
.akb-theme-light .akb-micro-trend.up   { color: #1a9e3f; }
.akb-theme-light .akb-status.down .akb-trend-icon,
.akb-theme-light .akb-mini-trend.down,
.akb-theme-light .akb-micro-trend.down { color: #d42b2b; }
.akb-theme-light .akb-status.flat .akb-trend-icon,
.akb-theme-light .akb-mini-trend.flat,
.akb-theme-light .akb-micro-trend.flat { color: #888; }
.akb-theme-light .akb-toggle,
.akb-theme-light .akb-toggle-dots { color: #1a1f36; }

/* ── mono theme ──────────────────────────────────────────────────────────── */
.akb-theme-mono.akb-badge,
.akb-theme-mono.akb-strip,
.akb-theme-mono.akb-panel {
    background: linear-gradient(155deg,#1a1a1a 0%,#222 40%,#1e1e1e 100%) !important;
    color: #c0c0c0 !important;
    box-shadow: 0 8px 32px rgba(0,0,0,.6), 0 2px 8px rgba(0,0,0,.4);
}
.akb-theme-mono .akb-compact-icon,
.akb-theme-mono .akb-icon,
.akb-theme-mono .akb-mini-icon,
.akb-theme-mono .akb-micro-icon { color: #909090; }
.akb-theme-mono .akb-compact-score,
.akb-theme-mono .akb-score,
.akb-theme-mono .akb-mini-score,
.akb-theme-mono .akb-micro-score { background: linear-gradient(180deg,#e0e0e0,#aaa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.akb-theme-mono .akb-compact-score span,
.akb-theme-mono .akb-score span,
.akb-theme-mono .akb-mini-score-max,
.akb-theme-mono .akb-micro-score span { -webkit-text-fill-color: #888; color: #888; }
.akb-theme-mono .akb-main::after { background: rgba(255,255,255,.07); }
.akb-theme-mono .akb-footer { background: linear-gradient(180deg,#2a2a2a,#242424); color: #999; border-top: 1px solid rgba(255,255,255,.05); }
.akb-theme-mono .akb-footer strong { color: #ccc; }
.akb-theme-mono .akb-footer-icon { color: #666; }
.akb-theme-mono .akb-mini-footer { background: linear-gradient(180deg,#2a2a2a,#242424); color: #999; border-top: 1px solid rgba(255,255,255,.05); }
.akb-theme-mono .akb-mini-footer strong { color: #ccc; }
.akb-theme-mono .akb-mini-head { border-bottom: 1px solid rgba(255,255,255,.07); }
.akb-theme-mono .akb-trend-icon,
.akb-theme-mono .akb-mini-trend.up,
.akb-theme-mono .akb-micro-trend.up,
.akb-theme-mono .akb-status.down .akb-trend-icon,
.akb-theme-mono .akb-mini-trend.down,
.akb-theme-mono .akb-micro-trend.down,
.akb-theme-mono .akb-status.flat .akb-trend-icon,
.akb-theme-mono .akb-mini-trend.flat,
.akb-theme-mono .akb-micro-trend.flat { color: #777; }
.akb-theme-mono .akb-toggle,
.akb-theme-mono .akb-toggle-dots { color: #888; }

        `;
        document.head.appendChild(style);
    }

    // ── Icons ─────────────────────────────────────────────────────────────────
    const ICONS = {
        calendar: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"/></svg>`,
        shield:   `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>`,
        external: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>`
    };

    // ── Caches ────────────────────────────────────────────────────────────────
    const _dataCache   = {};
    let   _shieldCache = null;

    function fetchData(ulid) {
        if (!_dataCache[ulid]) {
            _dataCache[ulid] = fetch(`${API_BASE}/${ulid}`)
                .then(r => r.json())
                .catch(() => null);
        }
        return _dataCache[ulid];
    }

    function fetchShield() {
        if (!_shieldCache) {
            _shieldCache = fetch(SHIELD_PATH)
                .then(r => r.text())
                .catch(() => '');
        }
        return _shieldCache;
    }

    // ── Pulse-Dot Helper ──────────────────────────────────────────────────────
    function pulseHTML(monitoringStatus) {
        const cls = monitoringStatus === 'active'  ? 'akb-pulse-active'  :
            monitoringStatus === 'overdue' ? 'akb-pulse-overdue' :
                'akb-pulse-inactive';
        return `<span class="akb-pulse ${cls}"></span>`;
    }

    // ── Full-View HTML ────────────────────────────────────────────────────────
    function fullViewHTML(data, trendKey, trendSymbol, withClose, noPulse) {
        const dot = noPulse ? '' : pulseHTML(data.monitoring_status);
        return `
        <div class="akb-header">
            <div class="akb-title-wrap">
                <span class="akb-icon">${data._shield}</span>
                <div class="akb-title-text">
                    <div class="akb-title"><b>Inclu</b>Cert</div>
                    <div class="akb-sub">Aktiv barrierefrei</div>
                </div>
            </div>
            <div style="display:flex;align-items:flex-start;gap:4px;">
                <div class="akb-qr-wrap">
                    <img src="${data.qr}" class="akb-qr" alt="QR-Code">
                </div>
                ${withClose ? '<button class="akb-toggle akb-toggle-dots" aria-label="Schließen">⋮</button>' : ''}
            </div>
        </div>
        <div class="akb-main">
            <div class="akb-score-wrap">
                <div class="akb-label">WERTUNG</div>
                <div class="akb-score">${data.score}<span>/100</span></div>
            </div>
            <div class="akb-status-wrap">
                <div class="akb-label">
                    <span class="akb-label-row">${dot} STATUS</span>
                </div>
                <div class="akb-status ${trendKey}">
                    <div class="akb-status-line">
                        ${data.trend_label}
                        <span class="akb-trend-icon">${trendSymbol}</span>
                    </div>
                    <small>${data.trend >= 0 ? '+' : ''}${data.trend} Punkte</small>
                </div>
            </div>
        </div>
        <div class="akb-footer">
            <div>
                <div class="akb-footer-line">
                    <span class="akb-footer-icon">${ICONS.calendar}</span>
                    <span>geprüft am</span>
                </div>
                <strong>${data.last_scan}</strong>
            </div>
            <div>
                <div class="akb-footer-line">
                    <span class="akb-footer-icon">${ICONS.shield}</span>
                    <span>Standard</span>
                </div>
                <strong>WCAG 2.1</strong>
            </div>
            <div>
                <div class="akb-footer-line">
                    <span class="akb-footer-icon">${ICONS.external}</span>
                    <span>Details</span>
                </div>
                <strong>inclucert</strong>
            </div>
        </div>`;
    }

    // ── Badge rendern ─────────────────────────────────────────────────────────
    async function renderBadge(ulid, appearance, theme, noPulse, targetEl) {
        const [data, shield] = await Promise.all([fetchData(ulid), fetchShield()]);

        if (!data || data.status !== 'active') return;

        const themeClass = (theme && theme !== 'default') ? ` akb-theme-${theme}` : '';
        const dot = noPulse ? '' : pulseHTML(data.monitoring_status);

        let trendKey = 'flat';
        if (data.trend >  3) trendKey = 'up';
        if (data.trend < -3) trendKey = 'down';
        let trendSymbol = '→';
        if (trendKey === 'up')   trendSymbol = '↗';
        if (trendKey === 'down') trendSymbol = '↘';

        data._shield = shield;

        let root;

        // ── micro ─────────────────────────────────────────────────────────────
        if (appearance === 'micro') {
            root = document.createElement('div');
            root.className = `akb-badge akb-micro${themeClass}`;
            root.innerHTML = `
                <div class="akb-micro-row">
                    <span class="akb-micro-icon">${shield}</span>
                    <div class="akb-micro-score">${data.score}<span>/100</span></div>
                    <span class="akb-micro-trend ${trendKey}">${trendSymbol}</span>
                    ${dot}
                </div>`;
            root.addEventListener('click', () => window.open(data.url, '_blank'));

            // ── minimal ───────────────────────────────────────────────────────────
        } else if (appearance === 'minimal') {
            root = document.createElement('div');
            root.className = `akb-badge akb-mini${themeClass}`;
            root.innerHTML = `
                <div class="akb-mini-head">
                    <span class="akb-mini-icon">${shield}</span>
                    <div class="akb-mini-name"><b>Inclu</b>Cert</div>
                    <div class="akb-mini-sub">Aktiv barrierefrei</div>
                </div>
                <div class="akb-mini-qr-wrap">
                    <img src="${data.qr}" class="akb-mini-qr" alt="QR-Code">
                </div>
                <div class="akb-mini-score-row">
                    <span class="akb-mini-score">${data.score}</span>
                    <span class="akb-mini-score-max">/100</span>
                    <span class="akb-mini-trend ${trendKey}">${trendSymbol}</span>
                    ${dot}
                </div>
                <div class="akb-mini-footer">
                    <span>Nachweis</span>
                    <strong>anzeigen →</strong>
                </div>`;
            root.addEventListener('click', () => window.open(data.url, '_blank'));

            // ── compact ───────────────────────────────────────────────────────────
        } else if (appearance === 'compact') {
            root = document.createElement('div');
            root.className = `akb-anchor${themeClass}`;

            const strip = document.createElement('div');
            strip.className = `akb-strip${themeClass}`;
            strip.innerHTML = `
                <div class="akb-compact-row">
                    <div class="akb-compact-left">
                        <span class="akb-compact-icon">${shield}</span>
                        <div class="akb-compact-text">
                            <div class="akb-compact-title"><b>Inclu</b>Cert</div>
                            <div style="display:flex;align-items:center;gap:5px;">
                                <div class="akb-compact-score">${data.score}<span>/100</span></div>
                                ${dot}
                            </div>
                        </div>
                    </div>
                    <div class="akb-compact-right">
                        <img src="${data.qr}" class="akb-compact-qr" alt="QR">
                        <button class="akb-toggle" aria-label="Details anzeigen">⋮</button>
                    </div>
                </div>`;

            const panel = document.createElement('div');
            panel.className = `akb-panel${themeClass}`;
            panel.innerHTML = fullViewHTML(data, trendKey, trendSymbol, true, noPulse);

            root.appendChild(strip);
            root.appendChild(panel);

            strip.querySelector('.akb-toggle').addEventListener('click', e => {
                e.stopPropagation();
                root.classList.toggle('akb-open');
            });
            panel.querySelector('.akb-toggle').addEventListener('click', e => {
                e.stopPropagation();
                root.classList.remove('akb-open');
            });
            strip.addEventListener('click', e => {
                if (e.target.closest('.akb-toggle')) return;
                window.open(data.url, '_blank');
            });
            panel.addEventListener('click', e => {
                if (e.target.closest('.akb-toggle')) return;
                window.open(data.url, '_blank');
            });
            document.addEventListener('click', e => {
                if (!root.contains(e.target)) root.classList.remove('akb-open');
            }, true);

            // ── full (default) ────────────────────────────────────────────────────
        } else {
            root = document.createElement('div');
            root.className = `akb-badge${themeClass}`;
            root.innerHTML = fullViewHTML(data, trendKey, trendSymbol, false, noPulse);
            root.addEventListener('click', () => window.open(data.url, '_blank'));
        }

        targetEl.replaceWith(root);

        // Visit melden — URL ins Monitoring aufnehmen falls noch nicht drin
        fetch(`${API_BASE}/${ulid}/visit`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ url: window.location.href })
        }).catch(() => {});
    }

    // ── Custom Element ────────────────────────────────────────────────────────
    class IncluCertBadge extends HTMLElement {
        connectedCallback() {
            const ulid       = this.dataset.ulid;
            const appearance = this.dataset.appearance || 'full';
            const theme      = this.dataset.theme      || 'default';
            const noPulse    = this.dataset.pulse !== "true";
            if (!ulid) {
                console.warn('IncluCert: data-ulid fehlt');
                return;
            }
            renderBadge(ulid, appearance, theme, noPulse, this);
        }
    }

    if (!customElements.get('inclucert-badge')) {
        customElements.define('inclucert-badge', IncluCertBadge);
    }

    // ── Weg 3: div-Scanner ────────────────────────────────────────────────────
    function scanDivPlaceholders() {
        document.querySelectorAll('[data-inclucert-ulid]').forEach(el => {
            const ulid       = el.dataset.inclucertUlid;
            const appearance = el.dataset.inclucertAppearance || 'full';
            const theme      = el.dataset.inclucertTheme      || 'default';
            const noPulse    = el.dataset.inclucertPulse !== "true";
            if (ulid) renderBadge(ulid, appearance, theme, noPulse, el);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', scanDivPlaceholders);
    } else {
        scanDivPlaceholders();
    }

    // ── Weg 2: <script data-ulid="..."> ──────────────────────────────────────
    const self = document.currentScript;
    if (self && self.dataset.ulid) {
        const ulid       = self.dataset.ulid;
        const appearance = self.dataset.appearance || 'full';
        const theme      = self.dataset.theme      || 'default';
        const noPulse    = self.dataset.pulse !== "true";
        const targetSel  = self.dataset.target;

        const placeholder = document.createElement('inclucert-badge');
        placeholder.dataset.ulid        = ulid;
        placeholder.dataset.appearance  = appearance;
        placeholder.dataset.theme       = theme;


        if (targetSel) {
            const targetEl = document.querySelector(targetSel);
            if (targetEl) {
                targetEl.appendChild(placeholder);
            } else {
                console.warn(`IncluCert: data-target "${targetSel}" nicht gefunden — Badge wird an Script-Position eingefügt.`);
                self.before(placeholder);
            }
        } else {
            self.before(placeholder);
        }
    }

})();
