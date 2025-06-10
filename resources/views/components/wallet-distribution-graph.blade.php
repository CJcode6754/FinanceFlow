@php
    $hasData = collect($walletLabels)->count() > 0 || collect($walletData)->sum() > 0;
@endphp
<div class="p-6 bg-white border border-gray-200 shadow-sm dark:shadow-md dark:bg-gray-800 dark:border-0 rounded-2xl">
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-wallet text-sky-600"></i>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Wallet Distribution</h2>
    </div>

    @if ($hasData)
        <div class="h-80">
            <canvas id="walletChart"></canvas>
        </div>
    @else
        <div class="text-center py-20">
            <p class="text-gray-500 dark:text-gray-400 mb-4">No wallets available yet.</p>
            <a href="{{ route('wallet.create') }}"
                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                Create Your First Wallet
            </a>
        </div>
    @endif
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
