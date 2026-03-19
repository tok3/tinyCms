document.addEventListener('DOMContentLoaded', function () {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // =========================================================
    // Trial-Form: URL-Sync, Einblendung, Ajax-Submit
    // =========================================================
    const urlInput   = document.getElementById('urlInput');
    const summary    = document.getElementById('summaryOutput');
    const trialBox   = document.getElementById('trialFormSection');
    const trialForm  = document.getElementById('trialForm');
    const trialUrl   = document.getElementById('trial_url');
    const trialAlert = document.getElementById('trialAlert');
    const submitBtn  = document.getElementById('trialSubmitBtn');
    const textNodes  = document.querySelectorAll('[data-page-text]');

    if (trialForm) {
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
        const showTrial = () => {
            if (trialBox && trialBox.style.display === 'none') {
                trialBox.style.display = 'block';
            }
        };

        if (summary && (getComputedStyle(summary).display !== 'none' || summary.classList.contains('fade-in'))) {
            showTrial();
        } else if (summary) {
            const mo = new MutationObserver(() => {
                if (summary.classList.contains('fade-in') || getComputedStyle(summary).display !== 'none') {
                    showTrial();
                    mo.disconnect();
                }
            });
            mo.observe(summary, { attributes: true, attributeFilter: ['class', 'style'] });
        }

        // AJAX Submit des Trial-Forms
        trialForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const slotResult = document.getElementById('slotResultMessage');
            if (slotResult) {
                slotResult.style.display = 'none';
                slotResult.textContent   = '';
            }
            // UI reset
            trialAlert.className = 'alert d-none';
            trialAlert.textContent = '';
            trialForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            trialForm.querySelectorAll('.invalid-feedback[data-field]').forEach(el => el.textContent = '');

            submitBtn.disabled = true;

            try {
                const resp = await fetch(trialForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf || '',
                        'Accept': 'application/json'
                    },
                    body: new FormData(trialForm),
                });

                if (resp.ok) {
                    trialForm.classList.add('d-none');

                    trialAlert.className = 'alert alert-success mt-5';
                    trialAlert.innerHTML = '<strong>Fast geschafft!</strong><br>Wir haben Ihnen eine E-Mail zum Freischalten Ihres Benutzerkontos zugesendet. Bitte prüfen Sie Ihren Posteingang und klicken Sie auf den Link, um Ihre E-Mail zu bestätigen und die Analyse zu öffnen. Sollten Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue zu.';
                } else if (resp.status === 422) {
                    const data   = await resp.json();
                    const errors = data.errors || {};
                    Object.entries(errors).forEach(([field, messages]) => {
                        const input = trialForm.querySelector('[name="' + field + '"]');
                        input?.classList.add('is-invalid');
                        const fb = trialForm.querySelector('.invalid-feedback[data-field="' + field + '"]');
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
    }

    // =========================================================
    // WCAG-Check-Formular mit Streaming + Fun-Mode
    // =========================================================
    const checkForm = document.getElementById('checkAccessibilityForm');
    if (!checkForm) {
        // Auf Seiten ohne dieses Modul nichts weiter tun
        return;
    }

    const endpoint       = checkForm.dataset.endpoint;
    const progressOutput = document.getElementById('progressOutput');
    const progressBar    = document.getElementById('progressBar');
    const progressText   = document.getElementById('progressText');
    const summaryOutput  = document.getElementById('summaryOutput');
    const totalErrors    = document.getElementById('totalErrors');
    const totalWarnings  = document.getElementById('totalWarnings');
    const totalNotices   = document.getElementById('totalNotices');
    const errorOutput    = document.getElementById('errorOutput');

    function isFunUrl(url) {
        if (!url) return false;
        const u = String(url).trim().toLowerCase();

        const patterns = [
            'aktion-barrierefrei.org',
            'www.aktion-barrierefrei.org'
        ];

        return patterns.some((p) => u.indexOf(p) !== -1);
    }

    function startSlotMachineDisplay(errorEl, warningEl, noticeEl, onFinish) {
        const symbols = [
            '<i class="bi bi-suit-club"></i>',
            '<i class="bi bi-suit-diamond"></i>',
            '<i class="bi bi-suit-spade"></i>',
            '<i class="bi bi-suit-heart"></i>',
            '<i class="bi bi-coin"></i>',
            '<i class="bi bi-gem"></i>',
            '<i class="bi bi-rocket-takeoff"></i>',
            '<i class="bi bi-piggy-bank"></i>',
            '<i class="bi bi-lightning-charge-fill"></i>'

        ];
        const elements = [errorEl, warningEl, noticeEl];
        let spins = 0;
        const maxSpins = 25;

        // Merker für die letzten Symbole (Indices)
        let lastIdxErrors   = null;
        let lastIdxWarnings = null;
        let lastIdxNotices  = null;

        const interval = setInterval(() => {
            spins++;

            elements.forEach((el, position) => {
                if (!el) return;
                const idx = Math.floor(Math.random() * symbols.length);
                el.innerHTML = symbols[idx];

                if (position === 0) lastIdxErrors   = idx;
                if (position === 1) lastIdxWarnings = idx;
                if (position === 2) lastIdxNotices  = idx;
            });

            if (spins >= maxSpins) {
                clearInterval(interval);
                if (typeof onFinish === 'function') {
                    onFinish(lastIdxErrors, lastIdxWarnings, lastIdxNotices);
                }
            }
        }, 80);
    }

    checkForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const url = (document.getElementById('urlInput')?.value || '').trim();

        // Slot-Ergebnis-Box holen und immer zurücksetzen
        const slotResult = document.getElementById('slotResultMessage');
        if (slotResult) {
            slotResult.style.display = 'none';
            slotResult.textContent   = '';
            slotResult.className     = 'mt-2'; // Basis-Klasse
        }

        const progressOutput = document.getElementById('progressOutput');
        const progressBar    = document.getElementById('progressBar');
        const progressText   = document.getElementById('progressText');
        const summaryOutput  = document.getElementById('summaryOutput');
        const totalErrors    = document.getElementById('totalErrors');
        const totalWarnings  = document.getElementById('totalWarnings');
        const totalNotices   = document.getElementById('totalNotices');
        const errorOutput    = document.getElementById('errorOutput');

        if (!progressOutput || !progressBar || !progressText || !summaryOutput ||
            !totalErrors || !totalWarnings || !totalNotices) {
            console.error('WCAG-Check: benötigte DOM-Elemente wurden nicht gefunden.');
            return;
        }

        // UI zurücksetzen
        progressOutput.style.display = 'block';
        progressBar.style.width = '0%';
        progressBar.textContent = '0%';
        progressText.textContent = 'Starte...';
        summaryOutput.style.display = 'none';
        summaryOutput.classList.remove('fade-in');
        progressOutput.classList.remove('fade-out');
        if (errorOutput) errorOutput.style.display = 'none';

        let simulatedProgress  = 0;
        let summaryData        = null;
        let backendProgress    = 0;
        let backendSyncAllowed = false;
        let isPulsing          = false;
        let summaryHandled     = false;

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

        // Hilfsfunktion: Progress ausblenden & Summary zeigen (Normalmodus)
        function fadeOutProgressAndShowSummary() {
            progressOutput.classList.add('fade-out');
            summaryOutput.style.display = 'block';
            summaryOutput.classList.add('fade-in');

            if (summaryData) {
                totalErrors.textContent   = summaryData.errors   ?? 0;
                totalWarnings.textContent = summaryData.warnings ?? 0;
                totalNotices.textContent  = summaryData.notices  ?? 0;
            }

            if (window.startErrorCountUp) {
                window.startErrorCountUp(parseInt(totalErrors.textContent || '0', 10));
            }
            if (window.startWarningCountUp) {
                window.startWarningCountUp(parseInt(totalWarnings.textContent || '0', 10));
            }
            if (window.startNoticeCountUp) {
                window.startNoticeCountUp(parseInt(totalNotices.textContent || '0', 10));
            }

            setTimeout(() => { progressOutput.style.display = 'none'; }, 500);
        }

        // Nach 3 Sek. Backend-Sync erlauben
        setTimeout(() => {
            backendSyncAllowed = true;
        }, 3000);

        try {
            const resp = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                credentials: 'same-origin',
                body: JSON.stringify({ url })
            });

            const ct = (resp.headers.get('content-type') || '').toLowerCase();
            if (!resp.ok || (!ct.includes('application/x-ndjson') && !ct.includes('text/plain'))) {
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
                if (!line) return;
                if (line.startsWith('data:')) {
                    line = line.slice(5).trim();
                    if (!line) return;
                }
                if (line.startsWith('<')) {
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
                    throw new Error(data.message || 'Scan-Fehler');
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
                    if (summaryHandled) {
                        return;
                    }
                    summaryHandled = true;

                    summaryData = data.summary;

                    clearInterval(simulatedInterval);
                    progressBar.style.transition = 'width 2.5s cubic-bezier(0.25, 1, 0.5, 1)';
                    progressBar.style.width = '100%';
                    progressBar.textContent = '100%';

                    if (isFunUrl(url)) {
                        setTimeout(() => {
                            progressText.textContent = 'Scan abgeschlossen!';
                            progressOutput.classList.add('fade-out');
                            summaryOutput.style.display = 'block';
                            summaryOutput.classList.add('fade-in');

                            // Labels leeren, falls IDs gesetzt sind
                            const labelErrors   = document.getElementById('labelErrors');
                            const labelWarnings = document.getElementById('labelWarnings');
                            const labelNotices  = document.getElementById('labelNotices');
                            const slotResult    = document.getElementById('slotResultMessage');

                            if (labelErrors)   { labelErrors.innerHTML   = '&nbsp;'; }
                            if (labelWarnings) { labelWarnings.innerHTML = '&nbsp;'; }
                            if (labelNotices)  { labelNotices.innerHTML  = '&nbsp;'; }

                            // Nachricht zurücksetzen
                            if (slotResult) {
                                slotResult.style.display = 'none';
                                slotResult.textContent   = '';
                                slotResult.className     = 'mt-2'; // Basis-Klasse neu setzen
                            }

                            // Slot-Machine nur auf den drei Zählern
                            startSlotMachineDisplay(totalErrors, totalWarnings, totalNotices, (i1, i2, i3) => {
                                if (!slotResult) return;

                                slotResult.style.display = 'block';

                                if (i1 === i2 && i2 === i3) {
                                    // Jackpot
                                    slotResult.className = 'mt-2 text-center text-success fw-bold';
                                    slotResult.innerHTML = 'Jackpot! Machen Sie einen Screenshot und senden Sie uns diesen an <a href="mailto:info@aktion-barrierefrei.org"><nobr>info@aktion-barrierefrei.org</nobr></a> und erhalten Sie Ihren Gewinn.';
                                } else {
                                    // Kein Gewinn
                                    slotResult.className = 'mt-2 text-center text-danger fw-bold';
                                    slotResult.textContent = 'Leider kein Gewinn ;-)';
                                }
                            });

                            setTimeout(() => {
                                progressOutput.style.display = 'none';
                            }, 500);
                        }, 2500);

                        return; // ganz wichtig: NICHT weiter in den Normalfall laufen
                    }

                    totalErrors.textContent   = data.summary.errors   ?? 0;
                    totalWarnings.textContent = data.summary.warnings ?? 0;
                    totalNotices.textContent  = data.summary.notices  ?? 0;

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
                    const rest = buffer.trim();
                    if (rest) {
                        try {
                            handleLine(rest);
                        } catch (e2) {
                            console.error(e2);
                        }
                    }
                    break;
                }

                buffer += decoder.decode(value, { stream: true });
                const lines = buffer.split(/\r?\n/);
                buffer = lines.pop();

                for (const l of lines) {
                    try {
                        handleLine(l);
                    } catch (e3) {
                        console.error('Fehler beim Parsen der Fortschrittsdaten:', e3);
                    }
                }
            }
        } catch (err) {
            clearInterval(simulatedInterval);
            progressText.textContent = 'Fehler beim Prüfen der URL.';
            console.error('Fehler bei der Anfrage:', err);
            alert('Fehler bei der Anfrage: ' + (err && err.message ? err.message : err));
        }
    });
});
