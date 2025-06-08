<div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
    <!-- Total Balance Card -->
    <div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl md:col-span-1">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Total Balance</h3>
            <div class="p-2 bg-emerald-50 dark:bg-emerald-100 rounded-xl">
                <i data-feather="dollar-sign" class="w-6 h-6 text-emerald-500"></i>
            </div>
        </div>
        <div class="mb-2 text-lg font-bold text-gray-900 md:text-xl lg:text-3xl dark:text-white">₱ {{ number_format($totalBalance, 2) }}</div>
        <div class="flex items-center text-sm">
            <span class="{{ $getBalanceChangeClass }} font-medium">
                {{ $balanceChange >= 0 ? '+' : '-' }}{{ number_format(abs($balanceChange), 2) }}%
            </span>
            <span class="ml-2 text-gray-500 dark:text-gray-300">vs last month</span>
        </div>
    </div>

    <!-- Income Card -->
    <div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 rounded-2xl dark:bg-gray-800">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Monthly Income</h3>
            <div class="p-2 bg-emerald-50 dark:bg-emerald-100 rounded-xl">
                <i data-feather="trending-up" class="w-6 h-6 text-emerald-500"></i>
            </div>
        </div>
        <div class="mb-2 text-lg font-bold text-gray-900 md:text-xl dark:text-white lg:text-3xl">₱{{ number_format($thisMonthIncome, 2) }}</div>
        <div class="flex items-center text-sm">
            <span class="{{ $getIncomeChangeClass }} font-medium">
                {{ $incomeChange >= 0 ? '+' : '-' }}{{ number_format(abs($incomeChange), 2) }}%
            </span>
            <span class="ml-2 text-gray-500 dark:text-gray-300">vs last month</span>
        </div>
    </div>

    <!-- Expenses Card -->
    <div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Monthly Expenses</h3>
            <div class="p-2 bg-red-50 rounded-xl">
                <i data-feather="trending-down" class="w-6 h-6 text-red-500"></i>
            </div>
        </div>
        <div class="flex items-center text-sm">
            <span class="{{ $getExpenseChangeClass }} font-medium">
                {{ $expenseChange >= 0 ? '+' : '-' }}{{ number_format(abs($expenseChange), 2) }}%
            </span>
            <span class="ml-2 text-gray-500 dark:text-gray-300">vs last month</span>
        </div>
    </div>
</div>