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
                        <h2 class="text-lg font-bold">Wallets</h2>
                        <a href="{{ route('wallet.create') }}"
                            class="px-4 py-2 text-sm font-semibold text-gray-500 transition duration-150 border border-blue-500 rounded-lg hover:bg-blue-600 hover:text-white group"><i
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
                <div class="w-full">
                    <section
                        class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow-md md:flex-row md:items-center md:justify-between">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-sm font-medium text-gray-500">Total Balance</h3>
                            <p class="text-3xl font-bold text-gray-800">PHP {{ number_format($totalBalance, 2) }}</p>
                        </div>
                        <div
                            class="flex flex-col items-center w-full gap-6 p-6 bg-gray-800 lg:flex-row rounded-2xl md:w-auto">
                            <!-- Income -->
                            <div class="flex-1 text-white">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-base font-semibold">Total Income</h3>
                                    <p class="flex items-center gap-1 text-emerald-400">
                                        <i class="fa-solid fa-arrow-up"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold">PHP {{ number_format($income, 2) ?? 0 }}</p>
                            </div>

                            <!-- Expense -->
                            <div class="flex-1 w-full p-4 bg-white rounded-xl md:w-auto">
                                <div class="flex justify-between mb-1 text-gray-600">
                                    <h4 class="text-base font-semibold">Total Expense</h4>
                                    <p class="flex items-center gap-1">
                                        <i class="fa-solid fa-arrow-down"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold text-gray-700">PHP {{ number_format($expense, 2) ?? 0 }}
                                </p>
                            </div>
                        </div>
                    </section>

                    <!-- Actions -->
                    <section class="py-4">
                        <div
                            class="grid grid-cols-2 gap-4 p-6 bg-white shadow rounded-xl sm:grid-cols-3 lg:grid-cols-5">
                            @php
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
                            @endphp

                            @foreach ($actions as $action)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-{{ $action['icon'] }} text-xl {{ $action['color'] }}"></i>
                                    <h5 class="text-sm font-semibold">{{ $action['label'] }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Graph -->
                    <section class="w-full p-4 bg-white shadow-md rounded-xl">
                         <!-- Spending by Category -->
                        <x-category-chart :categoryLabels="$chartLabels" :categoryData="$chartData" />
                    </section>
                </div>
            </section>
        </main>

        {{-- Modal for Car deletion --}}
        <div id="modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div id="modal-backdrop" class="fixed inset-0 transition-opacity duration-300 opacity-0 bg-gray-500/75"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="fixed inset-0 z-10 w-screen overflow-y-auto transition duration-300 ease-out scale-95 opacity-0">
                <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="flex items-center justify-center mx-auto bg-red-100 rounded-full size-12 shrink-0 sm:mx-0 sm:size-10">
                                    <svg class="text-red-600 size-6" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                        Delete Category</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to delete
                                            this category? All of your data will be permanently removed.
                                            This
                                            action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 sm:flex sm:flex-row-reverse sm:px-6">
                            <form id="deleteForm" action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-xs cursor-pointer hover:bg-red-500 sm:ml-3 sm:w-auto">Yes,
                                    Delete</button>
                            </form>
                            <button onclick="hideModal()" type="button"
                                class="inline-flex justify-center w-full px-3 py-2 mt-3 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-xs cursor-pointer ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
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
    </script>
</x-app-layout>
