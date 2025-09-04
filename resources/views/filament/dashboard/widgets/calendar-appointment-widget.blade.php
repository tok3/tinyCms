<x-filament-widgets::widget>
    <div
        class="flex items-center justify-between gap-6 rounded-xl border p-5"
    >
        {{-- LINKS: Kalender-Icon --}}
        <div class="flex items-center gap-4">
            <img
                src="{{ asset('assets/img/Google_Calendar_icon_(2020).svg') }}"
                alt="Google Calendar"
                class="w-16 h-16 shrink-0"
            />

            {{-- MITTE: Titel + Unterzeile --}}
            <div>
                <div class="text-lg font-semibold">Beratungstermin vereinbaren</div>
                <div class="text-sm text-gray-500">
                    Einfach den Button rechts klicken und einen verfügbaren Termin buchen.
                </div>
            </div>
        </div>

        {{-- RECHTS: Google Scheduling Button (öffnet Overlay) --}}
        <div id="gcal-overlay-btn" class="shrink-0"></div>
    </div>

    {{-- Google Scheduling Assets + Init --}}
    <link rel="stylesheet" href="https://calendar.google.com/calendar/scheduling-button-script.css">
    <script src="https://calendar.google.com/calendar/scheduling-button-script.js" async></script>
    <script>
        window.addEventListener('load', function () {
            if (window.calendar?.schedulingButton?.load) {
                calendar.schedulingButton.load({
                    url: 'https://calendar.google.com/calendar/appointments/schedules/AcZssZ002z7FSLxfqDLL47QcSvPz_XZbGC-2uwnyJso0MjsOmuNK9FDuwO_HG3uJKMpsWoLqfOBefBw9?gv=true',
                    color: '#039BE5',
                    label: 'Termin buchen',
                    target: document.getElementById('gcal-overlay-btn'),
                });
            }
        });
    </script>
</x-filament-widgets::widget>
