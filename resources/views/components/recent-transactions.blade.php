<div class="p-6 bg-white border border-gray-100 shadow-sm dark:border-0 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Recent Transactions</h3>
        <a href="{{ route('transaction.index') }}"
            class="text-sm font-medium text-indigo-500 hover:text-indigo-600 dark:text-indigo-800">View All</a>
    </div>
    <div class="space-y-4">
        @forelse ($transactions as $transaction)
            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                <div class="flex items-center">
                    <div class="p-2 rounded-lg {{ $transaction->type === 'income' ? 'bg-emerald-100' : 'bg-red-100' }}">
                        <i data-feather="{{ $transaction->type === 'income' ? 'arrow-up' : 'arrow-down' }}" 
                           class="w-5 h-5 {{ $transaction->type === 'income' ? 'text-emerald-600' : 'text-red-600' }}"></i>
                    </div>
                    <div class="ml-4 space-y-1">
                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $transaction->category->name}}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $transaction->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-semibold {{ $transaction->type === 'income' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $transaction->type === 'income' ? '+' : '-' }}₱{{ number_format($transaction->amount, 2) }}
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-300">{{ $transaction->wallet->name }}</div>
                </div>
            </div>
        @empty
            <div class="py-8 text-center">
                <i data-feather="inbox" class="w-12 h-12 mx-auto mb-4 text-gray-400"></i>
                <p class="text-gray-500 dark:text-white">No transactions yet</p>
                <a href="{{ route('transaction.create') }}" class="font-medium text-indigo-500 hover:text-indigo-600">
                    Add your first transaction
                </a>
            </div>
        @endforelse
    </div>
</div>