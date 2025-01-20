<x-page-layout >
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">
    @endsection

        <main>
            <section class="position-relative bg-gradient-blue text-white">
                <div class="container pt-12 pb-9 pb-lg-12 position-relative z-2">

                    {{$rule->rule_id}}


                 {!! $description !!}
                    {!! $whyImportantHtml !!}
                    <!--/.row--></div>
            </section>

        </main>    {{-- @include('content-sections.countdown-timer')--}}




    @push('scripts')

        <script src="{{url('js/repeating-countdown-timer/js/app.js')}}?t={{time()}}"></script>



        <script>
            document.getElementById('checkAccessibilityForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const url = document.getElementById('urlInput').value;
                const progressOutput = document.getElementById('progressOutput');
                const progressBar = document.getElementById('progressBar');
                const progressText = document.getElementById('progressText');
                const summaryOutput = document.getElementById('summaryOutput');
                const totalErrors = document.getElementById('totalErrors');
                const totalWarnings = document.getElementById('totalWarnings');
                const totalNotices = document.getElementById('totalNotices');

                // Reset UI
                progressOutput.style.display = 'block';
                progressBar.style.width = '0%';
                progressBar.textContent = '0%';
                progressText.textContent = 'Starte...';
                summaryOutput.style.display = 'none';
                summaryOutput.classList.remove('fade-in');
                progressOutput.classList.remove('fade-out');

                let simulatedProgress = 0; // Simulierter Fortschritt
                let backendProgress = 0; // Fortschritt vom Backend
                let resultsFetched = false;
                let backendSyncAllowed = false; // Synchronisation mit Backend verzögern
                let isPulsing = false; // Steuert das Pulsieren des Labels

                // **Simulierte Fortschrittsanimation**
                const simulatedInterval = setInterval(() => {
                    if (simulatedProgress < 45 && !backendSyncAllowed) {
                        // Fortschritt bis zu 45 % vor Backend-Synchronisation
                        simulatedProgress += 2;
                    } else if (simulatedProgress < 75 && backendProgress < 75) {
                        // Langsame Bewegung zwischen 50 % und 75 %
                        simulatedProgress += 1;
                    } else if (simulatedProgress >= 75 && simulatedProgress < 100 && backendProgress < 100) {
                        // Langsame Bewegung von 75 % bis 100 %, wenn Backend noch nicht abgeschlossen ist
                        simulatedProgress += 2; // Schrittweise um 2 % erhöhen
                    } else if (backendProgress >= 100 && simulatedProgress < backendProgress) {
                        // Synchronisiere mit Backend, sanfter Übergang auf 100 %
                        progressBar.style.transition = 'width 1.5s ease-in-out';
                        simulatedProgress = backendProgress;
                    }

                    // Fortschrittsanzeige aktualisieren
                    progressBar.style.width = simulatedProgress + '%';
                    progressBar.textContent = simulatedProgress + '%';

                    // Puls-Effekt aktivieren, wenn zwischen 50 % und 75 %
                    if (simulatedProgress >= 50 && simulatedProgress < 75 && !isPulsing) {
                        isPulsing = true;
                        progressText.classList.add('pulse-label'); // Puls-Effekt starten
                    }

                    // Puls-Effekt stoppen, wenn über 75 %
                    if (simulatedProgress >= 75 && isPulsing) {
                        isPulsing = false;
                        progressText.classList.remove('pulse-label'); // Puls-Effekt stoppen
                    }

                    // Simulation stoppen, wenn Backend abgeschlossen ist
                    if (simulatedProgress >= 100) {
                        clearInterval(simulatedInterval);
                    }
                }, 300); // Fortschritt alle 300 ms hochzählen

                // **Backend-Scan starten**
                fetch('{{ route('accessibility.check') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ url })
                })
                    .then(async (response) => {
                        const reader = response.body.getReader();
                        const decoder = new TextDecoder("utf-8");
                        let buffer = ""; // Puffer für unvollständige JSON-Daten

                        // Synchronisation mit Backend nach 3 Sekunden erlauben
                        setTimeout(() => {
                            backendSyncAllowed = true;
                        }, 3000);

                        while (true) {
                            const { value, done } = await reader.read();
                            if (done) break;

                            buffer += decoder.decode(value);

                            // Verarbeite vollständige JSON-Zeilen
                            let lines = buffer.split("\n");
                            buffer = lines.pop(); // Letzte (unvollständige) Zeile im Puffer belassen

                            for (let line of lines) {
                                try {
                                    const data = JSON.parse(line);

                                    // Backend-Fortschritt aktualisieren
                                    if (data.progress) {
                                        backendProgress = data.progress;

                                        if (backendSyncAllowed) {
                                            simulatedProgress = Math.max(simulatedProgress, backendProgress);
                                        }
                                    }

                                    // Ergebnisse anzeigen, wenn vorhanden
                                    if (data.summary) {
                                        totalErrors.textContent = data.summary.errors || 0;
                                        totalWarnings.textContent = data.summary.warnings || 0;
                                        totalNotices.textContent = data.summary.notices || 0;

                                        resultsFetched = true;
                                        clearInterval(simulatedInterval); // Simulierte Fortschrittsaktualisierung stoppen

                                        // Fortschritt abschließen mit Kunstkniff
                                        progressBar.style.transition = 'width 2.5s cubic-bezier(0.25, 1, 0.5, 1)';
                                        progressBar.style.width = '100%';
                                        progressBar.textContent = '100%';

                                        setTimeout(() => {
                                            progressText.textContent = 'Scan abgeschlossen!';
                                            fadeOutProgressAndShowSummary();
                                        }, 2500);
                                    }
                                } catch (e) {
                                    console.error('Fehler beim Parsen des Fortschritts:', e);
                                }
                            }
                        }
                    })
                    .catch((error) => {
                        progressText.textContent = 'Fehler beim Prüfen der URL.';
                        console.error('Fehler bei der Anfrage:', error);
                    });

                function fadeOutProgressAndShowSummary() {
                    // Progressbar ausblenden
                    progressOutput.classList.add('fade-out');

                    // Summary sofort anzeigen und Fade-In starten
                    summaryOutput.style.display = 'block';
                    summaryOutput.classList.add('fade-in');

                    // CountUp-Animation starten
                    if (window.startErrorCountUp) {
                        window.startErrorCountUp(parseInt(totalErrors.textContent));
                    }
                    if (window.startWarningCountUp) {
                        window.startWarningCountUp(parseInt(totalWarnings.textContent));
                    }
                    if (window.startNoticeCountUp) {
                        window.startNoticeCountUp(parseInt(totalNotices.textContent));
                    }

                    setTimeout(() => {
                        progressOutput.style.display = 'none'; // Nach Fade-Out komplett verstecken
                    }, 500); // Schneller Fade-Out passend zur Transition
                }





            });



        </script>



        <script type="module">
            import { CountUp } from 'https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js';

            // Errors CountUp
            window.startErrorCountUp = (errorCount) => {
                const countUp = new CountUp('totalErrors', errorCount, { duration: 5 });
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };

            // Warnings CountUp
            window.startWarningCountUp = (warningCount) => {
                const countUp = new CountUp('totalWarnings', warningCount, { duration: 9 });
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };

            // Notices CountUp
            window.startNoticeCountUp = (noticeCount) => {
                const countUp = new CountUp('totalNotices', noticeCount, { duration: 9 });
                if (!countUp.error) {
                    countUp.start();
                } else {
                    console.error(countUp.error);
                }
            };


        </script>

    @endpush
</x-page-layout>
