<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header --}}
        <x-header />

        <main class="px-8">

            <!-- Welcome Section -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, John!</h2>
                <p class="text-gray-600">Here's what's happening with your finances today.</p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="mb-8 flex flex-wrap gap-4">
                <button
                    class="inline-flex items-center px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="plus" class="w-5 h-5 mr-2"></i>
                    Add Transaction
                </button>
                <button
                    class="inline-flex items-center px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="credit-card" class="w-5 h-5 mr-2"></i>
                    Add Wallet
                </button>
                <button
                    class="inline-flex items-center px-6 py-3 bg-sky-500 hover:bg-sky-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
                    <i data-feather="target" class="w-5 h-5 mr-2"></i>
                    Add Budget
                </button>
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
                    <div class="text-4xl font-bold text-gray-900 mb-2">$12,450.80</div>
                    <div class="flex items-center text-sm">
                        <span class="text-emerald-500 font-medium">+2.5%</span>
                        <span class="text-gray-500 ml-2">from last month</span>
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
                    <div class="text-3xl font-bold text-gray-900 mb-2">$5,200.00</div>
                    <div class="flex items-center text-sm">
                        <span class="text-emerald-500 font-medium">+8.2%</span>
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
                    <div class="text-3xl font-bold text-gray-900 mb-2">$3,180.45</div>
                    <div class="flex items-center text-sm">
                        <span class="text-red-500 font-medium">+12.1%</span>
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
                            <button class="text-indigo-500 hover:text-indigo-600 font-medium text-sm">View All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                <div class="flex items-center">
                                    <div class="p-2 bg-sky-50 rounded-xl mr-4">
                                        <i data-feather="shopping-bag" class="w-5 h-5 text-sky-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Grocery Store</div>
                                        <div class="text-sm text-gray-500">June 2, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-red-600">-$127.50</div>
                                    <div class="text-xs text-gray-500">Food & Dining</div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                <div class="flex items-center">
                                    <div class="p-2 bg-emerald-50 rounded-xl mr-4">
                                        <i data-feather="briefcase" class="w-5 h-5 text-emerald-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Salary Deposit</div>
                                        <div class="text-sm text-gray-500">June 1, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-emerald-600">+$2,600.00</div>
                                    <div class="text-xs text-gray-500">Income</div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                <div class="flex items-center">
                                    <div class="p-2 bg-indigo-50 rounded-xl mr-4">
                                        <i data-feather="zap" class="w-5 h-5 text-indigo-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Electric Bill</div>
                                        <div class="text-sm text-gray-500">May 31, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-red-600">-$89.30</div>
                                    <div class="text-xs text-gray-500">Utilities</div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-3">
                                <div class="flex items-center">
                                    <div class="p-2 bg-purple-50 rounded-xl mr-4">
                                        <i data-feather="film" class="w-5 h-5 text-purple-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Netflix Subscription</div>
                                        <div class="text-sm text-gray-500">May 30, 2025</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-semibold text-red-600">-$15.99</div>
                                    <div class="text-xs text-gray-500">Entertainment</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Overview Chart -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Monthly Overview</h3>
                            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 bg-white">
                                <option>Last 6 months</option>
                                <option>Last 12 months</option>
                            </select>
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
                                <span class="font-medium text-gray-900">$3,180 / $4,000</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-sky-500 h-3 rounded-full" style="width: 79.5%"></div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600">
                            <span class="text-emerald-500 font-medium">$820 remaining</span> for this month
                        </div>
                    </div>

                    <!-- Spending by Category -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Spending by Category</h3>
                        <div class="h-48 mb-4">
                            <canvas id="categoryChart"></canvas>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-sky-500 rounded-full mr-3"></div>
                                    <span class="text-sm text-gray-700">Food & Dining</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$1,240</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-indigo-500 rounded-full mr-3"></div>
                                    <span class="text-sm text-gray-700">Utilities</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$890</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-emerald-500 rounded-full mr-3"></div>
                                    <span class="text-sm text-gray-700">Transportation</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$650</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                                    <span class="text-sm text-gray-700">Entertainment</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">$400</span>
                            </div>
                        </div>
                    </div>

                    <!-- Wallet Overview -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-gray-900">Wallet Overview</h3>
                            <button class="text-indigo-500 hover:text-indigo-600 text-sm font-medium">Manage</button>
                        </div>
                        <div class="space-y-4">
                            <div
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl text-white">
                                <div>
                                    <div class="text-sm opacity-90">Main Checking</div>
                                    <div class="font-bold text-lg">$8,450.30</div>
                                </div>
                                <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                                    <i data-feather="credit-card" class="w-5 h-5"></i>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl text-white">
                                <div>
                                    <div class="text-sm opacity-90">Savings Account</div>
                                    <div class="font-bold text-lg">$3,200.50</div>
                                </div>
                                <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                                    <i data-feather="piggy-bank" class="w-5 h-5"></i>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-sky-500 to-blue-600 rounded-xl text-white">
                                <div>
                                    <div class="text-sm opacity-90">Investment</div>
                                    <div class="font-bold text-lg">$800.00</div>
                                </div>
                                <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                                    <i data-feather="trending-up" class="w-5 h-5"></i>
                                </div>
                            </div>
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
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Income',
                        data: [4800, 5200, 4900, 5100, 5300, 5200],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Expenses',
                        data: [2800, 3200, 2900, 3100, 2850, 3180],
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
            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Food & Dining', 'Utilities', 'Transportation', 'Entertainment'],
                    datasets: [{
                        data: [1240, 890, 650, 400],
                        backgroundColor: [
                            '#0ea5e9',
                            '#6366f1',
                            '#10b981',
                            '#8b5cf6'
                        ],
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
                    cutout: '60%'
                }
            });
        </script>
    </div>

</x-app-layout>
