<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>

        <div class="flex items-center gap-x-3">
            <div class="flex-1">

                <img width="120px" id="mode-icon" src="{{ asset('assets/css/svgs/fixstern-logo.svg') }}" alt="Logo" />
                <script>
                    // Funktion zum Wechseln des Logos je nach Modus
                    function updateLogo() {
                        const modeIcon = document.getElementById('mode-icon');
                        if (document.documentElement.classList.contains('dark')) {
                            // Wenn der Dark Mode aktiv ist, lade das Light Mode Logo
                            modeIcon.src = '{{ asset('assets/css/svgs/fixstern-logo-light.svg') }}';
                        } else {
                            // Ansonsten lade das Standard Logo (Dunkles Logo für Light Mode)
                            modeIcon.src = '{{ asset('assets/css/svgs/fixstern-logo.svg') }}';
                        }
                    }

                    // Beim Laden der Seite den Modus prüfen und das Logo setzen
                    window.addEventListener('DOMContentLoaded', updateLogo);

                    // MutationObserver einrichten, um Änderungen der Klasse 'dark' zu erkennen
                    const observer = new MutationObserver(updateLogo);

                    observer.observe(document.documentElement, {
                        attributes: true,
                        attributeFilter: ['class']
                    });
                </script>


                <p class="pl-4 mt-2 text-xs text-gray-500 dark:text-gray-400">
                    1.12.24
                </p>
            </div>

            <div class="flex flex-col items-end gap-y-1">
                <x-filament::link
                    color="gray"
                    href="{{url('assets/downloads/fixstern-info-dsfa.pdf')}}"
                    icon="heroicon-m-book-open"
                    icon-alias="panels::widgets.filament-info.open-documentation-button"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    <x-slot name="icon">

                        <x-pdf-icon class="w-6 h-6 mr-2"/>
                    </x-slot>
                    Information DSFA
                </x-filament::link>
                <x-filament::link
                    color="gray"
                    href="{{url('documents/fixstern-integration/'.$ulid)}}"
                    icon="heroicon-m-book-open"
                    icon-alias="panels::widgets.filament-info.open-documentation-button"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    <x-slot name="icon">

                        <x-pdf-icon class="w-6 h-6 mr-2"/>
                    </x-slot>
                    Web Site Integration
                </x-filament::link>

                <x-filament::link
                    color="gray"
                    href="{{url('assets/downloads/fixstern-datenschutz.pdf')}}"
                    icon-alias="panels::widgets.filament-info.open-github-button"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    <x-slot name="icon">
                        <x-pdf-icon class="w-6 h-6 mr-2"/>
                    </x-slot>

                    Datenschutzinformationen
                </x-filament::link>
            </div>
        </div>
    </x-filament::section>


</x-filament-widgets::widget>
