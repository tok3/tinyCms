<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <a href="{{ $firmamentLink }}">
             {{--       <img width="200px" class="mode-icon" src="{{ asset('assets/img/logo/firmament-logo.svg') }}" alt="Logo" />--}}
                </a>
                <p class="pl-4 mt-2 text-xs text-gray-500 dark:text-gray-400">0.1.25</p>
            </div>
        </div>

        <!-- Tabs für die Standards -->
        <div class="mt-4">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a href="#" id="tab-2-1" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold border-l border-t border-r border-blue-500 rounded-t">
                        WCAG 2.1
                    </a>
                </li>
                @if ($chartDataWCAG20 !== null)
                    <li class="mr-1">
                        <a href="#" id="tab-2-0" class="bg-gray-200 inline-block py-2 px-4 text-gray-500 font-semibold hover:text-blue-500">
                            WCAG 2.0
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Canvas für WCAG 2.1 -->
        <div id="content-2-1" class="mt-2">
            <canvas id="wcag21Chart"></canvas>
        </div>

        <!-- Canvas für WCAG 2.0 -->
        @if ($chartDataWCAG20 !== null)
            <div id="content-2-0" class="mt-2 hidden">
                <canvas id="wcag20Chart"></canvas>
            </div>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const statisticsWCAG21 = @json($chartDataWCAG21);
                const statisticsWCAG20 = @json($chartDataWCAG20);

                // Funktion zur Erstellung der Chart-Konfiguration
                function createChartConfig(data) {
                    return {
                        type: 'line',
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom', // Legende bleibt ohne URLs
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            const label = context.dataset.label || '';
                                            const value = context.raw;
                                            const urls = context.dataset.urls ? context.dataset.urls[context.dataIndex] : '-';
                                            return `${label}: ${value} (from ${urls} URLs)`; // Nur im Tooltip anzeigen
                                        },
                                    },
                                },
                            },
                            scales: {
                                x: {
                                    title: { display: true, text: 'Scan Date (URLs)' },
                                },
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Count' },
                                },
                            },
                        },
                    };
                }

                // WCAG 2.1 Chart erstellen
                const ctx21 = document.getElementById('wcag21Chart').getContext('2d');
                new Chart(ctx21, createChartConfig(statisticsWCAG21));

                // WCAG 2.0 Chart erstellen (falls vorhanden)
                if (statisticsWCAG20) {
                    const ctx20 = document.getElementById('wcag20Chart').getContext('2d');
                    new Chart(ctx20, createChartConfig(statisticsWCAG20));
                }

                // Tab-Umschaltung (falls Tabs implementiert sind)
                document.getElementById('tab-2-1').addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('content-2-1').classList.remove('hidden');
                    document.getElementById('content-2-0')?.classList.add('hidden');
                    this.classList.add('bg-white', 'text-blue-500', 'border-blue-500');
                    document.getElementById('tab-2-0')?.classList.remove('bg-white', 'text-blue-500', 'border-blue-500');
                });

                document.getElementById('tab-2-0')?.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.getElementById('content-2-0').classList.remove('hidden');
                    document.getElementById('content-2-1').classList.add('hidden');
                    this.classList.add('bg-white', 'text-blue-500', 'border-blue-500');
                    document.getElementById('tab-2-1').classList.remove('bg-white', 'text-blue-500', 'border-blue-500');
                });
            });
        </script>
    </x-filament::section>
</x-filament-widgets::widget>
