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
                            <select class="w-full md:w-48 px-3 py-2 border border-gray-300 rounded-md bg-white text-sm">
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
                        <x-saving-progress :savings="$savings" />
                    </div>
                </div>
            </div>
        </main>
    </main>
</x-app-layout>
