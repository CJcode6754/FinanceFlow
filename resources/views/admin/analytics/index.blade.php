<x-app-layout title="Analytics">
    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <main class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-6 sm:px-6 md:px-12">
            <div class="min-h-screen p-6">
                <div class="mx-auto space-y-6 max-w-7xl">
                    <!-- Header Section -->
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Financial Analytics</h1>
                            <p class="mt-1 text-gray-600 dark:text-gray-300">Track your financial performance and
                                insights</p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row">
                            <form action="{{route('analytics')}}" method="get">
                                <select name="filter_by_months"
                                    class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 md:w-48 mr-2">
                                    <option value="1">📅 Last Month</option>
                                    <option value="2">📅 Last 2 Month</option>
                                    <option value="3">📅 Last 3 Months</option>
                                    <option value="6">📅 Last 6 Months</option>
                                    <option value="9">📅 Last 9 Months</option>
                                    <option value="12">📅 Last 12 Months</option>
                                </select>

                                <button type="submit" class="w-full px-2 py-2 text-sm bg-white border border-gray-300 rounded-md dark:bg-emerald-700 dark:hover:bg-emerald-600 md:w-25">Filter</button>
                            </form>

                            {{-- <button
                                class="flex items-center gap-2 px-4 py-2 text-sm bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 hover:bg-gray-50">
                                <i class="text-gray-500 fas fa-download"></i>
                                Export Data
                            </button> --}}
                        </div>
                    </div>

                    <!-- Charts Grid -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Income vs Expense Chart -->
                        <x-income-expense-bar-chart :monthLabels="$monthLabels" :graphIncome="$graphIncome" :graphExpense="$graphExpense" />

                        <!-- Spending by Category -->
                        <x-category-chart :categoryLabels="$categoryLabels" :categoryData="$categoryData" />
                    </div>

                    <!-- Second Row Charts -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Wallet Contribution Chart -->
                        <x-wallet-distribution-graph :walletLabels="$walletLabels" :walletData="$walletData" />

                        <!-- Budget vs Actual Chart -->
                        <x-budget-vs-actual-graph :budgetName="$budgetName" :setBudget="$setBudget" :actualBudget="$actualBudget" />
                    </div>

                    <!-- Savings Progress Section -->
                    <div
                        class="p-6 bg-white border border-gray-200 shadow-lg dark:bg-gray-800 dark:border-0 rounded-2xl">
                        <div class="flex items-center gap-2 mb-6">
                            <i class="fas fa-bullseye text-emerald-600"></i>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Savings Goals Progress</h2>
                        </div>
                        <x-saving-progress :savings="$savings" />
                    </div>
                </div>
            </div>
        </main>
    </main>
</x-app-layout>
