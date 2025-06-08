<div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Spending by Category</h3>
        <a href="{{ route('category.index') }}"
            class="text-sm font-medium text-indigo-500 hover:text-indigo-600 dark:text-indigo-800">Manage</a>
    </div>

    <div class="h-64 mb-4">
        <canvas id="categoryChart"></canvas>
    </div>

    <div class="space-y-2">
        @foreach ($categoryLabels as $index => $label)
            @php
                $categoryColors = [
                    '#EF4444',
                    '#F97316',
                    '#EAB308',
                    '#22C55E',
                    '#06B6D4',
                    '#3B82F6',
                    '#8B5CF6',
                    '#EC4899',
                ];
            @endphp
            <div class="flex items-center justify-between w-full gap-12 px-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 mr-3 rounded-full"
                        style="background-color: {{ $categoryColors[$index] ?? '#6B7280' }}"></div>
                    <span class="text-sm text-gray-600 dark:text-gray-300">{{ $label }}</span>
                </div>
                <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
                    ₱{{ number_format($categoryData[$index] ?? 0, 2) }}
                </span>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryLabels = @json($categoryLabels);
        const categoryData = @json($categoryData);
        const categoryColors = [
            '#EF4444', '#F97316', '#EAB308', '#22C55E',
            '#06B6D4', '#3B82F6', '#8B5CF6', '#EC4899'
        ];

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryData,
                    backgroundColor: categoryColors,
                    borderWidth: 0
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
                cutout: '70%'
            }
        });
    });
</script>
