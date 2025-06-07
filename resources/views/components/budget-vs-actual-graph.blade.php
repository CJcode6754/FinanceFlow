<div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
    <div class="flex items-center gap-2 mb-6">
        <i class="fas fa-bullseye text-purple-600"></i>
        <h2 class="text-lg font-semibold text-gray-900">Budget vs Actual</h2>
    </div>
    <div class="h-80">
        <canvas id="budgetChart"></canvas>
    </div>
</div>

<script>
    // Budget vs Actual Chart
    const budgetCtx = document.getElementById('budgetChart').getContext('2d');
    new Chart(budgetCtx, {
        type: 'bar',
        data: {
            labels: @json($budgetName),
            datasets: [{
                label: 'Budget',
                data: @json($setBudget),
                backgroundColor: '#94a3b8',
                borderRadius: 2,
            }, {
                label: 'Actual',
                data: @json($actualBudget),
                backgroundColor: '#3b82f6',
                borderRadius: 2,
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
