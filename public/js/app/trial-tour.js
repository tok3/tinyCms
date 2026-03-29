document.addEventListener('DOMContentLoaded', () => {

    console.log('TRIAL TOUR INIT');

    if (!window.App?.isTrial) return;
    if (!window.location.pathname.includes('firmament-urls')) return;

    // 🔥 Delay wegen Filament / Livewire Rendering
    setTimeout(() => {
        startTrialTour();
    }, 500);
});


function startTrialTour() {

    const table = document.querySelector('.fi-ta-table');

    const tour = new Shepherd.Tour({
        useModalOverlay: true,
        defaultStepOptions: {
            scrollTo: true,
            cancelIcon: { enabled: true },
        }
    });

    // 🔥 STEP 1 (immer hinzufügen, auch wenn table fehlt)
    tour.addStep({
        id: 'step-urls-overview',

        attachTo: table ? {
            element: table,
            on: 'top'
        } : undefined,

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


    // 🔥 STEP 2
    const addBtn = document.getElementById('addUrlButton');

    if (addBtn) {
        tour.addStep({
            id: 'step-add-url',

            attachTo: {
                element: addBtn,
                on: 'bottom'
            },

            title: 'Seiten hinzufügen',

            text: `
    Hier können Sie einzelne URLs Ihrer Website manuell hinzufügen.<br><br>

    Das ist sinnvoll, wenn Sie gezielt bestimmte Seiten prüfen möchten.<br><br>

    Für die vollständige Erfassung Ihrer Website gibt es eine automatische Lösung.
`,
            buttons: [
                {
                    text: 'Zurück',
                    action: tour.back
                },
                {
                    text: 'Weiter',
                    action: tour.next
                }
            ]
        });
    } else {
        console.log('ADD BUTTON NOT FOUND');
    }


    // 🔥 STEP 3 (WICHTIGSTER STEP)
    const crawlBtn = document.getElementById('crawlButton');

    if (crawlBtn) {
        tour.addStep({
            id: 'step-crawl',

            attachTo: {
                element: crawlBtn,
                on: 'bottom'
            },

            title: 'Automatische Erfassung',

            text: `
                Sie müssen nicht jede Seite einzeln hinzufügen.<br><br>

                Das System kann Ihre Website automatisch durchsuchen
                und weitere URLs selbstständig erkennen.<br><br>

                So entsteht automatisch eine vollständige Übersicht.
            `,

            buttons: [
                {
                    text: 'Zurück',
                    action: tour.back
                },
                {
                    text: 'Fertig',
                    action: tour.complete
                }
            ]
        });
    } else {
        console.log('CRAWL BUTTON NOT FOUND');
    }


    // nicht jedes Mal nerven
    if (!window.forceTour && localStorage.getItem('trial_tour_done')) return;
    tour.start();
}


document.addEventListener('click', function (e) {
    const btn = e.target.closest('#start-tour-btn');
    if (!btn) return;

    // 🔥 FORCE MODE AN
    window.forceTour = true;

    startTrialTour();

    // 🔥 danach wieder resetten
    window.forceTour = false;
});
