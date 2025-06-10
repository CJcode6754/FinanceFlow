@php
    $hasData = collect($graphIncome)->sum() > 0 || collect($graphExpense)->sum() > 0;
@endphp
<div class="p-6 bg-white border border-gray-200 shadow-sm dark:shadow-md dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center gap-2 mb-6">
        <i class="fa-solid fa-arrow-trend-up text-emerald-600"></i>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Income vs Expenses</h2>
    </div>

    @if ($hasData)
        <div class="h-80">
            <canvas id="incomeExpenseChart"></canvas>
        </div>
    @else
        <div class="text-center py-20">
            <p class="text-gray-500 dark:text-gray-400 mb-4">No transactions available yet.</p>
            <a href="{{ route('transaction.create') }}"
                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                Create Your First Transaction
            </a>
        </div>
    @endif
</div>


<script>
    // Income vs Expense Chart
    const incomeExpenseCtx = document.getElementById('incomeExpenseChart').getContext('2d');
    new Chart(incomeExpenseCtx, {
        type: 'bar',
        data: {
            labels: @json($monthLabels),
            datasets: [{
                label: 'Income',
                data: @json($graphIncome),
                backgroundColor: '#10b981',
                borderRadius: 4,
            }, {
                label: 'Expenses',
                data: @json($graphExpense),
                backgroundColor: '#ef4444',
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'gray'
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₱' + (value / 1000) + 'k';
                        },
                        color: 'gray'
                    }
                }
            }
        }
    });
</script>
