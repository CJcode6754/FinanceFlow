<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Balance Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 md:col-span-1">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Total Balance</h3>
            <div class="p-2 bg-emerald-50 rounded-xl">
                <i data-feather="dollar-sign" class="w-6 h-6 text-emerald-500"></i>
            </div>
        </div>
        <div class="text-lg md:text-xl lg:text-3xl font-bold text-gray-900 mb-2">₱ {{ number_format($totalBalance, 2) }}</div>
        <div class="flex items-center text-sm">
            <span class="{{ $getBalanceChangeClass }} font-medium">
                {{ $balanceChange >= 0 ? '+' : '-' }}{{ number_format(abs($balanceChange), 2) }}%
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Income Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Monthly Income</h3>
            <div class="p-2 bg-emerald-50 rounded-xl">
                <i data-feather="trending-up" class="w-6 h-6 text-emerald-500"></i>
            </div>
        </div>
        <div class="text-lg md:text-xl lg:text-3xl font-bold text-gray-900 mb-2">₱{{ number_format($thisMonthIncome, 2) }}</div>
        <div class="flex items-center text-sm">
            <span class="{{ $getIncomeChangeClass }} font-medium">
                {{ $incomeChange >= 0 ? '+' : '-' }}{{ number_format(abs($incomeChange), 2) }}%
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Expenses Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-2 md:mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Monthly Expenses</h3>
            <div class="p-2 bg-red-50 rounded-xl">
                <i data-feather="trending-down" class="w-6 h-6 text-red-500"></i>
            </div>
        </div>
        <div class="text-lg md:text-xl lg:text-3xl font-bold text-gray-900 mb-2">₱{{ number_format($thisMonthExpense, 2) }}</div>
        <div class="flex items-center text-sm">
            <span class="{{ $getExpenseChangeClass }} font-medium">
                {{ $expenseChange >= 0 ? '+' : '-' }}{{ number_format(abs($expenseChange), 2) }}%
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>
</div>