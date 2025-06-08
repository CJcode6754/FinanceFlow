<div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900">Recent Transactions</h3>
        <a href="{{ route('transaction.index') }}"
            class="text-indigo-500 hover:text-indigo-600 font-medium text-sm">View All</a>
    </div>
    <div class="space-y-4">
        @forelse ($transactions as $transaction)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div class="flex items-center">
                    <div class="p-2 rounded-lg {{ $transaction->type === 'income' ? 'bg-emerald-100' : 'bg-red-100' }}">
                        <i data-feather="{{ $transaction->type === 'income' ? 'arrow-up' : 'arrow-down' }}" 
                           class="w-5 h-5 {{ $transaction->type === 'income' ? 'text-emerald-600' : 'text-red-600' }}"></i>
                    </div>
                    <div class="ml-4 space-y-1">
                        <p class="text-sm text-gray-500">{{ $transaction->category->name}}</p>
                        <p class="text-sm text-gray-500">{{ $transaction->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-semibold {{ $transaction->type === 'income' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $transaction->type === 'income' ? '+' : '-' }}₱{{ number_format($transaction->amount, 2) }}
                    </div>
                    <div class="text-sm text-gray-500">{{ $transaction->wallet->name }}</div>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <i data-feather="inbox" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                <p class="text-gray-500">No transactions yet</p>
                <a href="{{ route('transaction.create') }}" class="text-indigo-500 hover:text-indigo-600 font-medium">
                    Add your first transaction
                </a>
            </div>
        @endforelse
    </div>
</div>