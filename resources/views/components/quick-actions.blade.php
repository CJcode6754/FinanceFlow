<div class="mb-8 flex flex-wrap items-center justify-center md:justify-start gap-4">
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
        <i data-feather="dollar-sign" class="w-5 h-5 mr-2"></i>
        Add Budget
    </a>
    <a href="{{ route('savings.index') }}"
        class="inline-flex items-center px-6 py-3 bg-fuchsia-500 hover:bg-fuchsia-600 text-white font-medium rounded-2xl transition-colors shadow-sm">
        <i data-feather="target" class="w-5 h-5 mr-2"></i>
        Add Savings
    </a>
</div>