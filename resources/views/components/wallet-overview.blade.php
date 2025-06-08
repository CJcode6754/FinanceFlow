<div class="p-6 bg-white border border-gray-100 shadow-sm dark:bg-gray-800 dark:border-0 rounded-2xl">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Wallet Overview</h3>
        <a href="{{ route('wallet.index') }}"
            class="text-sm font-medium text-indigo-500 hover:text-indigo-600">Manage</a>
    </div>
    
    <div class="space-y-4">
        @forelse($wallets as $wallet)
            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                <div class="flex items-center">
                    <div class="p-2 bg-{{ $wallet->color ?? 'gray' }}-100 rounded-lg">
                        <i data-feather="{{ $wallet->icon ?? 'credit-card' }}" 
                           class="w-5 h-5 text-{{ $wallet->color ?? 'gray' }}-600"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $wallet->name }}</h4>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-semibold text-gray-900 dark:text-gray-300">₱{{ number_format($wallet->balance, 2) }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $wallet->currency ?? 'PHP' }}</div>
                </div>
            </div>
        @empty
            <div class="py-8 text-center">
                <i data-feather="wallet" class="w-12 h-12 mx-auto mb-4 text-gray-400"></i>
                <p class="text-gray-500">No wallets yet</p>
                <a href="{{ route('wallet.create') }}" class="font-medium text-indigo-500 hover:text-indigo-600">
                    Add your first wallet
                </a>
            </div>
        @endforelse
    </div>
</div>
