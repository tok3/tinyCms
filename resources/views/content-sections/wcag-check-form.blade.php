<section class="position-relative p-4  @if(!empty($data['border-top'])) border-top @endif mt-4 @if(!empty($data['border-bottom'])) border-bottom @endif">
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
                <div class="col-lg-6 col-xl-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"  _style="background-image: url('{{asset('assets/img/backgrounds/fluff.png') }}');">
                    <!--Heading-->
                    <h2 class="h1 mb-3 ">
                        {!! $data['heading'] !!}
                    </h2>
                    <!--Text-->
                    <p class="mb-5 mb-lg-0 ">
                        {!! $data['subtext'] !!}
                    </p>
                </div>
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                    <!--Form-->
                    <div id="errorOutput" style="display: none;" class="alert alert-warning">
                        <h4>Fehler</h4>Es konnte keine gültige Antwort von der angegebenen URL empfangen werden.
                        Möglicherweise liegt das Problem daran, dass die URL falsch eingegeben wurde oder dass JavaScript-Overlays (zum Beispiel Cookie-Consent-Banner) den Scan blockieren.
                        Bitte überprüfen Sie die URL und stellen Sie sicher, dass alle störenden Overlays deaktiviert sind, und versuchen Sie es erneut.
                    </div>
                    <style>

                        #urllabel{
                            /*height:0px;
                            width:0px !important;
                           */
                            position:absolute;
                            top:2.2em;
                            margin-left:0.2em;
                        }
                    </style>
                    <form novalidate="" class="needs-validation">
                        <div class="d-flex flex-column flex-md-row">
                            <div class="mb-2 flex-grow-1 mb-md-0 me-md-2">
                                <label for="urlInput" id="urllabel" class="shrink">Zu prüfende URL eingeben</label>
                                <input type="url" id="urlInput" name="url" required="required" placeholder="https://ihre-domain.de"  class="form-control" >
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
        <div id="summaryOutput" class="mt-5" style="display:none;" data-aos="fade-right">

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

                </div>

                <!-- Rechte Spalte (3 Spalten breit) -->
                <div class="col-5 col-md-4">

                    {!! $data['resulttext'] !!}

                </div>
            </div>

            {{-- Trial: Detaillierte Einsicht anfordern (zunächst versteckt) --}}

            <div  class="container py-4 py-lg-6">
                <div class="bg-body overflow-hidden shadow-lg px-4 py-6 px-lg-5">
                    <div id="trialFormSection" class="container py-4" style="display:none;">
                        <h2 class="mb-3 display-5">Detaillierte Einsicht jetzt anfordern</h2>
                        <p class="mb-5 mb-md-0 pe-lg-11 lead" data-page-text>
                            senden Sie einfach das Formular ab, um <mark-green><strong>sofort kostenlos</strong></mark-green> Zugriff auf die detaillierte Fehleranalyse der URL <strong>%%page%%</strong> Ihrer Online-Präsenz zu erhalten.
                        </p>
                        <div id="trialAlert" class="alert d-none mt-5" role="alert"></div>

                        <form class="mt-5" id="trialForm" method="post" action="{{ route('trial.store') }}" novalidate>
                            @csrf
                            {{-- Hidden URL – wird aus #urlInput übernommen --}}
                            <input type="hidden" id="trial_url" name="url" value="">

                            <div class="mb-3">
                                <label for="trial_first_name" class="form-label">Vorname</label>
                                <input type="text" id="trial_first_name" name="first_name" class="form-control"
                                       placeholder="Vorname" required>
                                <div class="invalid-feedback" data-field="first_name"></div>
                            </div>

                            <div class="mb-3">
                                <label for="trial_last_name" class="form-label">Nachname</label>
                                <input type="text" id="trial_last_name" name="last_name" class="form-control"
                                       placeholder="Name" required>
                                <div class="invalid-feedback" data-field="last_name"></div>
                            </div>

                            <div class="mb-3">
                                <label for="trial_email" class="form-label">E-Mail</label>
                                <input type="email" id="trial_email" name="email" class="form-control"
                                       placeholder="ihre@mailadresse.de" required>
                                <div class="invalid-feedback" data-field="email"></div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="trial_consent" name="consent" required>
                                <label class="form-check-label" for="trial_consent">
                                    Ja, ich stimme den Datenschutzbestimmungen zu.
                                </label>
                                <div class="invalid-feedback d-block" data-field="consent"></div>
                            </div>

                            {{-- Honeypot --}}
                            <input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off">

                            <button class="btn btn-primary" type="submit" id="trialSubmitBtn">
                                Jetzt kostenlos anfordern
                            </button>
                        </form>
                        <div id="trialSuccessMessage" style="display:none;"></div>
                    </div>
                </div>
            </div>
            {{-- ENDE Trial: Detaillierte Einsicht anfordern (zunächst versteckt) --}}
            <!-- cta -->
            @if($data['showCta'] == 1)
                <div id="ctaSection" class="container py-4 py-lg-6 cta-hidden">
                    <div class="bg-body overflow-hidden shadow-lg px-4 py-6 px-lg-5">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-9 col-md-8">
                                <!--Sub-heading-->
                                <h6 class="mb-3 text-success">{!! $data['ctaHeadingSmall'] !!}</h6>
                                <!--Heading-->
                                <h2 class="mb-3 display-5">
                                    {!! $data['ctaHeading'] !!}
                                </h2>
                                <!--Text-->
                                <p class="mb-5 mb-md-0 pe-lg-11">
                                    {!! $data['ctaText'] !!}
                                </p>
                            </div>
                            <!--End Col-->
                            <div class="col-lg-3 col-md-4 text-md-end">
                                <!--Action-->
                                <div>
                                    <a href="{!! $data['ctaButtonTarget'] !!}" class="btn {!! $data['ctaButtonAppearance'] !!} btn-lg">{!! $data['ctaButtonText'] !!}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- ende cta -->
        </div>
    </div>

<script>
  function isFunUrl(url) {
      if (!url) return false;
      var u = String(url).trim().toLowerCase();
      // Hier alle Domains/URLs eintragen, bei denen der Slot-Modus aktiv sein soll
      var patterns = [
          'aktion-barrierefrei.org',
          'www.aktion-barrierefrei.org'
      ];
      return patterns.some(function (p) {
          return u.indexOf(p) !== -1;
      });
  }

  function startSlotMachineDisplay(errorEl, warningEl, noticeEl) {
      var symbols = ['STAR', 'COIN', 'BAR', 'SEVEN'];
      var elements = [errorEl, warningEl, noticeEl];
      var spins = 0;
      var maxSpins = 25;
      var interval = setInterval(function () {
          spins++;
          elements.forEach(function (el) {
              if (!el) return;
              var idx = Math.floor(Math.random() * symbols.length);
              el.textContent = symbols[idx];
          });
          if (spins >= maxSpins) {
              clearInterval(interval);
          }
      }, 80);
  }

  document.getElementById('checkAccessibilityForm').addEventListener('submit', async function (e) {
      e.preventDefault();

      var url = document.getElementById('urlInput').value.trim();
      if (!url) {
          alert('Bitte geben Sie eine gültige URL ein.');
          return;
      }

      var progressOutput = document.getElementById('progressOutput');
      var progressBar = document.getElementById('progressBar');
      var progressText = document.getElementById('progressText');
      var summaryOutput = document.getElementById('summaryOutput');
      var totalErrors = document.getElementById('totalErrors');
      var totalWarnings = document.getElementById('totalWarnings');
      var totalNotices = document.getElementById('totalNotices');
      var errorOutput = document.getElementById('errorOutput');

      summaryOutput.style.display = 'none';
      errorOutput.style.display = 'none';
      progressOutput.classList.remove('fade-out');
      progressBar.style.width = '0%';
      progressText.textContent = 'Prüfung läuft...';

      // Beispielhafte Simulation eines Prüfprozesses
      var progress = 0;
      var interval = setInterval(function () {
          progress += 10;
          progressBar.style.width = progress + '%';
          progressText.textContent = 'Prüfung läuft... ' + progress + '%';
          if (progress >= 100) {
              clearInterval(interval);
              fadeOutProgressAndShowSummary();
          }
      }, 300);

      function fadeOutProgressAndShowSummary() {
          progressOutput.classList.add('fade-out');
          setTimeout(function () {
              progressOutput.style.display = 'none';
              summaryOutput.style.display = 'block';
              summaryOutput.classList.add('fade-in');

              // Beispiel: Fehlerzahlen setzen
              totalErrors.textContent = '5';
              totalWarnings.textContent = '3';
              totalNotices.textContent = '2';

              if (isFunUrl(url)) {
                  // Slot-Maschinen-Modus für definierte URLs
                  startSlotMachineDisplay(totalErrors, totalWarnings, totalNotices);
              } else {
                  // Normale Zahl-Animation
                  if (window.startErrorCountUp) {
                      window.startErrorCountUp(parseInt(totalErrors.textContent || '0', 10));
                  }
                  if (window.startWarningCountUp) {
                      window.startWarningCountUp(parseInt(totalWarnings.textContent || '0', 10));
                  }
                  if (window.startNoticeCountUp) {
                      window.startNoticeCountUp(parseInt(totalNotices.textContent || '0', 10));
                  }
              }
          }, 500);
      }
  });
</script>
</section>
