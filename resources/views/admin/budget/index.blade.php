<x-app-layout title="Budget">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 sm:px-6 md:px-12 py-6 max-w-screen-xl mx-auto">
            <!-- Filter Section -->
            <section
                class="flex flex-col md:flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md">
                <div>
                    <h2 class="text-lg font-semibold">Budget Management</h2>
                    <p class="text-sm text-gray-600">Track your spending limits and stay on budget</p>
                </div>
            </section>

            <!-- Budget Content -->
            <section class="flex flex-col lg:flex-row gap-6 mt-6">
                <!-- My Budget -->
                <div class="w-full lg:w-3/5 p-6 space-y-6 bg-white shadow-lg rounded-2xl">
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
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . ($item->category->image ?? 'category_image/default.png')) }}"
                                        alt="{{ $item->category->name }}"
                                        class="object-cover bg-white shadow w-14 h-14 rounded-xl">
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-800">{{ $item->category->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Budget from {{ \Carbon\Carbon::parse($item->start_date)->format('F d, y') }}
                                            to
                                            {{ \Carbon\Carbon::parse($item->end_date)->format('F d, y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex gap-2 w-full sm:w-auto">
                                    <a href="{{ route('budget.edit', $item->id) }}"
                                        class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button onclick="showModal({{ $item->id }})"
                                        class="p-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600 cursor-pointer">
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
                <div class="w-full lg:w-2/5 flex flex-col gap-4">
                    <!-- Overview -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">Budget Overview</h2>
                        <p class="text-sm text-gray-600">Summary of spending, limits, and remaining balance.</p>
                        <div
                            class="mt-4 min-h-[200px] sm:min-h-[260px] h-full rounded-md text-white flex items-center justify-center">
                            <canvas id="DoughnutChart" class="w-full h-full"></canvas>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 py-4">
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

                        <div class="py-4 space-y-4 max-h-[300px] overflow-y-auto">
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

                                    <div
                                        class="w-full p-6 {{ $bgcolor }} border-l-6 {{ $bgborder }} shadow rounded-xl">
                                        <h2>{{ $budget->category->name }}:
                                            {{ number_format($budget->percentage, 2) }}% of budget used</h2>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>

        {{-- Modal for Budget Deletion --}}
        <div id="modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div id="modal-backdrop" class="fixed inset-0 bg-gray-300 bg-opacity-50 transition-opacity duration-300"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="flex items-center justify-center min-h-screen px-4 py-6 sm:p-0 transition-all duration-300">
                <div
                    class="relative bg-white rounded-lg shadow-xl w-full max-w-md sm:max-w-lg transform opacity-100 scale-100">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 bg-red-100 text-red-600 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Delete Budget</h3>
                        </div>

                        <p class="mt-4 text-sm text-gray-600">
                            Are you sure you want to delete this budget? This action cannot be undone.
                        </p>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 flex flex-col sm:flex-row sm:justify-end gap-3">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full sm:w-auto bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition">
                                Yes, Delete
                            </button>
                        </form>
                        <button onclick="hideModal()" type="button"
                            class="w-full sm:w-auto border border-gray-300 text-gray-700 hover:bg-gray-100 py-2 px-4 rounded-md transition">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('DoughnutChart').getContext('2d');

        function showModal(budgetID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `budget/${budgetID}`;
            modal.classList.remove('hidden');

            // Animate in
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                wrapper.classList.remove('opacity-0', 'scale-95');
            }, 10);
        }

        function hideModal() {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');

            // Animate out
            backdrop.classList.add('opacity-0');
            wrapper.classList.add('opacity-0', 'scale-95');

            // Hide after animation
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

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
