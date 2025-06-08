<div class="p-6 bg-white border border-gray-200 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-trending-up text-emerald-600"></i>
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Income vs Expenses</h2>
    </div>
    <div class="h-80">
        <canvas id="incomeExpenseChart"></canvas>
    </div>
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
