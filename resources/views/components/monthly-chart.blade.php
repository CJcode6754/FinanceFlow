<div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Monthly Overview</h3>
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <div class="w-3 h-3 mr-2 rounded-full bg-emerald-500"></div>
                <span class="text-sm text-gray-600 dark:text-gray-400">Income</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 mr-2 bg-red-500 rounded-full"></div>
                <span class="text-sm text-gray-600 dark:text-gray-400">Expenses</span>
            </div>

            <form action="{{ route('dashboard') }}" method="get">
                <select name="filter_by_months"
                    class="w-45 px-3 py-2 text-sm bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 md:w-35 mr-2">
                    <option value="1">📅 Last Month</option>
                    <option value="2">📅 Last 2 Month</option>
                    <option value="3">📅 Last 3 Months</option>
                    <option value="6">📅 Last 6 Months</option>
                    <option value="9">📅 Last 9 Months</option>
                    <option value="12">📅 Last 12 Months</option>
                </select>

                <button type="submit"
                    class="w-full px-2 py-2 text-sm bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 md:w-25">Filter</button>
            </form>
        </div>
    </div>
    <div class="h-80">
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('monthlyChart').getContext('2d');
        const monthLabels = @json($monthLabels);
        const incomeData = @json($graphIncome);
        const expenseData = @json($graphExpense);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Income',
                    data: incomeData,
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Expenses',
                    data: expenseData,
                    borderColor: 'rgb(239, 68, 68)',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
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
                    x: {
                        ticks: {
                            color: 'gray'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            },
                            color: 'gray'
                        }
                    }
                }
            }
        });
    });
</script>
