@php
    $hasData = collect($categoryLabels)->count() > 0 || collect($categoryData)->sum() > 0;
@endphp

<div class="p-6 bg-white border border-gray-100 shadow-sm dark:shadow-md dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center justify-between mb-6">
        <div class="flex gap-2 items-center">
            <i class="fa-solid fa-tags text-stone-500"></i>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Spending by Category</h3>
        </div>
        <a href="{{ route('category.index') }}"
            class="text-sm font-medium text-indigo-500 hover:text-indigo-600 dark:text-indigo-600">Manage</a>
    </div>

    @if ($hasData)
        <div class="h-64 mb-4">
            <canvas id="categoryChart"></canvas>
        </div>
    @else
        <div class="text-center py-20">
            <p class="text-gray-500 dark:text-gray-400 mb-4">No category available yet.</p>
            <a href="{{ route('category.create') }}"
                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                Create Your First Category
            </a>
        </div>
    @endif

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
