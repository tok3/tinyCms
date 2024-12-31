<!-- Layout mit zwei Spalten -->
<div class="relative">

        <div class="chart-container" style="width: 100%; height: 300px;"> <!-- Stelle sicher, dass der Container eine feste Höhe hat -->
            <canvas id="myChart"></canvas>
        </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hole die Daten für das Diagramm
            const labels = @json($labels);
            const errors = @json($errors);
            const warnings = @json($warnings);
            const notices = @json($notices);

            // Initialisiere das Diagramm
            const ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Errors',
                            data: errors,
                            borderColor: 'red',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false
                        },
                        {
                            label: 'Warnings',
                            data: warnings,
                            borderColor: 'orange',
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            fill: false
                        },
                        {
                            label: 'Notices',
                            data: notices,
                            borderColor: 'blue',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            type: 'category',
                            labels: labels
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                //color: 'rgb(255, 99, 132)'
                            },
                            position: 'bottom',

                        }
                    }
                }
            });

            // Resize chart when window resizes
            window.addEventListener('resize', function () {
                chart.resize();
            });

        });
    </script>
@endpush
