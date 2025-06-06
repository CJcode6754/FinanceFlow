<div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900">Budget Summary</h3>
        <a href="{{ route('budget.index') }}"
            class="text-indigo-500 hover:text-indigo-600 font-medium text-sm">View All</a>
    </div>
    
    <div class="space-y-4">
        <div class="text-center">
            <div class="text-2xl font-bold text-gray-900 mb-1">₱{{ number_format($totalSpent, 2) }}</div>
            <div class="text-sm text-gray-500">of ₱{{ number_format($totalBudget, 2) }} spent</div>
        </div>
        
        <div class="relative">
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-3 rounded-full transition-all duration-300"
                     style="width: {{ min($budgetPercentage, 100) }}%"></div>
            </div>
            <div class="text-sm text-gray-500 mt-2 text-center">
                {{ number_format($budgetPercentage, 1) }}% of budget used
            </div>
        </div>
        
        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <span class="text-sm text-gray-600">Remaining</span>
            <span class="font-semibold {{ $totalRemaining >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                ₱{{ number_format($totalRemaining, 2) }}
            </span>
        </div>
    </div>
</div>
