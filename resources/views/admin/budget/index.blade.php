<x-app-layout title="Budget">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="max-w-screen-xl px-4 py-6 mx-auto sm:px-6 md:px-12">
            <!-- Filter Section -->
            <section
                class="flex flex-col items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md md:flex-row dark:bg-gray-800">
                <div>
                    <h2 class="text-2xl font-semibold dark:text-white">Budget Management</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Track your spending limits and stay on budget</p>
                </div>
            </section>

            <!-- Budget Content -->
            <section class="flex flex-col gap-6 mt-6 lg:flex-row">
                <!-- My Budget -->
                <div class="w-full p-6 space-y-6 bg-white shadow-lg dark:bg-gray-800 lg:w-3/5 rounded-2xl">
                    <!-- Header -->
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">My Budget</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-300">View and manage your current budget
                                allocations.</p>
                        </div>
                        <a href="{{ route('budget.create') }}"
                            class="btn px-6 py-2"></i>
                            Add
                        </a>
                    </div>

                    <!-- Budget Cards -->
                    @forelse ($budgets as $item)
                        @php
                            if ($item->percentage >= 90) {
                                $bgcolor = 'bg-red-200';
                                $bgborder = 'border-red-600';
                            } elseif ($item->percentage < 90 && $item->percentage >= 70) {
                                $bgcolor = 'bg-yellow-100';
                                $bgborder = 'border-yellow-400';
                            } else {
                                $bgcolor = 'bg-gray-50 dark:bg-gray-800';
                                $bgborder = 'border-gray-400 dark:bg-gray-100';
                            }
                        @endphp

                        <div
                            class="flex flex-col gap-4 p-4 border-l-6 {{ $bgborder }} {{ $bgcolor }} rounded-xl shadow-lg">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <i class="p-4 text-2xl shadow-sm {{ $item->category->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-800 dark:text-white">
                                            {{ $item->category->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-300">
                                            Budget from {{ \Carbon\Carbon::parse($item->start_date)->format('F d, y') }}
                                            to
                                            {{ \Carbon\Carbon::parse($item->end_date)->format('F d, y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex w-full gap-2 sm:w-auto">
                                    <a href="{{ route('budget.edit', $item->id) }}"
                                        class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button onclick="showModal({{ $item->id }})"
                                        class="p-2 text-white transition bg-red-500 rounded-lg cursor-pointer hover:bg-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-base font-semibold text-gray-800 dark:text-gray-300">PHP
                                        {{ number_format($item->spent, 2) }} spent</p>
                                    <p class="text-base font-semibold text-gray-800 dark:text-gray-300">PHP
                                        {{ number_format($item->amount, 2) }} limit</p>
                                </div>
                                <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                                    <div class="h-full transition-all bg-green-500"
                                        style="width: {{ $item->percentage }}%"></div>
                                </div>
                                <div class="flex justify-between mt-2 text-sm text-gray-600 dark:text-gray-400">
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
                    @empty
                        <div class="text-center py-20">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">No budgets available yet.</p>
                            <a href="{{ route('budget.create') }}"
                                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                                Create Your First Budget
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Sidebar -->
                <div class="flex flex-col w-full gap-4 lg:w-2/5">
                    <!-- Overview -->
                    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white">Budget Overview</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Summary of spending, limits, and remaining
                            balance.</p>
                        <div
                            class="mt-4 min-h-[200px] sm:min-h-[260px] h-full rounded-md text-white flex items-center justify-center">
                            <canvas id="DoughnutChart" class="w-full h-full"></canvas>
                        </div>

                        <div class="grid grid-cols-2 gap-4 py-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalBudgets, 2) }}</h3>
                                <p class="text-sm text-gray-500">Total Budget</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalBudgetSpent, 2) }}</h3>
                                <p class="text-sm text-gray-500">Spent</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP {{ number_format($totalBudgetRemaining, 2) }}
                                </h3>
                                <p class="text-sm text-gray-500">Remaining</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">{{ $totalCategoryIDs }}</h3>
                                <p class="text-sm text-gray-500">Categories</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alerts -->
                    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white">Alerts</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Important updates or warnings related to
                            your budget.</p>

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
        <div id="modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div id="modal-backdrop"
                class="fixed inset-0 transition-opacity duration-300 opacity-0 bg-black/50 backdrop-blur-sm"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="fixed inset-0 z-10 w-screen overflow-y-auto transition duration-300 ease-out scale-95 opacity-0">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden text-left transition-all transform bg-white border border-gray-200 shadow-2xl dark:bg-gray-800 rounded-2xl sm:my-8 sm:w-full sm:max-w-lg dark:border-gray-700">
                        {{-- Modal Header --}}
                        <div class="px-6 py-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex items-center justify-center w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl">
                                    <i class="text-xl text-red-600 fas fa-exclamation-triangle dark:text-red-400"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" id="modal-title">
                                        Delete Transaction
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        This action cannot be undone
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Body --}}
                        <div class="px-6 pb-6">
                            <p class="text-gray-700 dark:text-gray-300">
                                Are you sure you want to delete this transaction? All associated data will be
                                permanently removed from your records.
                            </p>
                        </div>

                        {{-- Modal Footer --}}
                        <div
                            class="flex flex-col-reverse gap-3 px-6 py-4 bg-gray-50 dark:bg-gray-700/50 sm:flex-row sm:justify-end">
                            <button onclick="hideModal()" type="button"
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 transition-colors duration-200 bg-white border border-gray-300 dark:text-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-500">
                                Cancel
                            </button>
                            <form id="deleteForm" action="" method="post" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex justify-center items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <i class="mr-2 fas fa-trash"></i>
                                    Delete Transaction
                                </button>
                            </form>
                        </div>
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

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');

            if (event.target === backdrop) {
                hideModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('modal');
                if (!modal.classList.contains('hidden')) {
                    hideModal();
                }
            }
        });

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
