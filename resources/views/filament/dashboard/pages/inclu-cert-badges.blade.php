<x-filament-panels::page>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css">
        <style>
            .fi-main,
            .fi-main-ctn,
            .fi-page,
            .fi-section,
            .fi-section-content-ctn,
            .fi-section-content {
                overflow: visible !important;
                z-index: auto !important;
            }

            .ic-page-wrap {
                background: #0d1117;
                border-radius: 20px;
                padding: 24px;
                margin: -8px;

            }

            .ic-theme-switcher {
                display: flex;
                align-items: center;
                gap: 4px;
                background: rgba(0, 0, 0, .4);
                border-radius: 16px;
                padding: 5px;
                border: 1px solid rgba(255, 255, 255, .08);
            }

            .ic-theme-btn {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 7px 16px;
                border-radius: 10px;
                border: none;
                cursor: pointer;
                font-size: 13px;
                font-weight: 600;
                font-family: system-ui;
                transition: all .2s ease;
                color: rgba(255, 255, 255, .45);
                background: transparent;
            }

            .ic-theme-btn:hover {
                color: rgba(255, 255, 255, .8);
                background: rgba(255, 255, 255, .06);
            }

            .ic-theme-btn.active {
                color: #fff;
                background: rgba(255, 255, 255, .1);
                box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
            }

            .ic-theme-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                flex-shrink: 0;
            }

            .ic-theme-dot-default {
                background: linear-gradient(135deg, #04124a, #d4a62a);
            }

            .ic-theme-dot-stealth {
                background: linear-gradient(135deg, #242424, #d4a62a);
            }

            .ic-theme-dot-light {
                background: linear-gradient(135deg, #eef0f7, #c8900a);
                border: 1px solid rgba(0, 0, 0, .15);
            }

            .ic-theme-dot-mono {
                background: linear-gradient(135deg, #333, #aaa);
            }

            .ic-hero-banner {
                background: linear-gradient(155deg, #010314 0%, #02082a 40%, #04124a 100%);
                border-radius: 16px;
                padding: 28px 32px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                flex-wrap: wrap;
                border: 1px solid rgba(255, 255, 255, .07);
                position: relative;
                overflow: hidden;
                margin-bottom: 20px;
            }

            .ic-hero-banner::before {
                content: '';
                position: absolute;
                top: -60px;
                right: -60px;
                width: 220px;
                height: 220px;
                background: radial-gradient(circle, rgba(212, 166, 42, .12) 0%, transparent 70%);
                pointer-events: none;
            }

            .ic-hero-left {
                flex: 1;
                min-width: 200px;
            }

            .ic-hero-label {
                display: inline-block;
                background: rgba(212, 166, 42, .15);
                border: 1px solid rgba(212, 166, 42, .3);
                color: #f7d37a;
                font-size: 10px;
                font-weight: 700;
                letter-spacing: 2px;
                padding: 3px 10px;
                border-radius: 20px;
                margin-bottom: 10px;
                font-family: system-ui;
            }

            .ic-hero-title {
                font-size: 1.5em;
                font-weight: 800;
                color: #fff;
                line-height: 1.2;
                font-family: system-ui;
                margin-bottom: 6px;
            }

            .ic-hero-title span {
                background: linear-gradient(90deg, #f7d37a, #d4a62a);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .ic-hero-sub {
                font-size: 12px;
                color: rgba(255, 255, 255, .45);
                font-family: system-ui;
                line-height: 1.5;
            }

            .ic-hero-right {
                display: flex;
                align-items: center;
                gap: 12px;
                flex-shrink: 0;
                flex-wrap: wrap;
            }

            .ic-cert-btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: linear-gradient(135deg, #d4a62a, #f7d37a);
                color: #010314;
                font-weight: 700;
                font-size: 13px;
                padding: 10px 20px;
                border-radius: 12px;
                text-decoration: none;
                font-family: system-ui;
                transition: opacity .15s, transform .15s;
                white-space: nowrap;
            }

            .ic-cert-btn:hover {
                opacity: .9;
                transform: translateY(-1px);
            }

            .ic-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            @media (max-width: 900px) {
                .ic-grid {
                    grid-template-columns: 1fr;
                }
            }

            .ic-badge-card {
                border-radius: 14px;
                border: 1px solid rgba(255, 255, 255, .07);
                overflow: visible;
                background: #161b26;
                transition: border-color .2s ease;
            }

            .ic-badge-card:hover {
                border-color: rgba(255, 255, 255, .14);
            }

            .ic-badge-card-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px 16px;
                border-bottom: 1px solid rgba(255, 255, 255, .06);
            }

            .ic-badge-card-title {
                font-size: 13px;
                font-weight: 700;
                color: #fff;
                font-family: system-ui;
            }

            .ic-badge-card-slug {
                font-size: 10px;
                color: rgba(255, 255, 255, .35);
                font-family: monospace;
                background: rgba(255, 255, 255, .05);
                padding: 2px 8px;
                border-radius: 6px;
            }

            .ic-badge-preview {
                padding: 24px 20px;
                min-height: 100px;
                display: flex;
                align-items: flex-start;
                justify-content: flex-start;
                transition: background .3s ease;
            }

            .ic-badge-code {
                border-top: 1px solid rgba(255, 255, 255, .06);
                position: relative;
            }

            .ic-badge-code pre {
                margin: 0 !important;
                border-radius: 0 0 14px 14px !important;
                font-size: 11px !important;
                max-height: 110px;
                overflow-y: auto;
                background: #0d1117 !important;
            }

            .ic-copy-btn {
                position: absolute;
                top: 8px;
                right: 8px;
                z-index: 10;
                font-size: 11px;
                font-family: system-ui;
                font-weight: 600;
                padding: 4px 10px;
                border-radius: 6px;
                border: none;
                cursor: pointer;
                transition: all .15s;
                background: rgba(255, 255, 255, .1);
                color: rgba(255, 255, 255, .7);
            }

            .ic-copy-btn:hover {
                background: rgba(255, 255, 255, .18);
                color: #fff;
            }

            .ic-copy-btn.copied {
                background: #22c55e;
                color: #fff;
            }

            .ic-script-section {
                background: #161b26;
                border-radius: 14px;
                padding: 18px 22px;
                border: 1px solid rgba(255, 255, 255, .07);
                margin-bottom: 20px;
            }

            .ic-script-label {
                font-size: 10px;
                font-weight: 700;
                letter-spacing: 1.5px;
                text-transform: uppercase;
                color: #f7d37a;
                font-family: system-ui;
                margin-bottom: 3px;
            }

            .ic-script-desc {
                font-size: 12px;
                color: rgba(255, 255, 255, .4);
                font-family: system-ui;
                margin-bottom: 10px;
            }

            .ic-script-code {
                position: relative;
            }

            .ic-script-code pre {
                margin: 0 !important;
                border-radius: 10px !important;
                font-size: 12px !important;
                background: #0d1117 !important;
            }

            .ic-ways-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            @media (max-width: 768px) {
                .ic-ways-grid {
                    grid-template-columns: 1fr;
                }
            }

            .ic-way-card {
                background: #161b26;
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, .07);
                overflow: hidden;
            }

            .ic-way-header {
                padding: 12px 14px 8px;
                border-bottom: 1px solid rgba(255, 255, 255, .06);
            }

            .ic-way-title {
                font-size: 12px;
                font-weight: 700;
                color: #fff;
                font-family: system-ui;
                margin-bottom: 2px;
            }

            .ic-way-desc {
                font-size: 11px;
                color: rgba(255, 255, 255, .35);
                font-family: system-ui;
                line-height: 1.4;
            }

            .ic-way-code {
                position: relative;
            }

            .ic-way-code pre {
                margin: 0 !important;
                border-radius: 0 0 12px 12px !important;
                font-size: 11px !important;
                max-height: 100px;
                overflow-y: auto;
                background: #0d1117 !important;
            }

            .ic-section-label {
                font-size: 10px;
                font-weight: 700;
                letter-spacing: 1.5px;
                text-transform: uppercase;
                color: rgba(255, 255, 255, .3);
                font-family: system-ui;
                margin-bottom: 10px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .ic-section-label::after {
                content: '';
                flex: 1;
                height: 1px;
                background: rgba(255, 255, 255, .06);
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => hljs.highlightAll());
            document.addEventListener('livewire:navigated', () => hljs.highlightAll());
        </script>
    @endpush

    @php
        $ulid = $this->ulid;
        $scriptUrl = $this->badgeScriptUrl;
        $certUrl = url('/inclucert/' . $ulid);

        $themes = [
            'default' => ['label' => 'Dark',    'dot' => 'ic-theme-dot-default'],
            'stealth' => ['label' => 'Stealth', 'dot' => 'ic-theme-dot-stealth'],
            'light'   => ['label' => 'Light',   'dot' => 'ic-theme-dot-light'],
            'mono'    => ['label' => 'Mono',    'dot' => 'ic-theme-dot-mono'],
        ];

        $appearances = [
            'full'    => 'Full',
            'minimal' => 'Minimal',
            'compact' => 'Compact',
            'micro'   => 'Micro',
        ];

        $previewBg = [
            'default' => '#1e2235',
            'stealth' => '#111111',
            'light'   => '#e8eaf2',
            'mono'    => '#0f0f0f',
        ];

        $scriptTag  = '<script src="' . $scriptUrl . '" defer><\/script>';
        $way2       = '<script' . "\n  src=\"{$scriptUrl}\"\n  data-ulid=\"{$ulid}\"\n  data-appearance=\"compact\">\n<\/script>";
        $way3       = "<div\n  data-inclucert-ulid=\"{$ulid}\"\n  data-inclucert-appearance=\"compact\">\n</div>";
        $autoTheme  = "<inclucert-badge\n  data-ulid=\"{$ulid}\"\n  data-appearance=\"compact\"\n  data-theme=\"auto\">\n</inclucert-badge>";
    @endphp

    <script src="{{ $scriptUrl }}" defer></script>

    <div x-data="{ activeTheme: 'default' }" class="ic-page-wrap">
        @if($this->isDemo)
            <div style="
    background: rgba(212,166,42,.08);
    border: 1px solid rgba(212,166,42,.2);
    border-radius: 12px;
    padding: 12px 18px;
    font-size: 13px;
    color: #c8880a;
    font-family: system-ui;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
">
                <x-heroicon-o-eye class="w-5 h-5" style="flex-shrink:0; color:#c8880a;" />

                <span>
        <strong>Vorschau mit Demo-Daten</strong> —

    So wird Ihr Badge später aussehen.

    Aktuell werden Beispielwerte angezeigt, bis Daten Ihrer Domain vorliegen.
    </span>
            </div>
        @endif
        {{-- Hero --}}
        <div class="ic-hero-banner">
            <div class="ic-hero-left">
                <div class="ic-hero-label"><b>Inclu</b>Cert</div>
                <div class="ic-hero-title">Badge-Einbindung<br><span>für Ihre Website</span></div>
                <div class="ic-hero-sub">
                    Wählen Sie ein Theme — alle Varianten werden live aktualisiert.<br>
                    Kopieren Sie den passenden Code direkt in Ihre Website.
                </div>
            </div>
            <div class="ic-hero-right">
                <div class="ic-theme-switcher">
                    @foreach($themes as $themeKey => $theme)
                        <button
                            class="ic-theme-btn"
                            :class="activeTheme === '{{ $themeKey }}' ? 'active' : ''"
                            @click="activeTheme = '{{ $themeKey }}'">
                            <span class="ic-theme-dot {{ $theme['dot'] }}"></span>
                            {{ $theme['label'] }}
                        </button>
                    @endforeach
                </div>
                <a href="{{ $certUrl }}" target="_blank" class="ic-cert-btn">
                    Zertifikat ansehen →
                </a>
            </div>
        </div>

        {{-- Schritt 1 --}}
        <div class="ic-section-label">Schritt 1 — Script einmalig in den &lt;head&gt; einbinden</div>
        <div class="ic-script-section">
            <div class="ic-script-label">Einmalig · Gilt für alle Badges auf der Seite</div>
            <div class="ic-script-desc">Diesen Code einmalig im &lt;head&gt; Ihrer Website einfügen — dann können Sie beliebig viele Badges einbinden.</div>
            <div class="ic-script-code" x-data="{ copied: false }">
                <button class="ic-copy-btn" :class="copied ? 'copied' : ''"
                        @click="navigator.clipboard.writeText('{{ addslashes($scriptTag) }}'); copied = true; setTimeout(() => copied = false, 2000)">
                    <span x-show="!copied">Kopieren</span>
                    <span x-show="copied">✓ Kopiert!</span>
                </button>
                <pre><code class="language-html">{{ $scriptTag }}</code></pre>
            </div>
        </div>

        {{-- Schritt 2 --}}
        <div class="ic-section-label" style="margin-top:20px;">Schritt 2 — Badge-Variante wählen und einbinden</div>
        <div class="ic-grid">
            @foreach($appearances as $appearanceKey => $appearanceLabel)
                @php
                    $codeTemplate = fn($t) => $t === 'default'
                        ? "<inclucert-badge\n  data-ulid=\"{$ulid}\"\n  data-appearance=\"{$appearanceKey}\">\n</inclucert-badge>"
                        : "<inclucert-badge\n  data-ulid=\"{$ulid}\"\n  data-appearance=\"{$appearanceKey}\"\n  data-theme=\"{$t}\">\n</inclucert-badge>";
                @endphp

                <div class="ic-badge-card">
                    <div class="ic-badge-card-header">
                        <span class="ic-badge-card-title">{{ $appearanceLabel }}</span>
                        <span class="ic-badge-card-slug">data-appearance="{{ $appearanceKey }}"</span>
                    </div>

                    {{-- Preview mit dynamischem Hintergrund --}}
                    <div class="ic-badge-preview"
                         x-bind:style="{
                             background: activeTheme === 'default' ? '{{ $previewBg['default'] }}' :
                                         activeTheme === 'stealth' ? '{{ $previewBg['stealth'] }}' :
                                         activeTheme === 'light'   ? '{{ $previewBg['light'] }}' :
                                         activeTheme === 'mono'    ? '{{ $previewBg['mono'] }}' : '{{ $previewBg['default'] }}'
                         }">
                        @foreach(array_keys($themes) as $t)
                            <div x-show="activeTheme === '{{ $t }}'" x-cloak style="width:100%">
                                <inclucert-badge
                                    data-ulid="{{ $ulid }}"
                                    data-appearance="{{ $appearanceKey }}"
                                    data-theme="{{ $t }}">
                                </inclucert-badge>
                            </div>
                        @endforeach
                    </div>

                    {{-- Code --}}
                    <div class="ic-badge-code">
                        @foreach(array_keys($themes) as $t)
                            @php $codeStr = $codeTemplate($t); @endphp
                            <div x-show="activeTheme === '{{ $t }}'" x-cloak>
                                <div x-data="{ copied: false }" style="position:relative">
                                    <button class="ic-copy-btn" :class="copied ? 'copied' : ''"
                                            @click="navigator.clipboard.writeText(`{{ addslashes($codeStr) }}`); copied = true; setTimeout(() => copied = false, 2000)">
                                        <span x-show="!copied">Kopieren</span>
                                        <span x-show="copied">✓</span>
                                    </button>
                                    <pre><code class="language-html">{{ $codeStr }}</code></pre>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Weitere Wege --}}
        <div class="ic-section-label" style="margin-top:20px;">Weitere Einbindungsmöglichkeiten</div>
        <div class="ic-ways-grid">

            <div class="ic-way-card">
                <div class="ic-way-header">
                    <div class="ic-way-title">Weg 2 — HTML-Block / Embed</div>
                    <div class="ic-way-desc">Für WordPress, Webflow, Jimdo — kein Admin-Zugang nötig.</div>
                </div>
                <div class="ic-way-code" x-data="{ copied: false }">
                    <button class="ic-copy-btn" :class="copied ? 'copied' : ''"
                            @click="navigator.clipboard.writeText('{{ addslashes($way2) }}'); copied = true; setTimeout(() => copied = false, 2000)">
                        <span x-show="!copied">Kopieren</span><span x-show="copied">✓</span>
                    </button>
                    <pre><code class="language-html">{{ $way2 }}</code></pre>
                </div>
            </div>

            <div class="ic-way-card">
                <div class="ic-way-header">
                    <div class="ic-way-title">Weg 3 — Nur ein &lt;div&gt;</div>
                    <div class="ic-way-desc">Maximale Kompatibilität — funktioniert in jedem Editor.</div>
                </div>
                <div class="ic-way-code" x-data="{ copied: false }">
                    <button class="ic-copy-btn" :class="copied ? 'copied' : ''"
                            @click="navigator.clipboard.writeText('{{ addslashes($way3) }}'); copied = true; setTimeout(() => copied = false, 2000)">
                        <span x-show="!copied">Kopieren</span><span x-show="copied">✓</span>
                    </button>
                    <pre><code class="language-html">{{ $way3 }}</code></pre>
                </div>
            </div>

            <div class="ic-way-card">
                <div class="ic-way-header">
                    <div class="ic-way-title">Auto-Theme</div>
                    <div class="ic-way-desc">Folgt automatisch dem OS-Theme des Besuchers (hell/dunkel).</div>
                </div>
                <div class="ic-way-code" x-data="{ copied: false }">
                    <button class="ic-copy-btn" :class="copied ? 'copied' : ''"
                            @click="navigator.clipboard.writeText('{{ addslashes($autoTheme) }}'); copied = true; setTimeout(() => copied = false, 2000)">
                        <span x-show="!copied">Kopieren</span><span x-show="copied">✓</span>
                    </button>
                    <pre><code class="language-html">{{ $autoTheme }}</code></pre>
                </div>
            </div>

        </div>

    </div>

</x-filament-panels::page>
