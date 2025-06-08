<div class="p-6 bg-white border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-0 rounded-2xl">
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-wallet text-sky-600"></i>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Wallet Distribution</h2>
    </div>
    <div class="h-80">
        <canvas id="walletChart"></canvas>
    </div>
</div>

<script>
    // Wallet Distribution Chart
    const walletCtx = document.getElementById('walletChart').getContext('2d');
    new Chart(walletCtx, {
        type: 'bar',
        data: {
            labels: @json($walletLabels),
            datasets: [{
                label: 'Balance',
                data: @json($walletData),
                backgroundColor: ['#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#06b6d4'],
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₱' + (value / 1000) + 'k';
                        }
                    }
                }
            }
        }
    });
</script>
