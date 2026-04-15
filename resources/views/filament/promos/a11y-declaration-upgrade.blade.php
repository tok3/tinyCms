<div data-feature="barrierefreiheitserklaerung">

    <div style="
        display:grid;
        grid-template-columns:1.2fr 1fr;
    ">

        {{-- LEFT --}}
        <div style="
            padding:40px;
            display:flex;
            flex-direction:column;
            gap:18px;
        ">

            <h3 style="font-size:1.9rem; font-weight:700;">
                Barrierefreiheitserklärung automatisch bereitstellen
            </h3>

            <p>
                Stellen Sie eine vollständige Barrierefreiheitserklärung für Ihre Website bereit –
                rechtssicher und immer aktuell.
            </p>

            <p>
                <strong>Freischalten. Einbinden. Fertig.</strong><br>
                Ihre Erklärung wird automatisch gepflegt und bei Änderungen angepasst.
            </p>

            {{-- Benefits --}}
            <div style="
                background: rgba(255,255,255,0.08);
                padding:16px;
                border-radius:10px;
                line-height:1.6;
            ">
                • Rechtssichere Barrierefreiheitserklärung<br>
                • Automatische Aktualisierung bei Änderungen<br>
                • Inklusive Leichter Sprache<br>
                • Integriertes Feedback-Formular<br>
                • Direkt auf Ihrer Website einbindbar
            </div>

            {{-- CTA --}}
            <div style="display:flex; gap:12px; margin-top:10px; flex-wrap:wrap;">

                <a href="{{ url('/dashboard/' . filament()->getTenant()->id . '/upgrade-page') }}"
                   style="
                        background:white;
                        color:black;
                        padding:12px 20px;
                        border-radius:8px;
                        font-weight:600;
                        text-decoration:none;
                   ">
                    Barrierefreiheitserklärung freischalten
                </a>

                <a href="https://aktion-barrierefrei.org/produkte/barrierefreiheitserklaerung"
                   target="_blank"
                   style="
                        border:1px solid rgba(255,255,255,0.3);
                        padding:12px 20px;
                        border-radius:8px;
                        text-decoration:none;
                        color:white;
                   ">
                    Mehr erfahren
                </a>

            </div>

            {{-- Micro --}}{{--
            <div style="
                font-size:0.8rem;
                opacity:0.7;
            ">
                Freischaltung und Einrichtung erfolgen über Ihr Dashboard
            </div>
--}}
        </div>

        {{-- RIGHT --}}
        <div style="
            background: linear-gradient(
                135deg,
                #5f8fbf 0%,
                #7eaad3 40%,
                #bcd3ea 75%,
                #f5f9fd 100%
            );
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px;
        ">

            <img src="https://aktion-barrierefrei.org/storage/storage/head-mit-be.png"
                 alt="Barrierefreiheitserklärung Vorschau"
                 style="max-width:100%; border-radius:12px;">

        </div>

    </div>

</div>
