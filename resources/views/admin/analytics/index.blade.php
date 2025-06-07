<x-app-layout title="Analytics">
    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <main class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 sm:px-6 md:px-12 py-6">
            <div class="min-h-screen p-6">
                <div class="max-w-7xl mx-auto space-y-6">
                    <!-- Header Section -->
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Financial Analytics</h1>
                            <p class="text-gray-600 mt-1">Track your financial performance and insights</p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3">
                            <select class="w-48 px-3 py-2 border border-gray-300 rounded-md bg-white text-sm">
                                <option value="This Month">📅 This Month</option>
                                <option value="Last Month">Last Month</option>
                                <option value="Last 3 Months">Last 3 Months</option>
                                <option value="Custom Range">Custom Range</option>
                            </select>

                            <button
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-md bg-white text-sm hover:bg-gray-50">
                                <i class="fas fa-download text-gray-500"></i>
                                Export Data
                            </button>
                        </div>
                    </div>

                    <!-- Key Metrics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-trending-up text-emerald-600"></i>
                                <h3 class="text-sm font-medium text-gray-600">Total Income</h3>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">$12,450</div>
                            <p class="text-sm text-emerald-600 mt-1">+12.5% from last month</p>
                        </div>

                        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-dollar-sign text-red-500"></i>
                                <h3 class="text-sm font-medium text-gray-600">Total Expenses</h3>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">$8,750</div>
                            <p class="text-sm text-red-500 mt-1">+8.2% from last month</p>
                        </div>

                        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-bullseye text-indigo-600"></i>
                                <h3 class="text-sm font-medium text-gray-600">Net Savings</h3>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">$3,700</div>
                            <p class="text-sm text-indigo-600 mt-1">Savings rate: 29.7%</p>
                        </div>

                        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-wallet text-sky-600"></i>
                                <h3 class="text-sm font-medium text-gray-600">Active Wallets</h3>
                            </div>
                            <div class="text-2xl font-bold text-gray-900">5</div>
                            <p class="text-sm text-sky-600 mt-1">2 primary, 3 savings</p>
                        </div>
                    </div>

                    <!-- Charts Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Income vs Expense Chart -->
                        <x-income-expense-bar-chart :monthLabels="$monthLabels" :graphIncome="$graphIncome" :graphExpense="$graphExpense"/>

                        <!-- Spending by Category -->
                        <x-category-chart :categoryLabels="$categoryLabels" :categoryData="$categoryData" />
                    </div>

                    <!-- Second Row Charts -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Wallet Contribution Chart -->
                        <x-wallet-distribution-graph :walletLabels="$walletLabels" :walletData="$walletData"/>

                        <!-- Budget vs Actual Chart -->
                        <x-budget-vs-actual-graph :budgetName="$budgetName" :setBudget="$setBudget" :actualBudget="$actualBudget"/>
                    </div>

                    <!-- Savings Progress Section -->
                    <div class="bg-white shadow-sm border border-gray-200 rounded-2xl p-6">
                        <div class="flex items-center gap-2 mb-6">
                            <i class="fas fa-bullseye text-emerald-600"></i>
                            <h2 class="text-lg font-semibold text-gray-900">Savings Goals Progress</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Emergency Fund -->
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-emerald-500 rounded-lg">
                                            <i class="fas fa-bullseye text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">Emergency Fund</h3>
                                            <p class="text-sm text-gray-600">$4,500 remaining</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">78%</p>
                                        <p class="text-sm text-gray-600">Complete</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Current</span>
                                        <span class="font-medium text-gray-900">$15,500</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-emerald-500 h-3 rounded-full" style="width: 78%"></div>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Target</span>
                                        <span class="font-medium text-gray-900">$20,000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Vacation Fund -->
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-sky-500 rounded-lg">
                                            <i class="fas fa-trending-up text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">Vacation Fund</h3>
                                            <p class="text-sm text-gray-600">$4,800 remaining</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">40%</p>
                                        <p class="text-sm text-gray-600">Complete</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Current</span>
                                        <span class="font-medium text-gray-900">$3,200</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-sky-500 h-3 rounded-full" style="width: 40%"></div>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Target</span>
                                        <span class="font-medium text-gray-900">$8,000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Car Purchase -->
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-indigo-500 rounded-lg">
                                            <i class="fas fa-bullseye text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">Car Purchase</h3>
                                            <p class="text-sm text-gray-600">$12,200 remaining</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">51%</p>
                                        <p class="text-sm text-gray-600">Complete</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Current</span>
                                        <span class="font-medium text-gray-900">$12,800</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-indigo-500 h-3 rounded-full" style="width: 51%"></div>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Target</span>
                                        <span class="font-medium text-gray-900">$25,000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- House Down Payment -->
                            <div class="bg-gray-50 rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 bg-purple-500 rounded-lg">
                                            <i class="fas fa-trending-up text-white"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">House Down Payment</h3>
                                            <p class="text-sm text-gray-600">$45,000 remaining</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">44%</p>
                                        <p class="text-sm text-gray-600">Complete</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Current</span>
                                        <span class="font-medium text-gray-900">$35,000</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-purple-500 h-3 rounded-full" style="width: 44%"></div>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600">Target</span>
                                        <span class="font-medium text-gray-900">$80,000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </main>
</x-app-layout>
