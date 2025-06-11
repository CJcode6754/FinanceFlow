<x-app-layout title="Transactions">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 min-h-screen transition-colors duration-300 md:ml-64 bg-gray-50 dark:bg-gray-800">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-6 md:py-8 md:px-8 lg:px-12">
            {{-- Header Section --}}
            <div class="mb-8">
                <div class="flex flex-col gap-6 lg:flex-row lg:justify-between lg:items-start">
                    {{-- Title Section --}}
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold text-gray-900 lg:text-4xl dark:text-gray-100">
                            Transactions
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            Manage and track all your financial transactions
                        </p>
                    </div>

                    {{-- Quick Add Button --}}
                    <div class="flex gap-3">
                        <a href="{{ route('transaction.create') }}"
                            class="btn w-full px-6 py-3">
                            <i class="text-sm fas fa-plus"></i>
                            <span>Add Transaction</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Filters Section --}}
            <div class="mb-8">
                <div
                    class="p-6 transition-colors duration-300 bg-white border border-gray-200 shadow-sm dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-blue-100 rounded-lg dark:bg-blue-900/30">
                            <i class="text-blue-600 fas fa-filter dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Filters</h2>
                    </div>

                    <form action="{{ route('transaction.index') }}" method="GET" class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                            {{-- Type Filter --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                                <select name="type"
                                    class="w-full px-4 py-3 text-gray-900 transition-all duration-200 border border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-xl dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">All Types</option>
                                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>
                                        💸 Expense
                                    </option>
                                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>
                                        💰 Income
                                    </option>
                                </select>
                            </div>

                            {{-- Wallet Filter --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Wallet</label>
                                <select name="wallet"
                                    class="w-full px-4 py-3 text-gray-900 transition-all duration-200 border border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-xl dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">All Wallets</option>
                                    <option value="bank" {{ request('wallet') == 'bank' ? 'selected' : '' }}>
                                        🏦 Bank
                                    </option>
                                    <option value="cash" {{ request('wallet') == 'cash' ? 'selected' : '' }}>
                                        💵 Cash
                                    </option>
                                    <option value="e-wallet" {{ request('wallet') == 'e-wallet' ? 'selected' : '' }}>
                                        📱 E-wallet
                                    </option>
                                </select>
                            </div>

                            {{-- Date Filter --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Period</label>
                                <select name="date_filter"
                                    class="w-full px-4 py-3 text-gray-900 transition-all duration-200 border border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-xl dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">All Time</option>
                                    <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>
                                        Today</option>
                                    <option value="this_week"
                                        {{ request('date_filter') == 'this_week' ? 'selected' : '' }}>This Week</option>
                                    <option value="this_month"
                                        {{ request('date_filter') == 'this_month' ? 'selected' : '' }}>This Month
                                    </option>
                                    <option value="last_month"
                                        {{ request('date_filter') == 'last_month' ? 'selected' : '' }}>Last Month
                                    </option>
                                    <option value="last_3_month"
                                        {{ request('date_filter') == 'last_3_month' ? 'selected' : '' }}>Last 3 Months
                                    </option>
                                    <option value="last_6_month"
                                        {{ request('date_filter') == 'last_6_month' ? 'selected' : '' }}>Last 6 Months
                                    </option>
                                    <option value="this_year"
                                        {{ request('date_filter') == 'this_year' ? 'selected' : '' }}>This Year
                                    </option>
                                </select>
                            </div>

                            {{-- Filter Button --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-transparent">Action</label>
                                <button type="submit"
                                    class="btn w-full px-4 py-3">
                                    <i class="mr-2 fas fa-search"></i>
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Transactions Table --}}
            <div
                class="overflow-hidden transition-colors duration-300 bg-white border border-gray-200 shadow-sm dark:bg-gray-800 rounded-2xl dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 rounded-lg dark:bg-green-900/30">
                            <i class="text-green-600 fas fa-list dark:text-green-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Recent Transactions</h3>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase dark:text-gray-300">
                                    Category
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase dark:text-gray-300">
                                    Notes
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-right text-gray-600 uppercase dark:text-gray-300">
                                    Amount
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                                    Type
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                                    Wallet
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                                    Date
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase dark:text-gray-300">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($transaction as $item)
                                <tr class="transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    {{-- Category --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl">
                                                {{ substr($item->category->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                    {{ $item->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Notes --}}
                                    <td class="px-6 py-4">
                                        <div class="max-w-xs text-sm text-gray-600 truncate dark:text-gray-300">
                                            {{ $item->note ?: 'No notes' }}
                                        </div>
                                    </td>

                                    {{-- Amount --}}
                                    <td class="px-6 py-4 text-right">
                                        <div
                                            class="text-lg font-bold {{ $item->type === 'income' ? 'text-green-600 dark:text-green-400' : ($item->type === 'expense' ? 'text-red-600 dark:text-red-400' : 'text-blue-600 dark:text-blue-400') }}">
                                            {{ $item->type === 'income' ? '+' : ($item->type === 'expense' ? '-' : '') }}₱{{ number_format($item->amount, 2) }}
                                        </div>
                                    </td>

                                    {{-- Type --}}
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                            {{ $item->type === 'income'
                                                ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300'
                                                : ($item->type === 'expense'
                                                    ? 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300'
                                                    : 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300') }}">
                                            {{ $item->type === 'income' ? '💰' : ($item->type === 'expense' ? '💸' : '🔄') }}
                                            <span class="ml-1 capitalize">{{ $item->type }}</span>
                                        </span>
                                    </td>

                                    {{-- Wallet --}}
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $item->wallet->name }}
                                        </div>
                                    </td>

                                    {{-- Date --}}
                                    <td class="px-6 py-4 text-center">
                                        <div class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}
                                        </div>
                                        <div class="text-xs text-gray-400 dark:text-gray-500">
                                            {{ \Carbon\Carbon::parse($item->date)->format('g:i A') }}
                                        </div>
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('transaction.edit', $item->id) }}"
                                                class="inline-flex items-center justify-center w-8 h-8 text-blue-600 transition-colors duration-200 bg-blue-100 rounded-lg dark:bg-blue-900/30 hover:bg-blue-200 dark:hover:bg-blue-900/50 dark:text-blue-400"
                                                title="Edit Transaction">
                                                <i class="text-sm fas fa-edit"></i>
                                            </a>
                                            <button onclick="showModal({{ $item->id }})"
                                                class="inline-flex items-center justify-center w-8 h-8 text-red-600 transition-colors duration-200 bg-red-100 rounded-lg dark:bg-red-900/30 hover:bg-red-200 dark:hover:bg-red-900/50 dark:text-red-400"
                                                title="Delete Transaction">
                                                <i class="text-sm fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="px-4 py-4">
                        {{ $transaction->onEachSide(1)->links() }}
                    </div>
                    
                    @if (count($transaction) === 0)
                        <div class="py-12 text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 mb-4 bg-gray-100 rounded-full dark:bg-gray-700">
                                <i class="text-2xl text-gray-400 fas fa-receipt dark:text-gray-500"></i>
                            </div>
                            <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-100">No transactions
                                found</h3>
                            <p class="mb-6 text-gray-600 dark:text-gray-400">Get started by adding your first
                                transaction.</p>
                            <a href="{{ route('transaction.create') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                <i class="text-sm fas fa-plus"></i>
                                <span>Add Your First Transaction</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </main>

        {{-- Modern Delete Modal --}}
        <div id="modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div id="modal-backdrop"
                class="fixed inset-0 transition-opacity duration-300 opacity-0 bg-black/50 backdrop-blur-sm"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="fixed inset-0 z-10 w-screen overflow-y-auto transition duration-300 ease-out scale-95 opacity-0">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden text-left transition-all transform bg-white border border-gray-200 shadow-2xl dark:bg-gray-800 rounded-2xl sm:my-8 sm:w-full sm:max-w-lg dark:border-gray-700">
                        {{-- Modal Header --}}
                        <div class="px-6 py-6">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex items-center justify-center w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl">
                                    <i class="text-xl text-red-600 fas fa-exclamation-triangle dark:text-red-400"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                                        id="modal-title">
                                        Delete Transaction
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        This action cannot be undone
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Body --}}
                        <div class="px-6 pb-6">
                            <p class="text-gray-700 dark:text-gray-300">
                                Are you sure you want to delete this transaction? All associated data will be
                                permanently removed from your records.
                            </p>
                        </div>

                        {{-- Modal Footer --}}
                        <div
                            class="flex flex-col-reverse gap-3 px-6 py-4 bg-gray-50 dark:bg-gray-700/50 sm:flex-row sm:justify-end">
                            <button onclick="hideModal()" type="button"
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 transition-colors duration-200 bg-white border border-gray-300 dark:text-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-500">
                                Cancel
                            </button>
                            <form id="deleteForm" action="" method="post" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex justify-center items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                    <i class="mr-2 fas fa-trash"></i>
                                    Delete Transaction
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(itemID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `transaction/${itemID}`;
            modal.classList.remove('hidden');

            // Animate in
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                wrapper.classList.remove('opacity-0', 'scale-95');
            }, 10);
        }

        function hideModal() {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');

            // Animate out
            backdrop.classList.add('opacity-0');
            wrapper.classList.add('opacity-0', 'scale-95');

            // Hide after animation
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');

            if (event.target === backdrop) {
                hideModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('modal');
                if (!modal.classList.contains('hidden')) {
                    hideModal();
                }
            }
        });
    </script>
</x-app-layout>
