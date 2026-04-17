<div data-feature="fixstern">

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
                Barrierefreiheit sofort – ohne Umbau
            </h3>

            <p>
                Fixstern entfernt Barrieren direkt auf Ihrer Website –
                ohne Eingriff in Ihren bestehenden Code.
            </p>

            <p>
                <strong>Einbauen. Aktivieren. Fertig.</strong><br>
                Ihre Website wird sofort besser nutzbar – für alle Besucher.
            </p>

            {{-- Benefits --}}
            <div style="
                background: rgba(255,255,255,0.08);
                padding:16px;
                border-radius:10px;
                line-height:1.6;
            ">
                • Sofortige Verbesserung der Zugänglichkeit<br>
                • Unterstützung für Screenreader und assistive Technologien<br>
                • Inhalte in Leichter Sprache verfügbar<br>
                • Vorlesefunktion für Texte auf Ihrer Website<br>
                • Kein Eingriff in bestehende Systeme notwendig<br>
                • Ergänzt Ihre bestehenden WCAG-Maßnahmen
            </div>

            {{-- CTA --}}
            <div style="display:flex; gap:12px; margin-top:10px; flex-wrap:wrap;">

                <a href="{{ url('/dashboard/' . $tenant . '/upgrade-page') }}"
                   style="
                        background:white;
                        color:black;
                        padding:12px 20px;
                        border-radius:8px;
                        font-weight:600;
                        text-decoration:none;
                   ">
                    Fixstern jetzt aktivieren
                </a>

                <a href="https://aktion-barrierefrei.org/produkte/fixstern"
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

        </div>

        {{-- RIGHT --}}
        <div style="
            background: linear-gradient(135deg, #1e3a8a, #312e81);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        ">

            <img src="https://aktion-barrierefrei.org/storage/storage/CANvyfzomkRgAO1IiGlVDhARE9Z2gHcJDaQYpGG3.png"
                 alt="Fixstern Vorschau"
                 style="max-width:100%; border-radius:10px;">

        </div>

    </div>

</div>
