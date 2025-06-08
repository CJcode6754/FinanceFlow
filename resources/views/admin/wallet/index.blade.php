<x-app-layout title="My Wallet">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-2 md:px-8">
            <!-- Wallet Card + Balance -->
            <section class="flex flex-col gap-4 px-2 py-4 lg:flex-row md:gap-6 md:px-8">
                <div class="w-full space-y-3 lg:w-2/5">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-bold">Wallets</h2>
                        <a href="{{ route('wallet.create') }}"
                            class="px-4 py-2 text-sm font-semibold text-gray-500 transition duration-150 border border-blue-500 rounded-lg hover:bg-blue-600 hover:text-white group dark:text-white"><i
                                class="fa-solid fa-plus"></i> Add</a>
                    </div>
                    <!-- Wallet Card -->
                    @foreach ($wallets as $wallet)
                        <div
                            class="flex flex-col justify-between w-full h-48 p-5 text-white shadow-xl rounded-2xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                            <div class="flex items-center justify-between">
                                <h1 class="text-lg font-semibold">{{ $wallet->name }}</h1>

                                <div class="flex items-center gap-4">
                                    <a href="{{ route('wallet.edit', $wallet->id) }}"><i
                                            class="text-gray-500 transition duration-150 cursor-pointer fa-solid fa-pen-to-square hover:text-gray-700"></i></a>
                                    <button onclick="showModal({{ $wallet->id }})"><i
                                            class="text-gray-500 transition duration-150 cursor-pointer fa-solid fa-trash hover:text-gray-700"></i></button>
                                </div>
                            </div>
                            <div class="font-mono text-lg tracking-widest">Balance: {{ $wallet->balance }}</div>
                            <div class="text-sm">
                                <div class="mb-2 text-xs uppercase">Card Holder</div>
                                <div class="text-sm font-semibold capitalize">{{ $wallet->user->name }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Total Balance -->
                <div class="w-full space-y-4">
                    <section
                        class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 md:flex-row md:items-center md:justify-between">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-300">Total Balance</h3>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white">₱ {{ number_format($totalBalance, 2) }}</p>
                        </div>
                        <div
                            class="flex flex-col items-center w-full gap-6 p-6 bg-gray-800 dark:bg-white lg:flex-row rounded-2xl md:w-auto">
                            <!-- Income -->
                            <div class="flex-1 text-white">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-base font-semibold dark:text-gray-800">Total Income</h3>
                                    <p class="flex items-center gap-1 text-emerald-400">
                                        <i class="fa-solid fa-arrow-up"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold dark:text-gray-800">₱ {{ number_format($income, 2) ?? 0 }}</p>
                            </div>

                            <!-- Expense -->
                            <div class="flex-1 w-full p-4 bg-white rounded-xl md:w-auto">
                                <div class="flex justify-between mb-1 text-gray-600">
                                    <h4 class="text-base font-semibold">Total Expense</h4>
                                    <p class="flex items-center gap-1">
                                        <i class="fa-solid fa-arrow-down"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold text-gray-700">₱ {{ number_format($expense, 2) ?? 0 }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Actions -->
                    {{-- <section class="py-4">
                        <div
                            class="grid grid-cols-2 gap-4 p-6 bg-white shadow rounded-xl sm:grid-cols-3 lg:grid-cols-5">
                            @₱
                                $actions = [
                                    ['icon' => 'wallet', 'label' => 'Deposit', 'color' => 'text-blue-600'],
                                    ['icon' => 'arrow-up-from-bracket', 'label' => 'Send', 'color' => 'text-green-600'],
                                    [
                                        'icon' => 'arrow-down-to-bracket',
                                        'label' => 'Receive',
                                        'color' => 'text-yellow-600',
                                    ],
                                    [
                                        'icon' => 'file-invoice-dollar',
                                        'label' => 'Invoicing',
                                        'color' => 'text-purple-600',
                                    ],
                                    ['icon' => 'check', 'label' => 'Checkout', 'color' => 'text-indigo-600'],
                                ];
                            @end₱

                            @foreach ($actions as $action)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-{{ $action['icon'] }} text-xl {{ $action['color'] }}"></i>
                                    <h5 class="text-sm font-semibold">{{ $action['label'] }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section> --}}

                    <!-- Graph -->
                    <section class="w-full shadow-md rounded-xl">
                         <!-- Spending by Category -->
                        <x-category-chart :categoryLabels="$chartLabels" :categoryData="$chartData" />
                    </section>
                </div>
            </section>
        </main>

        {{-- Modal for Car deletion --}}
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
        function showModal(walletID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `wallet/${walletID}`;
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
