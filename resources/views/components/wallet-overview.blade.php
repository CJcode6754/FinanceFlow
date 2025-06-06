<div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-gray-900">Wallet Overview</h3>
        <a href="{{ route('wallet.index') }}"
            class="text-indigo-500 hover:text-indigo-600 font-medium text-sm">Manage</a>
    </div>
    
    <div class="space-y-4">
        @forelse($wallets as $wallet)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div class="flex items-center">
                    <div class="p-2 bg-{{ $wallet->color ?? 'gray' }}-100 rounded-lg">
                        <i data-feather="{{ $wallet->icon ?? 'credit-card' }}" 
                           class="w-5 h-5 text-{{ $wallet->color ?? 'gray' }}-600"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-medium text-gray-900">{{ $wallet->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $wallet->type }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-semibold text-gray-900">₱{{ number_format($wallet->balance, 2) }}</div>
                    <div class="text-sm text-gray-500">{{ $wallet->currency ?? 'PHP' }}</div>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <i data-feather="wallet" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                <p class="text-gray-500">No wallets yet</p>
                <a href="{{ route('wallet.create') }}" class="text-indigo-500 hover:text-indigo-600 font-medium">
                    Add your first wallet
                </a>
            </div>
        @endforelse
    </div>
</div>
