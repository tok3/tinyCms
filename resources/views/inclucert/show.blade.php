<x-page-layout>

    @php
        $trendKey    = $metrics['trend_diff'] > 3 ? 'up' : ($metrics['trend_diff'] < -3 ? 'down' : 'flat');
        $trendSymbol = $trendKey === 'up' ? '↗' : ($trendKey === 'down' ? '↘' : '→');
        $trendColor  = $trendKey === 'up' ? '#1a9e3f' : ($trendKey === 'down' ? '#d42b2b' : '#888');
    @endphp

    <style>
        /* ── IncluCert Public Page ─────────────────────────────────────────────── */
        .ic-hero {
            background: linear-gradient(150deg, #010314 0%, #021030 50%, #010a22 100%);

            padding: 56px 0 72px;
            padding-top: calc(var(--navbar-height, 64px) + 40px);
            position: relative;
            overflow: hidden;
        }
        .ic-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,.035) 1px, transparent 1px);
            background-size: 30px 30px;
            pointer-events: none;
        }
        .ic-hero::before {
            content: '';
            position: absolute;
            top: -120px; right: -60px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(212,166,42,.06) 0%, transparent 60%);
            pointer-events: none;
        }
        .ic-hero-z { position: relative; z-index: 2; }

        .ic-live-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(212,166,42,.1);
            border: 1px solid rgba(212,166,42,.2);
            color: #f7d37a;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding: 4px 11px;
            border-radius: 20px;
            margin-bottom: 14px;
        }
        .ic-live-dot {
            width: 5px; height: 5px;
            background: #4cd964;
            border-radius: 50%;
            animation: ic-blink 2s infinite;
        }
        @keyframes ic-blink { 0%,100%{opacity:1} 50%{opacity:.25} }

        .ic-hero-company {
            font-size: clamp(1.5rem, 3.5vw, 2.2rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -.02em;
            margin-bottom: 6px;
        }
        .ic-hero-sub {
            font-size: 13px;
            color: rgba(255,255,255,.38);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        /* Score */
        .ic-score-row {
            display: flex;
            align-items: center;
            gap: 0;
            flex-wrap: wrap;
        }
        .ic-score-num {
            font-size: 3.6rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -.04em;
            background: linear-gradient(175deg, #f7d37a, #c8880a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 6px;
        }
        .ic-score-denom {
            font-size: 1rem;
            color: rgba(255,255,255,.25);
            align-self: flex-end;
            margin-bottom: 8px;
            margin-right: 20px;
        }
        .ic-score-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
            border-left: 1px solid rgba(255,255,255,.1);
            padding-left: 18px;
        }
        .ic-score-trend { font-size: 13px; font-weight: 700; }
        .ic-score-period { font-size: 11px; color: rgba(255,255,255,.28); }

        /* Progress */
        .ic-progress {
            height: 3px;
            background: rgba(255,255,255,.07);
            border-radius: 2px;
            margin-top: 18px;
            max-width: 320px;
        }
        .ic-progress-fill {
            height: 100%;
            width: {{ $metrics['current_score'] }}%;
            background: linear-gradient(90deg, #c8880a, #f7d37a);
            border-radius: 2px;
        }

        /* QR */
        .ic-qr {
            background: #fff;
            border-radius: 10px;
            padding: 8px;
            display: inline-block;
            box-shadow: 0 4px 16px rgba(0,0,0,.2);
        }
        .ic-qr img { width: 90px; display: block; }
        .ic-qr-label { font-size: 10px; color: rgba(255,255,255,.2); text-align: center; margin-top: 6px; }

        /* ── Body ────────────────────────────────────────────────────────────────── */
        .ic-body { padding: 40px 0 60px; }

        /* Metrics row */
        .ic-metrics-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: rgba(0,0,0,.07);
            border: 1px solid rgba(0,0,0,.07);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 16px;
        }
        .ic-metric {
            background: #fff;
            padding: 18px 20px;
        }
        .ic-metric-val {
            font-size: 1.7rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -.02em;
            margin-bottom: 3px;
        }
        .ic-metric-lbl {
            font-size: 10.5px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 500;
        }
        @media(max-width:640px) {
            .ic-metrics-row { grid-template-columns: 1fr 1fr; }
        }

        /* Note */
        .ic-note {
            background: #f2f6ff;
            border: 1px solid rgba(23,139,255,.1);
            border-radius: 8px;
            padding: 11px 16px;
            font-size: 12px;
            color: #4a5a8a;
            line-height: 1.6;
        }
        .ic-note a { color: #178bff; font-weight: 600; text-decoration: none; }
        .ic-note a:hover { text-decoration: underline; }

        /* Chart */
        .ic-chart-wrap {
            background: #fff;
            border: 1px solid rgba(0,0,0,.07);
            border-radius: 12px;
            padding: 20px;
            margin-top: 24px;
        }
        .ic-chart-wrap img { width: 100%; display: block; border-radius: 4px; }

        /* Section heading */
        .ic-sh {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #bbb;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .ic-sh::after { content:''; flex:1; height:1px; background:rgba(0,0,0,.06); }

        /* Certificate — compact two-column */
        .ic-cert-wrap {
            margin-top: 24px;
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 0;
            border: 1px solid rgba(0,0,0,.07);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }
        @media(max-width:768px) {
            .ic-cert-wrap { grid-template-columns: 1fr; }
        }
        #ic-cert-img {
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7f8fb;
        }
        #ic-cert-img img { width: 100%; display: block; }
        .ic-cert-sidebar {
            border-left: 1px solid rgba(0,0,0,.06);
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #fafbfc;
        }
        .ic-cert-sidebar-title {
            font-size: 12px;
            font-weight: 700;
            color: #333;
            margin-bottom: 4px;
        }
        .ic-cert-sidebar-sub {
            font-size: 11px;
            color: #999;
            line-height: 1.5;
        }
        .ic-cert-dl-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: linear-gradient(135deg, #d4a62a, #f7d37a);
            color: #010314 !important;
            font-weight: 700;
            font-size: 13px;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: opacity .15s;
        }
        .ic-cert-dl-btn:hover { opacity: .9; }
        .ic-cert-url-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #fff;
            color: #555 !important;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid rgba(0,0,0,.1);
            transition: background .15s;
        }
        .ic-cert-url-btn:hover { background: #f5f5f5; color: #333 !important; }

        /* CTA */
        .ic-cta-strip {
            background: linear-gradient(150deg, #010314 0%, #021030 50%, #010a22 100%);
            border-radius: 14px;
            padding: 32px 36px;
            margin-top: 32px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.06);
        }
        .ic-cta-strip::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(212,166,42,.08) 0%, transparent 70%);
        }
        .ic-cta-inner { position: relative; z-index: 2; }
        .ic-cta-strip h3 { font-size: 1.15rem; font-weight: 800; color: #fff; margin-bottom: 6px; line-height: 1.3; }
        .ic-cta-strip h3 em { font-style: normal; background: linear-gradient(90deg,#f7d37a,#d4a62a); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
        .ic-cta-strip p { color: rgba(255,255,255,.45); font-size: 13px; line-height: 1.6; margin-bottom: 0; }
        .ic-cta-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #d4a62a, #f7d37a);
            color: #010314 !important;
            font-weight: 700;
            font-size: 13px;
            padding: 11px 22px;
            border-radius: 10px;
            text-decoration: none;
            white-space: nowrap;
            transition: transform .15s, box-shadow .15s;
        }
        .ic-cta-link:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(212,166,42,.22); }
    </style>

    {{-- ── HERO ── --}}
    <section class="position-relative bg-gradient-dark-night text-white no-hyphen">
        <div class="container pt-10 pb-3 pb-lg-5 position-relative z-2">
            <div class="row pb-0 pt-lg-5 align-items-center">

                <div class="col-12 col-lg-7 mb-5 mb-lg-0">

                    <div class="ic-live-pill mb-3">
                        <span class="ic-live-dot"></span>
                        Kontinuierlich geprüft · Live-Nachweis
                    </div>

                    <h2 class="h2 display-4 mb-4">
                        <span style="font-size: 53px;">
                            Barrierefreiheit sichtbar machen.
                        </span>
                    </h2>

                    <p class="mb-6 lead text-white">
                        IncluCert dokumentiert den Fortschritt der digitalen Barrierefreiheit
                        und stellt einen öffentlich einsehbaren Nachweis bereit. Ihre Website wird
                        kontinuierlich geprüft, Verbesserungen werden festgehalten und transparent dargestellt.
                    </p>

                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <span>✔ Laufende WCAG-Prüfung</span>
                        <span>✔ Dokumentierter Fortschritt</span>
                        <span>✔ Öffentlicher Nachweis</span>
                    </div>

                </div>

                <div class="col-lg-4 ms-auto d-flex justify-content-lg-end">

                    <div style="max-width:420px; width:100%;">
                        <div id="ic-cert-img" style="border-radius:14px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,.35); background:#fff;">
                            <span style="display:block; padding:40px; text-align:center; color:#aaa; font-size:12px;">
                                Zertifikat wird geladen…
                            </span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- ── BODY ── --}}
    <div class="ic-body">
        <div class="container">


            {{-- Zertifikat --}}
            <div style="margin-top:32px;">
                <div class="ic-sh">PoP Zertifikat</div>
                <div class="ic-cert-wrap">
                    <div id="ic-cert-img">
                        <span style="color:#ccc;font-size:12px;">Lädt…</span>
                    </div>
                    <div class="ic-cert-sidebar">
                        <div>
                            <div class="ic-cert-sidebar-title">IncluCert</div>
                            <div class="ic-cert-sidebar-sub">
                                Proof of Progress in Digital Accessibility<br>
                                Ausgestellt für <strong>{{ $company->name }}</strong><br>
                                Stand: {{ $metrics['observation_end']->format('d.m.Y') }}
                            </div>
                        </div>
                        <a href="{{ $certUrl }}/pdf" target="_blank" class="ic-cert-dl-btn">
                            ↓ PDF herunterladen
                        </a>
                        <a href="{{ url('/inclucert/' . $company->ulid . '/urls') }}" class="ic-cert-url-btn">
                            📋 Überwachte Seiten
                        </a>
                        @if($company->web)
                            <a href="{{ $company->web }}" target="_blank" class="ic-cert-url-btn">
                                🌐 Website besuchen
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <p>
            <div class="ic-note">
                Score basierend auf <strong>{{ $metrics['current_urls'] }} repräsentativen Seiten</strong> nach WCAG 2.1 (103 automatische Prüfregeln ≈ 30–40% aller WCAG-Kriterien). ·
                <a href="{{ url('/inclucert/' . $company->ulid . '/urls') }}">Alle überwachten Seiten ansehen →</a>
            </div>

            </p>
            {{-- CTA --}}
            <div class="ic-cta-strip">
                <div class="ic-cta-inner">
                    <div class="row align-items-center">
                        <div class="col-md-8 mb-3 mb-md-0">
                            <h3>Auch Ihre Website <em>kontinuierlich überwachen?</em></h3>
                            <p>IncluCert ist Teil des Barrierefreiheits-Monitorings von aktion-barrierefrei.org — automatische WCAG-Scans, Fortschrittsdokumentation und öffentlicher Nachweis.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="https://aktion-barrierefrei.org" target="_blank" class="ic-cta-link">
                                Jetzt informieren →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            fetch('/inclucert/{{ $company->ulid }}/image')
                .then(r => r.json())
                .then(d => {
                    document.getElementById('ic-cert-img').innerHTML =
                        `<img src="${d.image}" alt="IncluCert Zertifikat {{ $company->name }}">`;
                })
                .catch(() => {
                    document.getElementById('ic-cert-img').innerHTML =
                        `<div style="padding:24px;text-align:center;">
                <a href="/inclucert/{{ $company->ulid }}/pdf" target="_blank" style="color:#178bff;font-size:13px;">PDF direkt öffnen →</a>
             </div>`;
                });
        </script>
    @endpush

</x-page-layout>
