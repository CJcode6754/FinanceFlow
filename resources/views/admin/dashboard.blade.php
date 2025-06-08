<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header --}}
        <x-header />

        <main class="px-8">
            <!-- Welcome Section -->
            <div class="mt-8 mb-8">
                <h2 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Welcome back, {{ auth()->user()->name }}!</h2>
                <p class="text-gray-600 dark:text-gray-300">Here's what's happening with your finances today.</p>
            </div>

            <!-- Quick Action Buttons -->
            <x-quick-actions />

            <!-- Financial Summary Cards -->
            <x-financial-summary :totalBalance="$totalBalance" :balanceChange="$balanceChange" :thisMonthIncome="$thisMonthIncome" :incomeChange="$incomeChange"
                :thisMonthExpense="$thisMonthExpense" :expenseChange="$expenseChange"/>

            <!-- Main Dashboard Grid -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Left Column (2/3 width) -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Recent Transactions -->
                    <x-recent-transactions :transactions="$recent" />

                    <!-- Monthly Overview Chart -->
                    <x-monthly-chart :monthLabels="$monthLabels" :graphIncome="$graphIncome" :graphExpense="$graphExpense" />
                </div>

                <!-- Right Column (1/3 width) -->
                <div class="space-y-6">
                    <!-- Budget Summary -->
                    <x-budget-summary :totalSpent="$totalSpent" :totalBudget="$totalBudget" :totalRemaining="$totalRemaining" :budgetPercentage="$budgetPercentage" />

                    <!-- Spending by Category -->
                    <x-category-chart :categoryLabels="$categoryLabels" :categoryData="$categoryData" />

                    <!-- Wallet Overview -->
                    <x-wallet-overview :wallets="$wallets" />
                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
    @endpush
</x-app-layout>
