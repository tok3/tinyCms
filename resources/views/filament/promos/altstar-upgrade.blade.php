<div data-feature="image-alt-tags">

    <div style="
        display:grid;
        grid-template-columns:1.2fr 1fr;
        gap:0;
    ">

        {{-- LEFT --}}
        <div style="padding:40px; display:flex; flex-direction:column; gap:18px;">

            <h3 style="font-size:1.8rem; font-weight:700;">
                Alt-Texte automatisch erstellen
            </h3>

            <p>
                AltStar analysiert Ihre Bilder und erstellt automatisch passende Alt-Texte –
                direkt auf Ihrer bestehenden Website.
            </p>

            <p>
                <strong>Keine Pflege. Kein Aufwand.</strong><br>
                Ihre Inhalte werden barrierefrei – ohne manuelle Nacharbeit.
            </p>

            {{-- Benefits --}}
            <div style="
                background: rgba(255,255,255,0.08);
                padding:16px;
                border-radius:10px;
                line-height:1.6;
            ">
                • Automatische Generierung von Alt-Texten für Ihre Bilder<br>
                • Sofort bessere WCAG-Konformität<br>
                • Kein Redaktionsaufwand für Ihr Team<br>
                • Funktioniert auf bestehenden Seiten und Inhalten<br>
                • Ideal für große Websites mit vielen Bildern
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
                    AltStar jetzt aktivieren
                </a>

                <a href="https://aktion-barrierefrei.org/produkte/alt-star"
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
      background: linear-gradient(
            155deg,
            #010314 0%,
            #02082a 15%,
            #04124a 45%,
            #02072e 70%,
            #010314 100%
    );
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        ">

            <img src="https://aktion-barrierefrei.org/storage/storage/1sgXyAIAugsvYhbUHBKcVMAgcdKR5PWBCZ4nBSiD.png"
                 alt="AltStar Vorschau"
                 style="max-width:100%; border-radius:10px;">

        </div>

    </div>

</div>
