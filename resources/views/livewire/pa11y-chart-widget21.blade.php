<!-- WCAG 2.1 Chart Widget -->
<div class="relative">
    <div class="chart-container" style="width: 100%; height: 300px;">
        <canvas id="myChart21"></canvas>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const labels = @json($labels);
            const errors = @json($errors);
            const warnings = @json($warnings);


            const ctx = document.getElementById('myChart21').getContext('2d');
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
                            position: 'bottom',
                        }
                    }
                }
            });
        });
    </script>
@endpush
