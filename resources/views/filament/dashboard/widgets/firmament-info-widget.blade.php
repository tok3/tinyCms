<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <a href="{{ $firmamentLink }}">
                    <img width="200px" class="mode-icon" src="{{ asset('assets/img/logo/firmament-logo.svg') }}" alt="Logo" />
                </a>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const darkModeLogo = "{{ asset('assets/img/logo/firmament-logo-light.svg') }}";
                        const lightModeLogo = "{{ asset('assets/img/logo/firmament-logo.svg') }}";

                        function updateLogos() {
                            const modeIcons = document.querySelectorAll('.mode-icon');
                            modeIcons.forEach(modeIcon => {
                                modeIcon.src = document.documentElement.classList.contains('dark') ? darkModeLogo : lightModeLogo;
                            });
                        }

                        updateLogos();

                        const observer = new MutationObserver(updateLogos);
                        observer.observe(document.documentElement, {
                            attributes: true,
                            attributeFilter: ['class']
                        });
                    });
                </script>

                <p class="pl-4 mt-2 text-xs text-gray-500 dark:text-gray-400">0.1.25</p>
            </div>
        </div>

        <!-- Chart.js Container -->
        <div class="mt-2">
            <canvas id="firmamentChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('firmamentChart').getContext('2d');
                const statistics = @json($chartData);

                // Funktion zum Erstellen der Chart-Konfiguration basierend auf dem Modus
                function createChartConfig() {
                    const isDarkMode = document.documentElement.classList.contains('dark');

                    return {
                        type: 'line',
                        data: statistics,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom', // Legende unten platzieren
                                    labels: {
                                        color: isDarkMode ? '#FFFFFF' : '#000000', // Dynamische Legendenfarbe
                                    },
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false,
                                },
                            },
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            scales: {
                                x: {
                                    type: 'category',
                                    title: {
                                        display: true,
                                        text: 'Scan Date (URLs)',
                                        color: isDarkMode ? '#FFFFFF' : '#000000', // Dynamische Titel-Farbe
                                    },
                                    ticks: {
                                        color: isDarkMode ? '#FFFFFF' : '#000000', // Dynamische Text-Farbe
                                        maxRotation: 45,
                                        minRotation: 45,
                                    },
                                    grid: {
                                        color: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)', // Gitterlinien-Farbe
                                    },
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Count',
                                        color: isDarkMode ? '#FFFFFF' : '#000000', // Dynamische Titel-Farbe
                                    },
                                    ticks: {
                                        color: isDarkMode ? '#FFFFFF' : '#000000', // Dynamische Text-Farbe
                                    },
                                    grid: {
                                        color: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)', // Gitterlinien-Farbe
                                    },
                                },
                            },
                        },
                    };
                }

                // Initiale Erstellung der Chart
                let firmamentChart = new Chart(ctx, createChartConfig());

                // Funktion zum Aktualisieren der Chart basierend auf dem Modus
                function updateChartColors() {
                    const config = createChartConfig();
                    firmamentChart.options = config.options;
                    firmamentChart.update();
                }

                // MutationObserver einrichten, um Änderungen des Modus zu erkennen
                const observer = new MutationObserver(updateChartColors);
                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class'],
                });
            });

/*
            /!* beispiel für wellen und fills *!/
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('firmamentChart').getContext('2d');
                const statistics = @json($chartData);

                // Labels mit Datum und URL-Anzahl (Multiline)
                const labels = statistics.labels;

                // Daten
                const errors = statistics.datasets[0].data;
                const warnings = statistics.datasets[1].data;
                const notices = statistics.datasets[2].data;

                // Chart.js Line Chart
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels, // Multiline-Labels werden direkt unterstützt
                        datasets: [
                            {
                                label: 'Errors',
                                data: errors,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                fill: true,
                                tension: 0.3,
                            },
                            {
                                label: 'Warnings',
                                data: warnings,
                                borderColor: 'rgba(255, 206, 86, 1)',
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                fill: true,
                                tension: 0.3,
                            },
                            {
                                label: 'Notices',
                                data: notices,
                                borderColor: 'rgba(54, 162, 235, 1)',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                fill: true,
                                tension: 0.3,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Scan Date (URLs)',
                                },
                                ticks: {
                                    callback: function (value, index, ticks) {
                                        // Multiline-Labels werden direkt unterstützt, daher keine Anpassung hier nötig
                                        return this.getLabelForValue(value);
                                    },
                                },
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Count',
                                },
                                beginAtZero: true,
                            },
                        },
                    },
                });
            });*/
        </script>
    </x-filament::section>
</x-filament-widgets::widget>
