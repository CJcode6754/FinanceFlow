<div class="p-6 bg-white border border-gray-100 shadow-sm dark:bg-gray-800 rounded-2xl dark:border-0">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Budget Summary</h3>
        <a href="{{ route('budget.index') }}"
            class="text-sm font-medium text-indigo-500 hover:text-indigo-600">View All</a>
    </div>
    
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div class="mb-1 text-2xl font-bold text-gray-900 dark:text-gray-400">₱{{ number_format($totalSpent, 2) }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-300">of ₱{{ number_format($totalBudget, 2) }} spent</div>
        </div>
        
        <div class="relative">
            <div class="w-full h-3 bg-gray-200 rounded-full">
                <div class="h-3 transition-all duration-300 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-600"
                     style="width: {{ min($budgetPercentage, 100) }}%"></div>
            </div>
            <div class="mt-2 text-sm text-center text-gray-500 dark:text-gray-300">
                {{ number_format($budgetPercentage, 1) }}% of budget used
            </div>
        </div>
        
        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-400">
            <span class="text-sm text-gray-600 dark:text-gray-300">Remaining</span>
            <span class="font-semibold {{ $totalRemaining >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                ₱{{ number_format($totalRemaining, 2) }}
            </span>
        </div>
    </div>
</div>
