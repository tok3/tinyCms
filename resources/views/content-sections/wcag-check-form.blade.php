{{--<div class="container">
    <h1>Barrierefreiheitsprüfung</h1>
    <form id="checkAccessibilityForm">
        @csrf
        <div class="mb-3">
            <label for="urlInput" class="form-label">Webseiten-URL</label>
            <input type="url" class="form-control" id="urlInput" name="url" value="https://aktion-barrierefrei.de" placeholder="https://example.com" required>
        </div>
        <button type="submit" class="btn btn-primary">Prüfung starten</button>
    </form>
    <div id="logOutput" class="mt-4">
        <h3>Protokoll:</h3>
        <pre id="logs"></pre>
    </div>
    <div id="resultOutput" class="mt-4" style="display: none;">
        <h3>Ergebnisse:</h3>
        <pre id="results"></pre>
    </div>
</div>--}}

<section class="position-relative p-4 border-top border-bottom">
<style>
/*
    #summaryOutput {
        display: none; !* Start: unsichtbar *!
        opacity: 0; !* Anfangs unsichtbar *!
        transition: opacity 1.5s ease; !* Weicher Übergang der Sichtbarkeit *!
    }
    #summaryOutput.fade-in {
        display: block; !* Block anzeigen *!
        opacity: 1; !* Sichtbar *!
    }*/

/* Progress Output - Anfangszustand */
#progressOutput {
    opacity: 1; /* Sichtbar */
    height: 50px; /* Höhe der Progressbar */
    overflow: hidden; /* Inhalt bei Animation beschneiden */
    transition: opacity 0.5s ease, height 0.5s ease; /* Animationsübergänge */
}

/* Progress Output - Ausblenden */
#progressOutput.fade-out {
    opacity: 0; /* Unsichtbar */
    height: 0; /* Höhe auf 0 reduzieren */
}

/* Summary Output - Anfangszustand */
#summaryOutput {
    opacity: 0; /* Unsichtbar */
    transform: translateY(10px); /* Leicht nach unten verschoben */
    transition: opacity 0.5s ease, transform 0.5s ease; /* Übergänge */
}

/* Summary Output - Einblenden */
#summaryOutput.fade-in {
    opacity: 1; /* Sichtbar */
    transform: translateY(0); /* Zur Normalposition */
}
.pulse-label {
    animation: pulse 1.5s infinite;
    color: #ff5722; /* Helle Farbe */
    font-weight: bold;
    text-shadow: 0 0 5px rgba(255, 87, 34, 0.8), 0 0 10px rgba(255, 87, 34, 0.6);
}

@keyframes pulse {
    0% {
        transform: scale(1);
        text-shadow: 0 0 5px rgba(255, 87, 34, 0.8), 0 0 10px rgba(255, 87, 34, 0.6);
    }
    50% {
        transform: scale(1.1);
        text-shadow: 0 0 15px rgba(255, 87, 34, 0.9), 0 0 25px rgba(255, 87, 34, 0.7);
    }
    100% {
        transform: scale(1);
        text-shadow: 0 0 5px rgba(255, 87, 34, 0.8), 0 0 10px rgba(255, 87, 34, 0.6);
    }
}
</style>



<div class="container ">



    <form id="checkAccessibilityForm">
        @csrf
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <!--Heading-->
                <h2 class="h1 mb-3">
                    {!! $data['heading'] !!}
                </h2>
                <!--Text-->
                <p class="mb-5 mb-lg-0">
                    {!! $data['subtext'] !!}
                </p>
            </div>
            <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                <!--Form-->
                <form novalidate="" class="needs-validation">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="mb-2 flex-grow-1 mb-md-0 me-md-2">
                            <input type="url"  id="urlInput" name="url" required="required" class="form-control" placeholder="Webseiten-URL" value="https://aktion-barrierefrei.de">
                        </div>
                        <div class="flex-shrink-0">
                            <button type="submit" class="btn btn-primary">Prüfung starten</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </form>

    <!-- Progress Bar -->
    <div id="progressOutput"  data-aos-delay="200">
        <div class="progress-bar text-white mt-5" id="progressBar" style="width: 0%; height: 20px; background: blue;"></div>
        <p id="progressText"></p>
    </div>

    <!-- Errors Card -->
{{--    <div id="summaryOutput" class="mt-5" style="display:none;" data-aos="fade-right">--}}
<div>
        <div class="row row justify-content-between align-items-center">
            <!-- Linke Spalte (9 Spalten breit) -->
            <div class="col-7 ">
                <!-- Inhalt der linken Spalte -->
                <!-- Errors Card -->
                <div class="container position-relative " data-aos="fade-right" data-aos-delay="200">
                    <div class="row align-items-center">
                        <div class="col-md-4  text-center mb-5">
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <div class="position-absolute start-50 translate-middle-x bottom-0 bg-danger rounded-4 w-75 h-75"></div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 id="totalErrors" class="display-6">0</h2>
                                    <h6 class="mb-0">Fehler</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Warnings Card -->
                        <div class="col-md-4 text-center mb-5">
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <div class="position-absolute start-50 translate-middle-x bottom-0 bg-warning rounded-4 w-75 h-75"></div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 id="totalWarnings" class="display-6">0</h2>
                                    <h6 class="mb-0">Warnungen</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Notices Card -->
                        <div class="col-md-4 text-center mb-5">
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <div class="position-absolute start-50 translate-middle-x bottom-0 bg-info rounded-4 w-75 h-75"></div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 id="totalNotices" class="display-6">0</h2>
                                    <h6 class="mb-0">Empfehlungen</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- cta -->



            </div>

            <!-- Rechte Spalte (3 Spalten breit) -->
            <div class="col-5 col-md-4">

                {!! $data['resulttext'] !!}

            </div>
        </div>

    <!-- cta -->
    <div class="container py-4 py-lg-6">
        <div class="bg-body overflow-hidden shadow-lg px-4 py-6 px-lg-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9 col-md-8">
                    <!--Sub-heading-->
                    <h6 data-aos="zoom-in" class="mb-3 text-success aos-init aos-animate">Are you interested?</h6>
                    <!--Heading-->
                    <h2 class="mb-3 display-5 aos-init aos-animate" data-aos="zoom-in-up" data-aos-delay="100">
                        Let's build something awesome
                    </h2>
                    <!--Text-->
                    <p class="mb-5 mb-md-0 pe-lg-11 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                        Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                        industries for previewing layouts and visual mockups.
                    </p>
                </div>
                <!--End Col-->
                <div class="col-lg-3 col-md-4 text-md-end">
                    <!--Action-->
                    <div data-aos="fade-left" data-aos-delay="200" class="aos-init aos-animate">
                        <a href="#!" class="btn btn-primary btn-lg">
                            <span>Get started</span>
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
<!-- ende cta -->
    </div>
</div>

</section>
