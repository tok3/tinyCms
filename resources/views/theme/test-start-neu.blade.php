<x-assan-layout layout-type="{{$layoutType}}">





    <style>

        /* styles.css */
        .product-card {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.25rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.25rem;
            background: #ffffff;
            max-width: 1000px;
            font-family: sans-serif;
            margin-bottom: 1rem; /* entspricht mb-3 */
        }

        .product-card__image-wrapper {
            flex-shrink: 0;
        }

        .product-card__image {
            width: 250px;
            height: auto;
            border-radius: 0.3rem;
        }

        .product-card__content {
            flex: 1;
        }

        .product-card__header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .product-card__title {
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }

        .product-card__provider {
            font-size: 1.0rem;
            color: #6b7280;
        }

        .product-card__description {
            margin: 0.5rem 0;
            color: #050708;
            font-size: 1.0rem;
            line-height: 1.4;
        }


        .product-card__content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Tags-Container an den rechten Rand ausrichten */
        .product-card__tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
            margin-left: auto;    /* schiebt ihn ganz nach rechts */
        }

        .tag {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            display: inline-block;
        }

        /* Spezifische Tag-Varianten */
        .tag--dsgvo {
            background-color: #ecfdf5;
            color: #065f46;
        }

        .tag--bitv {
            background-color: #fef3c7;
            color: #92400e;
        }

        .tag--wcag {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        /* styles.css */
        /* Basisklasse für alle Provider-Icons */
        .product-card__provider--icon {
            display: inline-block;
            width: 3.25rem;            /* fixe Breite */
            height: 2.25rem;           /* fixe Höhe */
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            line-height: 0;
            vertical-align: middle;
        }
        .product-card__provider--icon + .product-card__provider--icon {
            margin-left: 3px;
        }
        /* Modifier-Klassen nur für das jeweilige Icon */
        .product-card__provider--icon.feature {
            background-image: url("{{ URL::asset('assets/img/produkte/feature-white.png') }}");
        }
        .product-card__provider--icon.audio {
            background-image: url("{{ URL::asset('assets/img/produkte/audio-white.png') }}");

        }
        .product-card__provider--icon.standalone {
            background-image: url("{{ URL::asset('assets/img/produkte/standalone.svg') }}");
        }
        .product-card__provider--icon.addon {
            background-image: url("{{ URL::asset('assets/img/produkte/addON.svg') }}");
        }
        /* Wrapper um alle Icons */
        .product-card__provider-icons {
            display: flex;
            gap: 3px;        /* Abstand zwischen den Icons */
            margin-left: auto; /* ganz nach rechts ausrichten */
        }

        /* floatendes Bild innerhalb des Fließtexts */
        .product-card__image--float {
            float: left;               /* Bild nach links floaten */
            width: 250px;              /* fixe Breite, Höhe passt sich an */
            height: auto;
            margin: 0 1rem 1rem 0;     /* rechts und unten Abstand für den Umfluss */
            border-radius: 0.3rem;     /* optional, wie gehabt */
        }

        /* Footer-Container wie Header */
        .product-card__footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;        /* damit es auf engen Viewports umbrechen kann */
            width: 100%;            /* volle Breite der Card */
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb; /* optional Abgrenzung */
        }

        /* Linke Seite: Titel + Text */
        .product-card__footer-info {
            display: flex;
            flex-direction: column;
            max-width: 60%;         /* auf großen Viewports Beschränkung, damit Actions rechts Platz haben */
        }
        .product-card__footer-title {
            margin: 0 0 0.5rem;
            font-size: 1.25rem;
            font-weight: 600;
        }
        .product-card__footer-text {
            margin: 0;
            color: #6b7280;
            font-size: 1rem;
            line-height: 1.4;
        }

        /* Rechte Seite: Button-Group */
        .product-card__footer-actions {
            display: flex;
            gap: 0.5rem;
            margin-left: auto;       /* schiebt die Actions ganz nach rechts */
        }
        .product-card__footer-actions .btn {
            white-space: nowrap;
        }

        /* Responsive: ab 768px einspaltig */
        @media (max-width: 768px) {
            .product-card__footer {
                flex-direction: column;
                align-items: stretch;  /* zieht beide Bereiche über die volle Breite */
            }
            .product-card__footer-info {
                max-width: 100%;
                margin-bottom: 1rem;
            }
            .product-card__footer-actions {
                margin-left: 0;
                justify-content: flex-start;
                width: 100%;
            }
            /* Optional: Buttons untereinander auf sehr kleinen Viewports */
            @media (max-width: 480px) {
                .product-card__footer-actions {
                    flex-direction: column;
                    gap: 0.75rem;
                }
                .product-card__footer-actions .btn {
                    width: 100%;
                }
            }
        }
        .product-card__footer {
            display: flex;
            justify-content: space-between;
            align-items: center;   /* statt flex-start */
            flex-wrap: wrap;
            width: 100%;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e5e7eb;
        }
        @media (max-width: 768px) {
            .product-card__footer-actions {
                margin-left: 0;         /* hebt das vorherige auto wieder auf */
                width: 100%;            /* bleibt volle Breite */
                justify-content: center;/* schiebt die Buttons mittig */
            }

            /* very small viewports: Buttons untereinander */
            @media (max-width: 480px) {
                .product-card__footer-actions {
                    flex-direction: column;
                    gap: 0.75rem;
                }
                .product-card__footer-actions .btn {
                    width: 100%;
                }
            }
        }


        /* --- Card Grundlayout --- */
        .gb-card {
            position: relative;
            /* DEFAULT-FARBEN als CSS-Variablen */
            --card-bg:       #76bbd0;
            --footer-top:    #e07044;
            --footer-bottom: #f0ab61;
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 2.0rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            color: #fff;
            overflow: hidden;
            max-width: 100%;
            margin: 2rem auto;
        }

        .gb-card__title {
            font-family: 'karla', sans-serif;
            font-size: 2.0rem;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .gb-card__body p {
            font-family: 'Pontano Sans', sans-serif;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: .75rem;
        }

        /* Sidebar ganz unten rechts, 20% der Höhe */
        .gb-card__sidebar {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 24px;
            height: 50px;
            display: flex;
            flex-direction: column;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            overflow: hidden;
        }

        .gb-card__block {
            flex: 1;
            display: block;
        }
        /* Farben lesen aus den Variablen */
        .gb-card__block--top {
            background-color: var(--footer-top);
        }
        .gb-card__block--bottom {
            background-color: var(--footer-bottom);
        }

        .gb-card--legal {
            background-color: #f5f5f5;  /* hellgrau */
            color: #111;                /* fast schwarz */
            padding: 1rem 1.25rem;
            margin: 1rem 0;
            border-radius: 6px;
            font-size: 0.95rem;
            box-shadow: none;          /* keine auffällige Karte */
            position: relative;
        }

        .gb-card--legal .gb-card__title {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #111;
        }

        .gb-card--legal .gb-card-variant2__text p{
            font-family: 'IBM Plex Sans', sans-serif;
            font-size: 0.92rem;
            color: #111;
            margin: 0;
            line-height: 1.5;
        }

        .gb-card--legal .gb-card__sidebar {
            display: none; /* optional: Sidebar-Elemente bei Legal-Card entfernen */
        }
        /* === Sechs Varianten === */

        /* 1) Primary */
        .gb-card--primary {
            --card-bg:       #0d6efd;
            --footer-top:    #0747a6;
            --footer-bottom: #3d7bfa;
        }
        /* 2) Secondary */
        .gb-card--secondary {
            --card-bg:       #6c757d;
            --footer-top:    #495057;
            --footer-bottom: #adb5bd;
        }

        .gb-card--light {
            color:#111111;
            --card-bg:       #f5f5f5;
            --footer-top:    #adb5bd;
            --footer-bottom: #ced4da;
        }


        /* 3) Success */
        .gb-card--success {
            --card-bg:       #198754;
            --footer-top:    #117a39;
            --footer-bottom: #45ba6b;
        }
        /* 4) Danger */
        .gb-card--danger {
            --card-bg:       #dc3545;
            --footer-top:    #a71d2a;
            --footer-bottom: #ed6473;
        }
        /* 5) Warning */
        .gb-card--warning {
            --card-bg:       #ffc107;
            --footer-top:    #e0a800;
            --footer-bottom: #ffcd39;
        }
        /* 6) Info */
        .gb-card--info {
            --card-bg:       #0dcaf0;
            --footer-top:    #0aa3b5;
            --footer-bottom: #3eefec;
        }
    </style>
<style>
    /* === Basis-Styles Variant 2 === */
    .gb-card-variant2 {
        display: flex;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        /*max-width: 800px;*/
        margin: 2rem auto;
        container-type: inline-size;
        container-name: card;
    }

    /* Linke Spalte mit Verlauf und Grafik */
    .gb-card-variant2__left {
        --c1: var(--left-color-1, #f7029f);
        --c2: var(--left-color-2, #1121c2);
        flex: 0 0 35%;
        background: linear-gradient(
            to bottom right,
            var(--c1) 0%,
            var(--c2) 100%
        );
        display: flex;
        flex-direction: column;    /* stapelt Icons untereinander */
        align-items: center;       /* horizontal zentriert */
        justify-content: flex-start; /* oben beginnen */
        gap: 1rem;                 /* Abstand zwischen den Icons */
        padding: 1.5rem 0;         /* vertikales Padding */
        max-width: 250px;
        position: relative;
    }


    .icon-bottom-right {
        position: absolute;
        right: 1rem;
        bottom: 1rem;
    }
    .gb-card-variant2__icon {
        max-width: 80%;
        height: auto;
        display: block;
    }
    .fadeout-pink {
        background: linear-gradient(to bottom right, #f7029f, #f7029f);
        -webkit-mask-image: linear-gradient(to bottom, #ce00cd 0px, #ce00cd 300px, transparent 100%);
        mask-image: linear-gradient(to bottom, #ce00cd 0px, #ce00cd 300px, transparent 100%);
    }
    /* Rechte Spalte mit Text */
    .gb-card-variant2__right {
        flex: 1;
        background: #fff;
        padding: 2rem;
        padding-bottom: 1.5rem;
        color: #333;
        display: flex;
        flex-direction: column;
    }
    .gb-card-variant2__text-left {
        flex: 1;
        background: transparent;
        padding: 2rem;
        color: #ffffff;
        display: flex;
        flex-direction: column;
    }

    /* === Header: Titel + Icons === */
    .gb-card-variant2__header {
        display: flex;
        flex-direction: column;
        height: 100%; /* Wichtig, wenn du Höhe steuern willst */
        position: relative;
    }

    .gb-card-variant2__title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.9rem;
        margin: 0 0 0.8rem;
        color: #222;

    }
    /* Platzhalter zwischen Title und Icons */
    .gb-card-variant2__title {
    }
    /* Icons absolut oben rechts, strecken den Header nicht */
    .gb-card-variant2__header-icons {
        position: absolute;
        top: 0;
        right: 0;
        display: flex;
        gap: 0.5rem;
margin-bottom:  0.8rem;
    }

    .gb-card-variant2__icon-small {
        width: auto;
        height: 20px;
        display: block;
    }

    /* Subtitle & Text */
    .gb-card-variant2__subtitle {
        font-family: 'Open Sans', sans-serif;
        font-size: 1.2rem;
        font-weight: 600;
        color: #555;
        margin: 0 0 1rem;
    }

    .gb-card-variant2__text {
        font-family: 'Open Sans', sans-serif;
        font-size: 1rem;
        line-height: 1.5;
        margin: 0;
        color: #444;
    }

    /* === Demo-Variante: nur Farben konfigurieren === */
    .gb-card-variant2--pink {
        --left-color-1: #f7029f; /* Pink oben */
        --left-color-2: #ce00cd; /* Violett unten */
    }

    .gb-card-variant2--tint-blue {
        --left-color-1: #5c1bb0; /* Pink oben */
        --left-color-2: #310e5f; /* Violett unten */
    }

    .gb-card-variant2--trust-blue {
        --left-color-1: #043363; /* Pink oben */
        --left-color-2: #0b5985; /* Violett unten */
    }

    .gb-card-variant2--deep-violet {
        --left-color-1: #5c1bb0; /* Pink oben */
        --left-color-2: #6b26ba; /* Violett unten */
    }

        .gb-card-variant2--blackberry {
        --left-color-1: #5c1bb0; /* Pink oben */
        --left-color-2: #851484; /* Violett unten */
    }


    .gb-card-variant2__footer {
        border-top: 1px lightgray solid;
        padding-top:1rem;
        display: flex;
        justify-content: flex-end;
        margin-top: 1rem;
        gap: 0.5rem; /* falls mehrere Buttons folgen */

    }


    /* Container Query – wenn die Card mind. 856px breit ist */
    @container card (min-width: 857px) {
        .gb-card-variant2__footer {
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
        }

        .gb-card-variant2__footer .gradient-button-wrapper {
            width: 180px;
        }
    }
    @media (max-width: 768px) {
        .gb-card-variant2 {
            flex-direction: column;
        }

        .gb-card-variant2__header-icons {
            position: relative;
            margin-top: 0.8em !important;
            right: 0;
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.8rem;

        }
        .gb-card-variant2__left {
            flex: none;
            width: 100%;
            max-width: 100%;
            padding: 1rem;
            flex-direction: row;
            justify-content: center;
            gap: 1rem;
        }

        .gb-card-variant2__right {
            padding: 1.5rem;
            align-items: center;
            text-align: center;
        }

        .gb-card-variant2__header-icons {
            position: static;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .gb-card-variant2__footer {
            flex-direction: column;
            align-items: stretch;
            width:100% !important;
        }

        .gb-card-variant2__footer a {
            width:100% !important;

        }

        .gb-card-variant2__footer .btn span {
            width:100% !important;
            white-space: nowrap;
        }
    }

    .gradient-button-wrapper {
        padding: 2px; /* für Rahmen-Effekt */
        border-radius: 8px;
        background: linear-gradient(135deg, #d3089a, #6f42c1); /* Beispiel: Indigo */
        width: 100%;
    }

    .gradient-button-wrapper .btn {
        background-color: #fff;
        border: none;
        width: 100%;
        display: block;
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        white-space: nowrap;
        transition: background 0.3s ease;
    }

    .gradient-button-wrapper .btn:hover {
        background-color: #f8f9fa;
    }
    /*.bg-gradient-primary {
        background: linear-gradient(135deg, #1abc9c, #3498db);
    }*/

    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745, #218838);
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f39c12, #e67e22);
    }

    .bg-gradient-purple {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }

    .bg-gradient-indigo {
        background: linear-gradient(135deg, #6610f2, #6f42c1);
    }

    .bg-gradient-teal {
        background: linear-gradient(135deg, #20c997, #17a2b8);
    }

    .bg-gradient-night {
        background: linear-gradient(135deg, #2c3e50, #34495e);
    }

    .bg-gradient-sunset {
        background: linear-gradient(135deg, #fd746c, #ff9068);
    }

    .bg-gradient-iceblue {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
    }
</style>


    <section class="position-relative bg-gradient-light mt-10">
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                <div class="col-lg-10 col-md-10 mx-auto">


                    <div class="gb-card gb-card--legal mt--10">
                        <h2 class="gb-card__title">Rechtsgrundlage</h2>
                        <div class="gb-card__body">
                            <p class="gb-card-variant2__text">
                                Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind
                                (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                            </p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>
                    <!-- card variant 2 reflow -->


                    <div class="gb-card-variant2 gb-card-variant2--tint-blue ">
                        <div class="gb-card-variant2__left">
                            <img src="{{ URL::asset('assets/img/produkte/web-fit-white.png') }}" class="gb-card-variant2__icon" />
                        </div>
                        <div class="gb-card-variant2__right">

                            <!-- Neuer Header-Bereich -->
                            <div class="gb-card-variant2__header">
                                <div class="gb-card-variant2__header-icons">
                                    <!-- kleine Logos als <img> oder <span> mit background-image -->

                                    <img src="{{ URL::asset('assets/img/produkte/service-black-frame.png') }}"  style="height:17px;"  alt="direct fix"   class="gb-card-variant2__icon-small">
                                           <img src="{{ URL::asset('assets/img/produkte/custom-fix.png') }}"  style="height:27px;"  alt="direct fix"   class="gb-card-variant2__icon-small">
                                     </div>

                                <h2 class="gb-card-variant2__title">Auto Image Alt-Tags</h2>

                            </div>

                            <h3 class="gb-card-variant2__subtitle">KI generierte Bildbeschreibungen</h3>
                            <p class="gb-card-variant2__text">
                                Unser Vorlese-Reader wird mit einem Klick auf den Widget-Button „Vorlesemodus“ aktiviert. Danach genügt es, den Mauszeiger über beliebigen Webseiten­text zu bewegen: Ein kleiner Spinner signalisiert den Start, und der Inhalt wird sofort vorgelesen. Zur Wahl stehen 11 natürlich klingende Stimmen; standardmäßig beginnt die Stimme „Anna“ zu sprechen, kann aber jederzeit über das Auswahlmenü gewechselt werden.
                            </p>
                            <div class="gb-card gb-card--legal mt--10">
                                <h2 class="gb-card__title">Rechtsgrundlage</h2>
                                <div class="gb-card__body">
                                    <p class="gb-card-variant2__text">
                                        Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                        Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind
                                        (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                                    </p>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>
                            <div class="gb-card-variant2__footer">


                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Mehr erfahren …</button>
                                </div>

                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Plan wählen …</button>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="gb-card-variant2">
                        <div class="gb-card-variant2__left">
                            <img src="{{ URL::asset('assets/img/produkte/altstar.png') }}" class="gb-card-variant2__icon" />
                        </div>
                        <div class="gb-card-variant2__right">

                            <!-- Neuer Header-Bereich -->
                            <div class="gb-card-variant2__header">
                                <div class="gb-card-variant2__header-icons">
                                    <!-- kleine Logos als <img> oder <span> mit background-image -->


                                           <img src="{{ URL::asset('assets/img/produkte/direct-fix-black.png') }}"  style="height:27px;"  alt="direct fix"   class="gb-card-variant2__icon-small">
                                     </div>

                                <h2 class="gb-card-variant2__title">Auto Image Alt-Tags</h2>

                            </div>

                            <h3 class="gb-card-variant2__subtitle">KI generierte Bildbeschreibungen</h3>
                            <p class="gb-card-variant2__text">
                                Unser Vorlese-Reader wird mit einem Klick auf den Widget-Button „Vorlesemodus“ aktiviert. Danach genügt es, den Mauszeiger über beliebigen Webseiten­text zu bewegen: Ein kleiner Spinner signalisiert den Start, und der Inhalt wird sofort vorgelesen. Zur Wahl stehen 11 natürlich klingende Stimmen; standardmäßig beginnt die Stimme „Anna“ zu sprechen, kann aber jederzeit über das Auswahlmenü gewechselt werden.
                            </p>
                            <div class="gb-card gb-card--legal mt--10">
                                <h2 class="gb-card__title">Rechtsgrundlage</h2>
                                <div class="gb-card__body">
                                    <p class="gb-card-variant2__text">
                                        Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                        Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind
                                        (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                                    </p>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>
                            <div class="gb-card-variant2__footer">


                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Mehr erfahren …</button>
                                </div>

                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Plan wählen …</button>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- card variant 2 -->
                    <div class="gb-card-variant2 gb-card-variant2--pink ">

                        <div class="gb-card-variant2__left ">
                            <img src="{{ URL::asset('assets/img/produkte/leichte-sprache-audio.png') }}" alt="Icon" class="gb-card-variant2__icon"> <img src="{{ URL::asset('assets/img/produkte/ai-white.png') }}" alt="Icon" style="width:37px;" class="gb-card-variant2__icon icon-bottom-right">
                        </div>
                        <div class="gb-card-variant2__right">
                            <h2 class="gb-card-variant2__title">Leichte Sprache</h2>
                            <h3 class="gb-card-variant2__subtitle">Verständlichkeit für alle</h3>
                            <p class="gb-card-variant2__text">
                                Die   Zusatzfunktion „Leichte Sprache“ erweitert Ihr digitales Angebot um eine essenzielle Komponente der Zugänglichkeit. Sie sorgt dafür, dass komplexe Inhalte in eine klare, einfache Sprache übersetzt werden – damit jeder, unabhängig von seinen sprachlichen Fähigkeiten, alle Informationen mühelos erfassen kann.

                            <div class="gb-card gb-card--legal mt--10">
                                <h2 class="gb-card__title">Rechtsgrundlage</h2>
                                <div class="gb-card__body">
                                    <p class="gb-card-variant2__text">
                                        Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                        Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind
                                        (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                                    </p>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>



                    <div class="gb-card-variant2 gb-card-variant2--pink">
                        <div class="gb-card-variant2__left">
                            <img src="{{ URL::asset('assets/img/produkte/audio-assist.png') }}" alt="Icon" class="gb-card-variant2__icon">

                        </div>
                        <div class="gb-card-variant2__right">

                            <!-- Neuer Header-Bereich -->
                            <div class="gb-card-variant2__header">
                                <div class="gb-card-variant2__header-icons">
                                    <img src="{{ URL::asset('assets/img/produkte/widget-small-black.png') }}"   style="height:35px;" alt="Feature" class="gb-card-variant2__icon-small">

                                    <img src="{{ URL::asset('assets/img/produkte/audio-black.png') }}"   alt="Feature" class="gb-card-variant2__icon-small">
                                    <img src="{{ URL::asset('assets/img/produkte/feature-black.png') }}"   alt="Audio"   class="gb-card-variant2__icon-small">
                                </div>
                                <h2 class="gb-card-variant2__title">Vorlese Assistent</h2>

                            </div>

                            <h3 class="gb-card-variant2__subtitle">einfach hinhören</h3>
                            <p class="gb-card-variant2__text">Nicht jeder Besucher kann eine Website problemlos bedienen – ob wegen Sehschwäche, motorischer Einschränkungen oder Reizempfindlichkeit. Genau hier setzt unser Barrierefrei-Widget an: Es ergänzt jede Seite um eine kompakte, jederzeit erreichbare Hilfe, die Inhalte besser zugänglich macht.</p>
                            <p class="gb-card-variant2__text"></p>
                            <p class="gb-card-variant2__text">Das Widget erscheint als kleine Schaltfläche am Seitenrand. Ein Klick genügt, und die Oberfläche bietet praktische Funktionen wie größere Schrift, erhöhte Kontraste oder reduzierte Animationen – alles sofort nutzbar, ohne Vorwissen.</p>
                            <p class="gb-card-variant2__text"></p>
                            <p class="gb-card-variant2__text">Besonders hilfreich sind die voreingestellten Profile für Epilepsie, ADHS oder kognitive Einschränkungen. Damit passt sich die Seite automatisch an die jeweiligen Bedürfnisse an. Wer möchte, kann auch einzelne Einstellungen manuell vornehmen.</p>
                            <p class="gb-card-variant2__text"></p>
                            <p class="gb-card-variant2__text">Einmal gewählt, bleiben die Anpassungen gespeichert. Beim nächsten Besuch wird die Seite direkt im bevorzugten Modus geladen – ganz ohne Anmeldung oder Cookie-Banner.</p>
                            <p class="gb-card-variant2__text"></p>
                            <p class="gb-card-variant2__text">Die Integration ist simpel: Ein kurzer Codeschnipsel genügt. Kein Umbau, keine Wartung, keine Abhängigkeit von CMS oder Layout.</p>
                            <p class="gb-card-variant2__text"></p>
                            <p class="gb-card-variant2__text">Ob für ältere Nutzer, Menschen mit vorübergehenden Einschränkungen oder als Service für alle, die digitale Barrieren abbauen möchten – unser Widget ist der einfachste Weg zu mehr Zugänglichkeit im Web.</p>

                            <div class="gb-card-variant2__footer">


                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Mehr erfahren …</button>
                                </div>

                                <div class="gradient-button-wrapper">
                                    <button type="button" class="btn btn-white w-100">Plan wählen …</button>
                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- ab hier variant 1 -->
                    <div class="product-card">
                        <!-- Bild -->
                        <div class="product-card__image-wrapper">
                            <img
                                src="{{ URL::asset('assets/img/produkte/widget.jpg') }}"
                                alt="Widget Bild"
                                class="product-card__image"
                            />
                        </div>

                        <!-- Textinhalt -->

                        <div class="product-card__content">
                            <!-- Titel + Anbieter -->
                            <div class="product-card__header">
                                <h2 class="product-card__title">Barrierefrei Widget</h2>
                                <div class="product-card__provider-icons">
                                    <span class="product-card__provider product-card__provider--icon feature"></span>
                                    <span class="product-card__provider product-card__provider--icon audio"></span>

                                </div>

                            </div>

                            <!-- Kurzbeschreibung -->

                            <p class="product-card__description">
                                Einfache Integration in eine oder hunderte Websites – 100 % DSGVO-konform, BITV-ready und WCAG 2.1-kompatibel.
                                Einmal eingebunden, für jeden Nutzer sofort nutzbar. Für einen. Für alle.
                            <div class="alert alert alert-light mb-0"  style="font-size: 0.875rem; color: #2c292c;" role="alert">

                                <p class="mb-4">
                                    Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                    Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                                </p>

                            </div>


                            </p>

                            <!-- Tags -->
                            <div class="product-card__tags">
                                <span class="tag tag--dsgvo">DSGVO-konform</span>
                                <span class="tag tag--bitv">BITV ready</span>
                                <span class="tag tag--wcag">WCAG 2.1</span>
                            </div>

                            <div class="d-md-flex justify-content-center align-items-center">
                                <div class="mb-4 mb-md-0 me-md-5 me-lg-6 me-xl-7">
                                    <!--Title-->
                                    <h2 class="mb-3">Build stunning website faster than ever</h2>
                                    <!--text-->
                                    <p class="text-body-secondary mb-0">Your business deserve a stunning website. </p>
                                </div>
                                <!--Action-->
                                <a class="btn btn-outline-primary btn-hover-arrow" href="#!">
                                    <span>Purchase Now</span></a>
                            </div>

                        </div>
                    </div>

                    1.5

                    <div class="gb-card">

                            <img
                                src="{{ URL::asset('assets/img/produkte/leichte-sprache-audio.png') }}"
                                alt="Widget Bild"
                                class="product-card__image product-card__image--float"
                            />
                        <div class="product-card__header">
                            <h2  style="font-family:karla" class="">Barrierefrei Widget</h2>
                            <div class="product-card__provider-icons">
                                <span class="product-card__provider product-card__provider--icon feature"></span>
                                <span class="product-card__provider product-card__provider--icon audio"></span>

                            </div>

                        </div>
                        <div class="gb-card__body">
                            <p>

                                Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                            </p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>



                    <div class="gb-card gb-card--primary">
                        <h2 class="gb-card__title">Primäre Karte</h2>
                        <div class="gb-card__body">
                            <p>Dein Text hier…</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>

                    <div class="gb-card gb-card--light">
                        <h2 class="gb-card__title">Primäre Karte</h2>
                        <div class="gb-card__body">
                            <p>Dein Text hier…</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>

                    <div class="gb-card bg-gradient-primary">
                        <h2 class="gb-card__title">Primäre Karte</h2>
                        <div class="gb-card__body">
                            <p>Dein Text hier…</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>

                    <div class="gb-card gb-card--success">
                        <h2 class="gb-card__title">Rechtsgrundlage</h2>
                        <div class="gb-card__body">
                            <p>Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>

                    <div class="gb-card gb-card--danger">
                        <h2 class="gb-card__title">Rechtsgrundlage</h2>
                        <div class="gb-card__body">
                            <p>Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>

                    <div class="gb-card gb-card--warning">
                        <h2 class="gb-card__title">Rechtsgrundlage</h2>
                        <div class="gb-card__body">
                            <p>Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).</p>
                        </div>
                        <div class="gb-card__sidebar">
                            <span class="gb-card__block gb-card__block--top"></span>
                            <span class="gb-card__block gb-card__block--bottom"></span>
                        </div>
                    </div>



                    2

                    <!-- nz card alt -->
                    <div class="product-card">
                        <!-- Bild -->

                        <!-- Textinhalt -->
                        <div class="product-card__content">
                            <!-- Titel + Anbieter -->
                            <div class="product-card__header">
                                <h2 class="">Barrierefrei Widget</h2>
                                <div class="product-card__provider-icons">
                                    <span class="product-card__provider product-card__provider--icon feature"></span>
                                    <span class="product-card__provider product-card__provider--icon audio"></span>

                                </div>

                            </div>

                            <!-- Kurzbeschreibung -->
                            <p class="product-card__description">
                                <img
                                    src="{{ URL::asset('assets/img/produkte/widget.jpg') }}"
                                    alt="Widget Bild"
                                    class="product-card__image product-card__image--float"
                                />
                                Mit dem Widget signalisieren Sie nicht nur Sensibilität gegenüber Menschen mit Behinderung, sondern stärken auch Ihre Reichweite und Ihr Markenimage. Barrierefreie Angebote senken die Absprungrate, verbessern die Nutzerzufriedenheit und erfüllen zugleich aktuelle rechtliche Anforderungen (u. a. BITV 2.0, EU-Richtlinie 2016/2102).
                                <p>
                                Widget für digitale Barrierefreiheit – das steckt dahinter:

                                Unser Widget ist ein kleines, schnell eingebundenes Tool, das Ihre Website binnen weniger Minuten deutlich inklusiver macht. Es legt sich als schmale Leiste bzw. Schaltfläche über jede Seite und bietet dort zielgenaue Unterstützung für Nutzer*innen mit ganz unterschiedlichen Bedürfnissen.
                            </p>


                            </p>

                            <!-- Tags -->
                            <div class="gb-card gb-card--secondary mt--20">
                                <h2 class="gb-card__title">Rechtsgrundlage</h2>
                                <div class="gb-card__body">
                                    <p>Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).</p>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>

                            <div class="product-card__footer">
                                <div class="product-card__footer-info">
                                    <h3 class="">Die AfD hasst Barrierefreiheit</h3>
                                    <p class="product-card__footer-text">Sei kein Nazi, sorge für Inklusion</p>
                                </div>
                                <div class="product-card__footer-actions">
                                    <a href="#!" class="d-inline-block hover-lift me-2 mb-2 hover-shadow rounded-2">
                                        <div class="p-1 bg-gradient-primary d-inline-block rounded-2">
                                            <div class="btn pe-auto btn-white border-0 btn-hover-arrow">
                                                <span>Kaufen/span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="d-inline-block hover-lift me-2 mb-2 hover-shadow rounded-2">
                                        <div class="p-1 bg-gradient-primary d-inline-block rounded-2">
                                            <div class="btn pe-auto btn-white border-0 btn-hover-arrow">
                                                <span>mehr erfahren ... </span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>


{{--


                    <!-- nz card alt -->
                    <div class="product-card">
                        <!-- Bild -->

                        <!-- Textinhalt -->
                        <div class="product-card__content">
                            <!-- Titel + Anbieter -->
                            <div class="product-card__header">
                                <h2 class="">Barrierefrei Widget</h2>
                                <div class="product-card__provider-icons">
                                    <span class="product-card__provider product-card__provider--icon feature"></span>
                                    <span class="product-card__provider product-card__provider--icon audio"></span>

                                </div>

                            </div>

                            <!-- Kurzbeschreibung -->
                            <p class="product-card__description">
                                <img
                                    src="{{ URL::asset('assets/img/produkte/widget.jpg') }}"
                                    alt="Widget Bild"
                                    class="product-card__image product-card__image--float"
                                />
                                Einfache Integration in eine oder hunderte Websites – 100 % DSGVO-konform, BITV-ready und WCAG 2.1-kompatibel. Einmal eingebunden, für jeden Nutzer sofort nutzbar. Für einen. Für alle.

                            <div class="product-card__tags">
                                <span class="tag tag--dsgvo">DSGVO-konform</span>
                                <span class="tag tag--bitv">BITV ready</span>
                                <span class="tag tag--wcag">WCAG 2.1</span>
                            </div>

                            </p>

                            <!-- Tags -->

                            <div class="alert alert alert-light mb-3"  style="font-size: 0.875rem; color: #2c292c;" role="alert">

                                <p class="mb-4">
                                    Rechtsgrundlage: BITV 2.0, § 3 Abs. 1 i. V. m. Anlage 2, WCAG 2.1 – Success Criteria 1.4.x
                                    Deckt die Anforderung ab, dass Inhalte wahrnehmbar und vergrößerbar sind (Kontrast ≥ 4,5 : 1, Text-Zoom bis 200 %).
                                </p>

                            </div>






                            <div class="d-md-flex justify-content-center align-items-center">
                                <div class="mb-4 mb-md-0 me-md-5 me-lg-6 me-xl-7">
                                    <!--Title-->
                                    <h2 class="mb-3">Die AfD hasst Barrierefreiheit</h2>
                                    <!--text-->
                                    <p class="text-body-secondary mb-0">Sei kein Nazi, sorge für Inklusion </p>
                                </div>
                                <!--Action-->
                                <a class="btn btn-outline-primary btn-hover-arrow" href="#!">
                                    <span>jetzt kaufen ...</span></a>
                            </div>

                        </div>
                    </div>
--}}

<!-- -->
                    <div class="product-card mb-3"
                         style="display: flex; align-items: flex-start; gap: 1rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 0.75rem; background: white; max-width: 1000px; font-family: sans-serif;">
                        <!-- Bild -->
                        <div style="flex-shrink: 0;">
                            <img src="{{ URL::asset('assets/img/produkte/widget.jpg') }}" alt="Widget Bild" style="width: 200px; height: auto; border-radius: 0.5rem;">
                        </div>

                        <!-- Textinhalt -->
                        <div style="flex: 1;">
                            <!-- Titel + Anbieter -->
                            <div style="display: flex; justify-content: space-between; align-items: baseline;">
                                <div style="font-weight: 600; font-size: 1.125rem;">Barrierefrei Widget</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">von Aktion Barrierefrei</div>
                            </div>

                            <!-- Kurzbeschreibung -->
                            <div style="margin: 0.5rem 0; color: #4b5563; font-size: 0.95rem; line-height: 1.4;">
                                Einfache Integration für barrierefreie Websites. Optimiert für DSGVO, BITV und WCAG 2.1.
                            </div>

                            <!-- Tags -->
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 0.5rem;">
                                <span style="background-color: #ecfdf5; color: #065f46; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">DSGVO-konform</span>
                                <span style="background-color: #fef3c7; color: #92400e; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">BITV ready</span>
                                <span style="background-color: #e0f2fe; color: #0369a1; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">WCAG 2.1</span>
                            </div>
                        </div>
                    </div>



                    <div class="product-card mb-3 "
                         style="display: flex; align-items: flex-start; gap: 1rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 0.75rem; background: white; max-width: 800px; font-family: sans-serif;">
                        <!-- Bild -->
                        <div style="flex-shrink: 0;">
                            <img src="{{ URL::asset('assets/img/produkte/alt-star.jpg') }}" alt="Widget Bild" style="width: 200px; height: auto; border-radius: 0.5rem;">
                        </div>

                        <!-- Textinhalt -->
                        <div style="flex: 1;">
                            <!-- Titel + Anbieter -->
                            <div style="display: flex; justify-content: space-between; align-items: baseline;">
                                <div style="font-weight: 600; font-size: 1.125rem;">Barrierefrei Widget</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">von Aktion Barrierefrei</div>
                            </div>

                            <!-- Kurzbeschreibung -->
                            <div style="margin: 0.5rem 0; color: #4b5563; font-size: 0.95rem; line-height: 1.4;">
                                Einfache Integration für barrierefreie Websites. Optimiert für DSGVO, BITV und WCAG 2.1.
                            </div>

                            <!-- Tags -->
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 0.5rem;">
                                <span style="background-color: #ecfdf5; color: #065f46; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">DSGVO-konform</span>
                                <span style="background-color: #fef3c7; color: #92400e; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">BITV ready</span>
                                <span style="background-color: #e0f2fe; color: #0369a1; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">WCAG 2.1</span>
                            </div>
                        </div>
                    </div>


                    <div class="product-card"
                         style="display: flex; align-items: flex-start; gap: 1rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 0.75rem; background: white; max-width: 800px; font-family: sans-serif;">
                        <!-- Bild -->
                        <div style="flex-shrink: 0;">
                            <img src="{{ URL::asset('assets/img/produkte/leichte-sprache-vorlesen.jpg') }}" alt="Widget Bild" style="width: 200px; height: auto; border-radius: 0.5rem;">
                        </div>

                        <!-- Textinhalt -->
                        <div style="flex: 1;">
                            <!-- Titel + Anbieter -->
                            <div style="display: flex; justify-content: space-between; align-items: baseline;">
                                <div style="font-weight: 600; font-size: 1.125rem;">Barrierefrei Widget</div>
                                <div style="font-size: 0.875rem; color: #6b7280;">von Aktion Barrierefrei</div>
                            </div>

                            <!-- Kurzbeschreibung -->
                            <div style="margin: 0.5rem 0; color: #4b5563; font-size: 0.95rem; line-height: 1.4;">
                                Einfache Integration für barrierefreie Websites. Optimiert für DSGVO, BITV und WCAG 2.1.
                            </div>

                            <!-- Tags -->
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 0.5rem;">
                                <span style="background-color: #ecfdf5; color: #065f46; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">DSGVO-konform</span>
                                <span style="background-color: #fef3c7; color: #92400e; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">BITV ready</span>
                                <span style="background-color: #e0f2fe; color: #0369a1; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 0.375rem;">WCAG 2.1</span>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </section>
    <!--- ende produkts testsection -->

    <section class="position-relative bg-gradient-light">
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                <div class="col-lg-7 col-md-10 mx-auto text-center">
                    <span class="d-block text-primary mb-4" data-aos="zoom-in">Current Openings</span>
                    <h2 class="display-6 mb-0">Explore <span class="text-decoration-underline" data-aos
                                                             data-countup='{"startVal": 0,"suffix":"+"}' data-to="2730"
                                                             data-aos-id="countup:in">0</span><br> job opportunities</h2>
                </div>
            </div>
            <!--Jobs row-->
            <div class="row">
                <div class="col-md-6" data-aos="fade-up">


                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <!--company-->
                                <div class="mb-4 d-flex align-items-center">
                                    <img src="{{ URL::asset('assets/img/produkte/widget.jpg') }}"
                                         class="rounded-2 h-auto me-3 flex-shrink-0" style="width:200px" alt="">
                                    <h6 class="mb-0 flex-grow-1">Zenhub</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary d-block ps-3 flex-shrink-0">6 hours ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Frontend Engineer</h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>40K-80K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>Remote
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-code me-1"></i> Developer
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <!--company-->
                                <div class="d-flex align-items-center mb-4">
                                    <img src="{{ URL::asset('assets/img/companies/slack.svg') }}"
                                         class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                    <h6 class="mb-0 flex-grow-1">Slack</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary d-block ps-3 flex-shrink-0">13 hours ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Senior Content Designer</h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>40K-80K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>California, USA
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-color me-1"></i> Brand Designer
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <!--company-->
                                <div class="mb-4 d-flex align-items-center">
                                    <img src="{{ URL::asset('assets/img/companies/mailchimp.svg') }}"
                                         class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                    <h6 class="mb-0 flex-grow-1">Mailchimp</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary d-block ps-3 flex-shrink-0">20 hours ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Social Media Manager</h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>80K-120K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>Paris
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                        Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-paper-plane me-1"></i> Marketing
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <!--company-->
                                <div class="mb-4 d-flex align-items-center">
                                    <img src="{{ URL::asset('assets/img/companies/behance.svg') }}"
                                         class="width-6x rounded-2 h-auto me-3 flex-shrink-0 img-invert" alt="">
                                    <h6 class="mb-0 flex-grow-1">Behance</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary d-block ps-3 flex-shrink-0">2d ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Marketing Designer Associate </h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>60K-80K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>Remote
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-palette me-1"></i> Visual designer
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <!--company-->
                                <div class="mb-4 d-flex align-items-center">
                                    <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}"
                                         class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                    <h6 class="mb-0 flex-grow-1">Prosperops</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary d-block ps-3 flex-shrink-0">3d ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Senior User Researcher</h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>40K-80K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>Remote
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                        Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-code-curly me-1"></i> UX Designer
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <!--Job card-->
                    <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                        <!--Card-body-->
                        <div class="card-body p-4">
                            <div>
                                <div class="d-flex align-items-center mb-4">
                                    <!--company-->
                                    <img src="{{ URL::asset('assets/img/companies/dropbox.svg') }}"
                                         class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                    <h6 class="mb-0 flex-grow-1">Dropbox</h6>
                                    <!--Date-->
                                    <small class="text-body-secondary flex-shrink-0 d-block ps-3">5d ago</small>
                                </div>
                                <!--Job details-->
                                <div class="flex-grow-1">
                                    <div>
                                        <div class="flex-grow-1">
                                            <h4 class="mb-3">Product Marketing Manager</h4>
                                            <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-dollar me-1"></i>40K-80K
                                                </li>
                                                <li class="me-3 mb-2 d-flex align-items-center"><i
                                                        class="bx bx-map me-1"></i>Remote
                                                </li>
                                            </ul>
                                            <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                <!--Category-->
                                                <a href="{{ URL::asset('#!') }}"
                                                   class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                    <i class="bx bx-paper-plane me-1"></i> Marketing
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Link-->
                        <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="text-center pt-4">
                <a href="{{ URL::asset('#!') }}" class="link-underline fw-bold">Explore All Jobs <i
                        class="bx bx-right-arrow-alt fs-5"></i></a>
            </div>
        </div>
    </section>


    <section class="position-relative border-bottom" id="stories">
        <div class="container py-9 py-lg-11 position-relative z-1">


            <div data-aos="fade-up" class="row mb-7 aos-init aos-animate">
                <div class="col-lg-10 col-xl-7 mx-auto text-center">
                    <h1 class="display-5 mb-4">Trusted by the world’s most inspiring enterprises</h1>
                    <p>Latest customer stories</p>
                </div>
            </div>
            <div data-aos="fade-up" class="row mb-5 aos-init aos-animate">
                <div class="col-lg-12">
                    <div class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow-lg hover-lift">
                        <div class="col-md-4">
                            <div class="d-flex flex-column border-end-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100">
                                <img src="http://localhost:8004/assets/img/partners/deliveroo.svg" alt="" class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="ms-md-n9">
                                    <img src="http://localhost:8004/assets/img/avatar/1.jpg" alt="" class="avatar lg shadow-lg rounded-circle mb-4">
                                </div>
                                <div class="ps-md-9 pe-md-5">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Anastasia</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at Deliveroo</small>
                                    </div>
                                    <a href="#" class="link-underline fw-semibold">
                                        <span>Read full story</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="row mb-5 aos-init aos-animate">
                <div class="col-lg-12">
                    <div class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow-lg hover-lift">
                        <div class="col-md-4 order-md-last">
                            <div class="d-flex flex-column border-start-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100">
                                <img src="http://localhost:8004/assets/img/produkte/widget.jpg" alt="" class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="me-md-n9 order-md-last z-1">
                                    <img src="http://localhost:8004/assets/img/avatar/2.jpg" alt="" class="avatar lg shadow-lg rounded-circle mb-4">
                                </div>
                                <div class="pe-md-9 ps-md-5">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Anastasia</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at Deliveroo</small>
                                    </div>
                                    <a href="#" class="link-underline fw-semibold">
                                        <span>Read full story</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="row mb-5 aos-init aos-animate">
                <div class="col-lg-12">
                    <div class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow-lg hover-lift">
                        <div class="col-md-4">
                            <div class="d-flex flex-column border-end-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100">
                                <img src="http://localhost:8004/assets/img/partners/microsoft.svg" alt="" class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="ms-md-n9">
                                    <img src="http://localhost:8004/assets/img/avatar/7.jpg" alt="" class="avatar lg shadow-lg rounded-circle mb-4">
                                </div>
                                <div class="ps-md-9 pe-md-5">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Jeson</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at Microsoft</small>
                                    </div>
                                    <a href="#" class="link-underline fw-semibold">
                                        <span>Read full story</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="row mb-5 aos-init aos-animate">
                <div class="col-lg-12">
                    <div class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow-lg hover-lift">
                        <div class="col-md-4 order-md-last">
                            <div class="d-flex flex-column border-start-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100  h-100 border-light">
                                <img src="http://localhost:8004/assets/img/partners/google.svg" alt="" class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="me-md-n9 order-md-last z-1">
                                    <img src="http://localhost:8004/assets/img/avatar/6.jpg" alt="" class="avatar lg shadow-lg rounded-circle mb-4">
                                </div>
                                <div class="pe-md-9 ps-md-5">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Admond</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at Google</small>
                                    </div>
                                    <a href="#" class="link-underline fw-semibold">
                                        <span>Read full story</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="row mb-5 aos-init">
                <div class="col-lg-12">
                    <div class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow hover-lift">
                        <div class="col-md-4">
                            <div class="d-flex flex-column border-end-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100 border-light">
                                <img src="http://localhost:8004/assets/img/partners/didi.svg" alt="" class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="ms-md-n9">
                                    <img src="http://localhost:8004/assets/img/avatar/5.jpg" alt="" class="avatar lg shadow-lg rounded-circle mb-4">
                                </div>
                                <div class="ps-md-9 pe-md-5">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Jessica winfre</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at DIDI</small>
                                    </div>
                                    <a href="#" class="link-underline fw-semibold">
                                        <span>Read full story</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center aos-init" data-aos="fade-up">
                <a href="#!" class="btn btn-lg btn-primary rounded-pill">Archived stories
                    <i class="bx bx-history fs-4 ms-1 small"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="position-relative">
        <div class="container py-9 py-lg-11">
            <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                <div class="col-lg-8 mx-auto text-center">
                    <span class="d-block mb-4 text-primary" data-aos="fade-up">Job Categories</span>
                    <h2 class="display-6 mb-0" data-aos="fade-up">Explore <span
                            class="text-decoration-underline" data-aos
                            data-countup='{"startVal": 0,"suffix":"+"}' data-to="80"
                            data-aos-id="countup:in">0</span> job categories</h2>
                </div>
            </div>

            <!--Categories row-->
            <div class="row mb-4">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/netflix.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/slack.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>Business Management</h5>
                            <p class="mb-0 text-body-secondary">124 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/mailchimp.svg') }}"
                                             class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/tiktok.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>UI Designer</h5>
                            <p class="mb-0 text-body-secondary">76 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/dropbox.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/dribbble.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/airbnb.svg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>Software Engineer</h5>
                            <p class="mb-0 text-body-secondary">54 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                             class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/behance.svg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>Sales & Marketing</h5>
                            <p class="mb-0 text-body-secondary">28 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/airbnb.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                             class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>Data Science</h5>
                            <p class="mb-0 text-body-secondary">14 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card hover-lift hover-shadow-xl">
                        <!--card-body-->
                        <div class="card-body p-4">
                            <div class="d-flex mb-4 align-items-center">

                                <!--Companies group-->
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/tiktok.svg') }}" class="img-fluid" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                             class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <!--Campany-->
                                    <div
                                        class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                        <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5>Content Creator</h5>
                            <p class="mb-0 text-body-secondary">7 Jobs opportunities</p>
                        </div>
                        <!--link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ URL::asset('#!') }}" class="link-underline fw-bold">Explore All Categories <i
                        class="bx bx-right-arrow-alt ms-1 fs-5"></i> </a>
            </div>
        </div>
    </section>

    <section class="position-relative border-top">
        <!--Sparkles-->

        <div class="position-absolute w-100 start-0 mt-7 top-0 d-flex justify-content-center">
            <img src="{{ URL::asset('assets/img/vectors/sparkles.svg') }}" class="fill-primary w-100 w-lg-50 h-auto" data-inject-svg
                 alt="">
        </div>
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto position-relative">
                    <h2 class="display-6 mb-3 position-relative text-center">Get jobs direct to your Inbox </h2>
                    <p class="mb-5 text-center text-body-secondary">Subscribe to our newsletter</p>
                    <form novalidate class="needs-validation w-lg-75 mx-lg-auto">
                        <div class=" d-flex flex-md-row flex-column">
                            <input type="email" placeholder="Enter Email Address" required
                                   class="form-control form-control-lg mb-2 mb-md-0 me-md-2 flex-grow-1">
                            <button type="submit" class="btn btn-info btn-lg">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-assan-layout>
