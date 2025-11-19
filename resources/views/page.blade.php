<x-page-layout navbarType="{{$page->navbar_type}}" page="{!! $page !!}">
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">
        <style>
            /* Fixed Alert über der Navbar */
            .page-alert{
                position: fixed;
                left: 50%;
                transform: translateX(-50%);
                top: calc(var(--navbar-height, 64px) + 10px); /* 64px anpassen, falls deine Navbar höher ist */
                z-index: 1080; /* höher als Navbar (Bootstrap-Navbar ~1030) */
                width: min(920px, calc(100% - 2rem)); /* hübsche Breite */
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow page-alert" role="alert">
            {!!  session('success')  !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow page-alert" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif




    {{-- @include('content-sections.countdown-timer')--}}


    {!! $content !!}



    @push('scripts')

        <script src="{{url('js/repeating-countdown-timer/js/app.js')}}?t={{time()}}"></script>
        <script src="{{url('js/wcag-check.js')}}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const csrf      = document.querySelector('meta[name="csrf-token"]')?.content;
                const urlInput  = document.getElementById('urlInput');
                const summary   = document.getElementById('summaryOutput');
                const trialBox  = document.getElementById('trialFormSection');
                const trialForm = document.getElementById('trialForm');
                const trialUrl  = document.getElementById('trial_url');
                const trialAlert= document.getElementById('trialAlert');
                const submitBtn = document.getElementById('trialSubmitBtn');
                const textNodes  = document.querySelectorAll('[data-page-text]');
                if (!trialForm) return; // falls die Trial-Box auf anderen Seiten nicht existiert

                // URL aus dem Check-Form übernehmen (initial + on input)
                const syncUrl = () => {
                    const currentUrl = urlInput?.value || '';
                    if (trialUrl) trialUrl.value = currentUrl;

                    textNodes.forEach(node => {
                        node.innerHTML = node.innerHTML.replace(/%%page%%/g, currentUrl);
                    });
                };

                syncUrl();
                urlInput?.addEventListener('input', syncUrl);

                // Trial-Form einblenden, sobald Summary sichtbar ist
                const showTrial = () => { if (trialBox && trialBox.style.display === 'none') trialBox.style.display = 'block'; };
                if (summary && (getComputedStyle(summary).display !== 'none' || summary.classList.contains('fade-in'))) {
                    showTrial();
                } else if (summary) {
                    const mo = new MutationObserver(() => {
                        if (summary.classList.contains('fade-in') || getComputedStyle(summary).display !== 'none') {
                            showTrial(); mo.disconnect();
                        }
                    });
                    mo.observe(summary, { attributes: true, attributeFilter: ['class','style'] });
                }

                // AJAX Submit des Trial-Forms
                trialForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    // UI reset
                    trialAlert.className = 'alert d-none';
                    trialAlert.textContent = '';
                    trialForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                    trialForm.querySelectorAll('.invalid-feedback[data-field]').forEach(el => el.textContent = '');

                    submitBtn.disabled = true;

                    try {
                        const resp = await fetch(trialForm.getAttribute('action'), {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': csrf || '', 'Accept': 'application/json' },
                            body: new FormData(trialForm),
                        });

                        if (resp.ok) {
                            trialForm.classList.add('d-none');           // oder: trialForm.style.display = 'none';

                            // Erfolgsmeldung anzeigen
                            trialAlert.className = 'alert alert-success mt-5'; // entfernt d-none
                            trialAlert.innerHTML = '<strong>Fast geschafft!</strong><br>Wir haben Ihnen eine E-Mail zum Freischalten Ihres Benutzerkontos zugesendet. Bitte prüfen Sie Ihren Posteingang und klicken Sie auf den Link, um Ihre E-Mail zu bestätigen und die Analyse zu öffnen. Sollten Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue zu.';

                        } else if (resp.status === 422) {
                            const data = await resp.json();
                            const errors = data.errors || {};
                            Object.entries(errors).forEach(([field, messages]) => {
                                const input = trialForm.querySelector(`[name="${field}"]`);
                                input?.classList.add('is-invalid');
                                const fb = trialForm.querySelector(`.invalid-feedback[data-field="${field}"]`);
                                if (fb) fb.textContent = Array.isArray(messages) ? messages[0] : String(messages);
                            });
                            trialAlert.className = 'alert alert-warning';
                            trialAlert.textContent = 'Bitte Eingaben prüfen.';
                        } else {
                            trialAlert.className = 'alert alert-danger';
                            trialAlert.textContent = 'Unerwarteter Fehler. Bitte später erneut versuchen.';
                        }
                    } catch (e2) {
                        trialAlert.className = 'alert alert-danger';
                        trialAlert.textContent = 'Netzwerkfehler. Bitte später erneut versuchen.';
                        console.error(e2);
                    } finally {
                        submitBtn.disabled = false;
                    }
                });
            });
        </script>

            <script>
                document.getElementById('checkAccessibilityForm').addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const url             = document.getElementById('urlInput').value;
                    const progressOutput  = document.getElementById('progressOutput');
                    const progressBar     = document.getElementById('progressBar');
                    const progressText    = document.getElementById('progressText');
                    const summaryOutput   = document.getElementById('summaryOutput');
                    const totalErrors     = document.getElementById('totalErrors');
                    const totalWarnings   = document.getElementById('totalWarnings');
                    const totalNotices    = document.getElementById('totalNotices');
                    const errorOutput     = document.getElementById('errorOutput');

                    // UI zurücksetzen
                    progressOutput.style.display = 'block';
                    progressBar.style.width = '0%';
                    progressBar.textContent = '0%';
                    progressText.textContent = 'Starte...';
                    summaryOutput.style.display = 'none';
                    summaryOutput.classList.remove('fade-in');
                    progressOutput.classList.remove('fade-out');
                    if (errorOutput) errorOutput.style.display = 'none';

                    let simulatedProgress   = 0;
                    let backendProgress     = 0;
                    let resultsFetched      = false;
                    let backendSyncAllowed  = false;
                    let isPulsing           = false;

                    // Simulierter Fortschritt
                    const simulatedInterval = setInterval(() => {
                        if (simulatedProgress < 45 && !backendSyncAllowed) {
                            simulatedProgress += 2;
                        } else if (simulatedProgress < 75 && backendProgress < 75) {
                            simulatedProgress += 1;
                        } else if (simulatedProgress >= 75 && simulatedProgress < 100 && backendProgress < 100) {
                            simulatedProgress += 2;
                        } else if (backendProgress >= 100 && simulatedProgress < backendProgress) {
                            progressBar.style.transition = 'width 1.5s ease-in-out';
                            simulatedProgress = backendProgress;
                        }
                        progressBar.style.width = simulatedProgress + '%';
                        progressBar.textContent = simulatedProgress + '%';

                        if (simulatedProgress >= 50 && simulatedProgress < 75 && !isPulsing) {
                            isPulsing = true;
                            progressText.classList.add('pulse-label');
                        }
                        if (simulatedProgress >= 75 && isPulsing) {
                            isPulsing = false;
                            progressText.classList.remove('pulse-label');
                        }
                        if (simulatedProgress >= 100) {
                            clearInterval(simulatedInterval);
                        }
                    }, 300);

                    // Hilfsfunktion: Progress ausblenden & Summary zeigen
                    function fadeOutProgressAndShowSummary() {
                        progressOutput.classList.add('fade-out');
                        summaryOutput.style.display = 'block';
                        summaryOutput.classList.add('fade-in');

                        if (window.startErrorCountUp)   window.startErrorCountUp(parseInt(totalErrors.textContent || '0', 10));
                        if (window.startWarningCountUp) window.startWarningCountUp(parseInt(totalWarnings.textContent || '0', 10));
                        if (window.startNoticeCountUp)  window.startNoticeCountUp(parseInt(totalNotices.textContent || '0', 10));

                        setTimeout(() => { progressOutput.style.display = 'none'; }, 500);
                    }

                    // Nach 3 Sek. Backend-Sync erlauben (fühlt sich flüssiger an)
                    setTimeout(() => { backendSyncAllowed = true; }, 3000);

                    try {
                        const resp = await fetch('{{ route('accessibility.check') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            credentials: 'same-origin', // Session-Cookie mit senden (hilft gegen 419 lokal)
                            body: JSON.stringify({ url })
                        });

                        const ct = (resp.headers.get('content-type') || '').toLowerCase();
                        if (!resp.ok || (!ct.includes('application/x-ndjson') && !ct.includes('text/plain'))) {
                            // Kein NDJSON: Volltext ziehen, Fehler anzeigen
                            const text = await resp.text();
                            console.error('Unexpected response:', resp.status, ct, text.slice(0, 1000));
                            clearInterval(simulatedInterval);
                            progressBar.style.transition = 'width 1.5s ease-in-out';
                            progressBar.style.width = '0%';
                            progressBar.textContent = '0%';
                            progressText.textContent = 'Scan-Fehler';
                            if (errorOutput) errorOutput.style.display = 'block';
                            summaryOutput.style.display = 'none';
                            return;
                        }

                        if (!resp.body) {
                            throw new Error('Leere Antwort vom Server.');
                        }

                        const reader  = resp.body.getReader();
                        const decoder = new TextDecoder('utf-8');
                        let buffer    = '';

                        const handleLine = (raw) => {
                            let line = (raw || '').trim();
                            if (!line) return;                  // leere Zeile ignorieren
                            if (line.startsWith('data:')) {
                                line = line.slice(5).trim();    // SSE "data: {...}"
                                if (!line) return;
                            }
                            if (line.startsWith('<')) {
                                // HTML/Whoops/Debugbar – Stream ist "verschmutzt"
                                throw new Error('HTML/Debug-Ausgabe im Stream erkannt.');
                            }

                            const data = JSON.parse(line);

                            // Fehler-Event
                            if (data.step && String(data.step).toLowerCase() === 'error') {
                                clearInterval(simulatedInterval);
                                progressBar.style.transition = 'width 1.5s ease-in-out';
                                progressBar.style.width = '0%';
                                progressBar.textContent = '0%';
                                progressText.textContent = data.message || 'Scan-Fehler';
                                if (errorOutput) errorOutput.style.display = 'block';
                                summaryOutput.style.display = 'none';
                                throw new Error(data.message || 'Scan-Fehler'); // beendet das Lesen
                            }

                            // Fortschritt
                            if (typeof data.progress === 'number') {
                                backendProgress = Math.max(0, Math.min(100, data.progress));
                                if (backendSyncAllowed) {
                                    simulatedProgress = Math.max(simulatedProgress, backendProgress);
                                }
                            }

                            // Zusammenfassung
                            if (data.summary) {
                                totalErrors.textContent   = data.summary.errors   ?? 0;
                                totalWarnings.textContent = data.summary.warnings ?? 0;
                                totalNotices.textContent  = data.summary.notices  ?? 0;

                                resultsFetched = true;
                                clearInterval(simulatedInterval);
                                progressBar.style.transition = 'width 2.5s cubic-bezier(0.25, 1, 0.5, 1)';
                                progressBar.style.width = '100%';
                                progressBar.textContent = '100%';

                                setTimeout(() => {
                                    progressText.textContent = 'Scan abgeschlossen!';
                                    fadeOutProgressAndShowSummary();
                                }, 2500);
                            }
                        };

                        // Stream lesen
                        while (true) {
                            const { value, done } = await reader.read();
                            if (done) {
                                // Restpuffer (falls Zeile ohne \n endete) verarbeiten
                                const rest = buffer.trim();
                                if (rest) {
                                    try { handleLine(rest); } catch (e) { console.error(e); }
                                }
                                break;
                            }

                            buffer += decoder.decode(value, { stream: true });
                            const lines = buffer.split(/\r?\n/);
                            buffer = lines.pop(); // unvollständige Zeile im Puffer lassen

                            for (const l of lines) {
                                try {
                                    handleLine(l);
                                } catch (e) {
                                    console.error('Fehler beim Parsen der Fortschrittsdaten:', e);
                                }
                            }
                        }
                    } catch (err) {
                        clearInterval(simulatedInterval);
                        progressText.textContent = 'Fehler beim Prüfen der URL.';
                        console.error('Fehler bei der Anfrage:', err);
                        alert('Fehler bei der Anfrage: ' + (err?.message || err));
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
