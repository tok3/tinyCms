// 🔥 TOUR REGISTRY
window.tours = {
    'firmament-urls': {
        run: startTrialTour,
        auto: true,
        storageKey: 'tour_done_firmament-urls'
    },
};


// 🔥 ROUTE ERKENNEN
function getCurrentPageKey() {
    const path = window.location.pathname;

    if (path.includes('firmament-urls')) return 'firmament-urls';

    return null;
}


// 🔥 INIT (AUTO + BUTTON SICHTBARKEIT)
document.addEventListener('DOMContentLoaded', () => {

    console.log('TOUR INIT');

    const key = getCurrentPageKey();
    if (!key) return;

    const config = window.tours[key];
    if (!config) return;

    // 👉 Button anzeigen
    const wrapper = document.getElementById('tour-button-wrapper');
    if (wrapper) wrapper.style.display = 'block';

    // 👉 Auto Start (nur Trial + einmal)
    if (!window.App?.isTrial) return;

    if (!config.auto) return;

    if (localStorage.getItem(config.storageKey)) return;

    // 🔥 Delay wegen Filament Rendering
    setTimeout(() => {
        config.run();
        localStorage.setItem(config.storageKey, '1');
    }, 500);
});


// 🔥 BUTTON → IMMER TOUR STARTEN
document.addEventListener('click', function (e) {

    const btn = e.target.closest('#start-tour-btn');
    if (!btn) return;

    const key = getCurrentPageKey();
    if (!key) return;

    const config = window.tours[key];
    if (!config) return;

    // 👉 Force Mode
    window.forceTour = true;

    config.run();

    window.forceTour = false;
});


// Trial tour
function startTrialTour() {

    const table = document.querySelector('.fi-ta-table');

    const tour = new Shepherd.Tour({
        useModalOverlay: true,
        defaultStepOptions: {
            scrollTo: true,
            cancelIcon: { enabled: true },
        }
    });

    const btnWrapper = document.getElementById('tour-button-wrapper');

    tour.on('start', () => {
        if (btnWrapper) btnWrapper.style.display = 'none';
    });

    tour.on('complete', () => {
        if (btnWrapper) btnWrapper.style.display = 'block';
    });

    tour.on('cancel', () => {
        if (btnWrapper) btnWrapper.style.display = 'block';
    });

    // 👉 DEINE STEPS BLEIBEN UNVERÄNDERT
    // STEP 1
    tour.addStep({
        id: 'step-urls-overview',
        attachTo: table ? { element: table, on: 'top' } : undefined,
        title: 'Ihre Website im Überblick',
        text: `
Sie sehen hier die aktuell geprüften URLs Ihrer Website.<br><br>

Hier entsteht die vollständige Übersicht –
alle Seiten werden automatisch erfasst und regelmässig überwacht.<br><br>

<strong>Mit einem Klick auf „Ansehen“ gelangen Sie zur Detailanalyse der entsprechenden URL.</strong>
`,
        buttons: [
            { text: 'Weiter', action: tour.next }
        ]
    });

    // STEP 2
    const addBtn = document.getElementById('addUrlButton');

    if (addBtn) {
        tour.addStep({
            id: 'step-add-url',
            attachTo: { element: addBtn, on: 'bottom' },
            title: 'Seiten hinzufügen',
            text: `
Hier können Sie einzelne URLs Ihrer Website manuell hinzufügen.<br><br>

Das ist sinnvoll, wenn Sie gezielt bestimmte Seiten prüfen möchten.<br><br>

Für die vollständige Erfassung Ihrer Website gibt es eine automatische Lösung.
`,
            buttons: [
                { text: 'Zurück', action: tour.back },
                { text: 'Weiter', action: tour.next }
            ]
        });
    }

    // STEP 3
    const crawlBtn = document.getElementById('crawlButton');

    if (crawlBtn) {
        tour.addStep({
            id: 'step-crawl',
            attachTo: { element: crawlBtn, on: 'bottom' },
            title: 'Automatische Erfassung',
            text: `
Sie müssen nicht jede Seite einzeln hinzufügen.<br><br>

Das System kann Ihre Website automatisch durchsuchen
und weitere URLs selbstständig erkennen.<br><br>

So entsteht automatisch eine vollständige Übersicht.
`,
            buttons: [
                { text: 'Zurück', action: tour.back },
                { text: 'Fertig', action: tour.complete }
            ]
        });
    }

    // 🔥 WICHTIG: nur blocken wenn NICHT manuell
    if (!window.forceTour && localStorage.getItem('trial_tour_done')) return;

    tour.start();

    localStorage.setItem('trial_tour_done', '1');
}
