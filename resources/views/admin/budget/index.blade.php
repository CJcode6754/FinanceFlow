<x-app-layout title="Budget">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 sm:px-6 md:px-12 py-6">
            <!-- Filter Section -->
            <section
                class="flex flex-col md:flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md">
                <div>
                    <h2 class="text-lg font-semibold">Budget Management</h2>
                    <p class="text-sm text-gray-600">Track your spending limits and stay on budget</p>
                </div>

                <form class="flex flex-wrap items-end gap-4" method="GET">
                    <div class="flex flex-col gap-1">
                        <label for="start_date" class="text-sm text-gray-500">Start date</label>
                        <input type="date" id="start_date" name="start_date"
                            class="p-2 text-sm border border-gray-300 rounded-md" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="end_date" class="text-sm text-gray-500">End date</label>
                        <input type="date" id="end_date" name="end_date"
                            class="p-2 text-sm border border-gray-300 rounded-md" />
                    </div>

                    <button type="submit"
                        class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                        Filter
                    </button>
                </form>
            </section>

            <!-- Budget Content -->
            <section class="flex flex-col md:flex-row gap-6 mt-6">
                <!-- My Budget -->
                <div class="w-full md:w-3/5 p-6 space-y-6 bg-white shadow-lg rounded-2xl">
                    <!-- Header -->
                    <div class="flex items-center justify-between flex-wrap gap-2">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">My Budget</h2>
                            <p class="text-sm text-gray-500">View and manage your current budget allocations.</p>
                        </div>
                        <a href="{{ route('budget.create') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 transition border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white">
                            <i class="fa-solid fa-plus"></i>
                            Add
                        </a>
                    </div>

                    <!-- Budget Cards -->
                    @foreach ($budgets as $item)
                        @php
                            if ($item->percentage >= 90) {
                                $bgcolor = 'bg-red-200';
                                $bgborder = 'border-red-600';
                            } elseif ($item->percentage < 90 && $item->percentage >= 70) {
                                $bgcolor = 'bg-yellow-100';
                                $bgborder = 'border-yellow-400';
                            } else {
                                $bgcolor = 'bg-gray-50';
                                $bgborder = 'border-gray-400';
                            }
                        @endphp

                        <div
                            class="flex flex-col gap-4 p-4 border-l-6 {{ $bgborder }} {{ $bgcolor }} rounded-xl">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . ($item->category->image ?? 'category_image/default.png')) }}"
                                        alt="{{ $item->category->name }}"
                                        class="object-cover bg-white shadow w-14 h-14 rounded-xl">
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-800">{{ $item->category->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">Budget from
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('F d, y') }} to
                                            {{ \Carbon\Carbon::parse($item->end_date)->format('F d, y') }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('budget.edit', $item->id) }}"
                                        class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button class="p-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-base font-semibold text-gray-800">PHP
                                        {{ number_format($item->spent, 2) }} spent</p>
                                    <p class="text-base font-semibold text-gray-800">PHP
                                        {{ number_format($item->amount, 2) }} limit</p>
                                </div>
                                <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                                    <div class="h-full bg-green-500 transition-all"
                                        style="width: {{ $item->percentage }}%"></div>
                                </div>
                                <div class="flex justify-between mt-2 text-sm text-gray-600">
                                    <span>{{ $item->percentage }}%</span>
                                    @if ($item->remaining < 0)
                                        <span class="text-red-600">Over budget by PHP
                                            {{ number_format(abs($item->remaining), 2) }}</span>
                                    @else
                                        <span>PHP {{ number_format($item->remaining, 2) }} remaining</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sidebar -->
                <div class="w-full md:w-2/5 flex flex-col gap-4">
                    <!-- Overview -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">Budget Overview</h2>
                        <p class="text-sm text-gray-600">Summary of spending, limits, and remaining balance.</p>
                        <div class="mt-4 h-65 rounded-md text-white flex items-center justify-center">
                            <canvas id="DoughnutChart" class="w-full h-full"></canvas>
                        </div>

                        <div class="grid grid-cols-2 gap-4 py-4">
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalBudget, 2) }}</h3>
                                <p class="text-sm text-gray-500">Total Budget</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalSpent, 2) }}</h3>
                                <p class="text-sm text-gray-500">Spent</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalRemaining, 2) }}</h3>
                                <p class="text-sm text-gray-500">Remaining</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">{{ $totalCategoryIDs }}</h3>
                                <p class="text-sm text-gray-500">Categories</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alerts -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">Alerts</h2>
                        <p class="text-sm text-gray-600">Important updates or warnings related to your budget.</p>

                        <div class="py-4 space-y-4">
                            @foreach ($budgets as $budget)
                                @if ($budget->percentage >= 70)
                                    @php
                                        $hasAlerts = true;

                                        if ($budget->percentage >= 90) {
                                            $bgcolor = 'bg-red-200';
                                            $bgborder = 'border-red-600';
                                        } elseif ($budget->percentage < 90 && $budget->percentage >= 70) {
                                            $bgcolor = 'bg-yellow-100';
                                            $bgborder = 'border-yellow-400';
                                        }
                                    @endphp

                                    <div class="w-full p-6 {{$bgcolor}} border-l-6 {{$bgborder}} shadow rounded-xl">
                                        <h2>{{$budget->category->name}}: {{$budget->percentage}}% of budget used</h2>
                                    </div>
                                @endif
                            @endforeach

                            @if (!$hasAlerts)
                                <p>No Alerts</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('DoughnutChart').getContext('2d');

        // CHART
        const data = {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Budget Amount',
                data: @json($chartData),
                backgroundColor: [
                    '#4F46E5', // Indigo-600
                    '#10B981', // Emerald-500
                    '#F59E0B', // Amber-500
                    '#EF4444', // Red-500
                    '#3B82F6', // Blue-500
                    '#8B5CF6', // Purple-500
                    '#EC4899', // Pink-500
                    '#22D3EE', // Cyan-400
                    '#F97316', // Orange-500
                    '#14B8A6' // Teal-500
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 15,
                            padding: 20,
                            borderRadius: 50,
                            usePointStyle: true,
                            pointStyle: 'circle',
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `PHP ${context.parsed.toLocaleString(undefined, {minimumFractionDigits: 2})}`;
                            }
                        }
                    }
                }
            },
        };

        new Chart(ctx, config);
    </script>
</x-app-layout>
