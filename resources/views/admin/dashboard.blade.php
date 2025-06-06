<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header --}}
        <x-header />

        <main class="px-8">

            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
                <p class="text-gray-600">Here's what's happening with your finances today.</p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="mb-8 flex flex-wrap gap-4">
                <a href="{{ route('transaction.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="plus" class="w-5 h-5 mr-2"></i>
                    Add Transaction
                </a>
                <a href="{{ route('wallet.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="credit-card" class="w-5 h-5 mr-2"></i>
                    Add Wallet
                </a>
                <a href="{{ route('budget.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-sky-500 hover:bg-sky-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="target" class="w-5 h-5 mr-2"></i>
                    Add Budget
                </a>
                <a href="{{ route('savings.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-fuchsia-500 hover:bg-fuchsia-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="target" class="w-5 h-5 mr-2"></i>
                    Add Savings
                </a>
            </div>

            <!-- Top Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Balance Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 md:col-span-1">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Total Balance</h3>
                        <div class="p-2 bg-emerald-50 rounded-xl">
                            <i data-feather="dollar-sign" class="w-6 h-6 text-emerald-500"></i>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-gray-900 mb-2">₱ {{ number_format($totalBalance, 2) }}</div>
                    <div class="flex items-center text-sm">
                        <span class="{{ $balanceChange >= 0 ? 'text-emerald-500' : 'text-red-500' }} font-medium">
                            {{ $balanceChange >= 0 ? '+' : '-' }}{{ number_format(abs($balanceChange), 2) }}%
                        </span>
                        <span class="text-gray-500 ml-2">vs last month</span>
                    </div>
                </div>

                <!-- Income Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Monthly Income</h3>
                        <div class="p-2 bg-emerald-50 rounded-xl">
                            <i data-feather="trending-up" class="w-6 h-6 text-emerald-500"></i>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">₱{{ number_format($thisMonthIncome, 2) }}</div>
                    <div class="flex items-center text-sm">
                        <span class="{{ $incomeChange >= 0 ? 'text-emerald-500' : 'text-red-500' }} font-medium">
                            {{ $incomeChange >= 0 ? '+' : '-' }}{{ number_format(abs($incomeChange), 2) }}%
                        </span>
                        <span class="text-gray-500 ml-2">vs last month</span>
                    </div>
                </div>

                <!-- Expenses Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Monthly Expenses</h3>
                        <div class="p-2 bg-red-50 rounded-xl">
                            <i data-feather="trending-down" class="w-6 h-6 text-red-500"></i>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">₱{{ number_format($thisMonthExpense, 2) }}</div>
                    <div class="flex items-center text-sm">
                        <span class="{{ $expenseChange >= 0 ? 'text-green-500' : 'text-red-500' }} font-medium">
                            {{ $expenseChange >= 0 ? '+' : '-' }}{{ number_format(abs($expenseChange), 2) }}%
                        </span>
                        <span class="text-gray-500 ml-2">vs last month</span>
                    </div>

                </div>
            </div>

            <!-- Main Dashboard Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column (2/3 width) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Recent Transactions</h3>
                            <a href="{{ route('transaction.index') }}"
                                class="text-indigo-500 hover:text-indigo-600 font-medium text-sm">View All</a>
                        </div>
                        <div class="space-y-4">
                            @foreach ($recent as $item)
                                <div
                                    class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-sky-50 rounded-xl mr-4">
                                            <img class="h5 w-5 object-contain"
                                                src="{{ asset('storage/' . $item->category->image) }}"
                                                alt="{{ $item->category->name }}">
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $item->category->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-semibold text-red-600">{!! $item->type == 'income'
                                            ? '<span class="text-green-500">+ ₱ ' . $item->amount . '</span>'
                                            : '<span class="text-red-500">- </i> ₱ ' . $item->amount . '</span>' !!}</div>
                                        <div class="text-xs text-gray-500 capitalize">{{ $item->type }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Monthly Overview Chart -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Monthly Overview</h3>
                            <form action="{{ route('dashboard') }}" method="get">
                                <select name="filter_by_months" onchange="this.form.submit()"
                                    class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 bg-white">
                                    <option value="">Select Filter</option>
                                    <option value="1" {{ request('filter_by_months') == '1' ? 'selected' : '' }}>
                                        Last month</option>
                                    <option value="2" {{ request('filter_by_months') == '2' ? 'selected' : '' }}>
                                        Last 2 months</option>
                                    <option value="3" {{ request('filter_by_months') == '3' ? 'selected' : '' }}>
                                        Last 3 months</option>
                                    <option value="6" {{ request('filter_by_months') == '6' ? 'selected' : '' }}>
                                        Last 6 months</option>
                                    <option value="9" {{ request('filter_by_months') == '9' ? 'selected' : '' }}>
                                        Last 9 months</option>
                                    <option value="12" {{ request('filter_by_months') == '12' ? 'selected' : '' }}>
                                        Last 12 months</option>
                                </select>
                            </form>

                        </div>
                        <div class="h-64">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Right Column (1/3 width) -->
                <div class="space-y-6">
                    <!-- Budget Summary -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900">Budget Summary</h3>
                            <div class="p-2 bg-sky-50 rounded-xl">
                                <i data-feather="target" class="w-5 h-5 text-sky-500"></i>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Spent this month</span>
                                <span class="font-medium text-gray-900">₱{{ number_format($totalSpent, 2) }} /
                                    ₱{{ number_format($totalBudget, 2) }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-sky-500 h-3 rounded-full" style="width: {{ $budgetPercentage }}%">
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="text-emerald-500 font-medium">₱{{ $totalRemaining }} remaining</span> for
                            this
                            month
                        </div>
                    </div>

                    <!-- Spending by Category -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Spending by Category</h3>
                        <div class="h-75 mb-4 flex items-center justify-center">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>

                    <!-- Wallet Overview -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Wallet Overview</h3>
                            <button class="text-indigo-500 hover:text-indigo-600 text-sm font-medium">Manage</button>
                        </div>
                        <div class="space-y-4">
                            @foreach ($wallets as $item)
                                <div
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl text-white">
                                    <div>
                                        <div class="text-sm opacity-90">{{ $item->name }}</div>
                                        <div class="font-bold text-lg">₱{{ number_format($item->balance) }}</div>
                                    </div>
                                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                                        <i data-feather="credit-card" class="w-5 h-5"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            // Initialize Feather Icons
            feather.replace();

            // Monthly Overview Chart
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            new Chart(monthlyCtx, {
                type: 'line',
                data: {
                    labels: @json($monthLabels),
                    datasets: [{
                        label: 'Income',
                        data: @json($graphIncome),
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Expenses',
                        data: @json($graphExpense),
                        borderColor: '#ef4444',
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
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Category Spending Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');

            const data = {
                labels: @json($spcategoryLabels),
                datasets: [{
                    label: 'Spending per Category',
                    data: @json($spCategory),
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
            new Chart(categoryCtx, config);
        </script>
    </div>

</x-app-layout>
