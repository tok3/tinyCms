<div data-feature="inclucert">

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
                Zeigen Sie Barrierefreiheit – nicht nur behaupten
            </h3>

            <p>
                InkluCert macht Ihren Fortschritt sichtbar und nachvollziehbar –
                direkt für Nutzer, Kunden und Prüfer.
            </p>

            <p>
                <strong>Aktivieren. Anzeigen. Vertrauen schaffen.</strong><br>
                Ihr aktueller Stand wird transparent dargestellt – jederzeit abrufbar.
            </p>

            {{-- Benefits --}}
            <div style="
                background: rgba(255,255,255,0.08);
                padding:16px;
                border-radius:10px;
                line-height:1.6;
            ">
                • Sichtbarer Nachweis Ihrer Barrierefreiheit<br>
                • Aktueller Status statt statischer Erklärung<br>
                • Darstellung von Fortschritten und Verbesserungen<br>
                • Direkt verlinkbar und öffentlich zugänglich<br>
                • Stärkt Vertrauen bei Nutzern und Auftraggebern<br>
                • Perfekte Ergänzung zu Ihren WCAG-Maßnahmen
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
                    InkluCert jetzt freischalten
                </a>

                <a href="https://aktion-barrierefrei.org/produkte/firmament#incluCert-nachweis"
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
            background: linear-gradient(135deg, #f5f9fd 0%, #f5f9fd 40%, #f5f9fd 75%, #f5f9fd 100%);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        ">

            <img src="https://aktion-barrierefrei.org/storage/storage/0es97hR2q5b93b2A1FZkjosIe08qWbhU7ZGIpxf0.png"
                 alt="InkluCert – Nachweis der digitalen Barrierefreiheit"
                 style="max-width:100%; border-radius:10px;">

        </div>

    </div>

</div>
