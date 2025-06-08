<x-app-layout title="Savings">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-6 sm:px-6 md:px-12">
            <!-- Filter Section -->
            <section
                class="flex flex-col items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 md:flex-row">
                <div>
                    <h2 class="mb-2 text-2xl font-semibold dark:text-white">My Savings <i class="fa-solid fa-piggy-bank"></i></h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Track your spending limits and stay on budget</p>
                </div>

                <div class="flex items-center gap-2 md:gap-4">
                    {{-- Filter --}}
                    <x-savings-filter/>

                    <a href="{{ route('savings.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-blue-600 transition border border-gray-600 rounded-md dark:text-gray-300 hover:bg-blue-600 hover:text-white">
                        <i class="fa-solid fa-plus"></i>
                        Goal
                    </a>
                </div>
            </section>

            <!-- Savings Content -->
            <section class="py-4">
                {{-- Overview --}}
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div class="p-8 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-xl font-bold text-gray-600 dark:text-gray-300">₱ {{ number_format($totalSaved, 2) }}</h2>
                        <p class="text-sm font-medium text-gray-400 dark:text-gray-400">Total Saved</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-xl font-bold text-gray-600 dark:text-gray-300">₱ {{ number_format($totalGoals, 2) }}</h2>
                        <p class="text-sm font-medium text-gray-400 dark:text-gray-400">Total Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-xl font-bold text-gray-600 dark:text-gray-300">{{ $activeGoals }}</h2>
                        <p class="text-sm font-medium text-gray-400 dark:text-gray-400">Active Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-xl font-bold text-gray-600 dark:text-gray-300">{{ number_format($avgProgress, 2) }}%</h2>
                        <p class="text-sm font-medium text-gray-400 dark:text-gray-400">Avg Progress</p>
                    </div>
                </div>
            </section>

            <section class="py-4">
                <h1 class="mb-6 text-2xl font-bold">Saving Goals</h1>

                <x-saving-goals :savings="$savings"/>
            </section>

            <section class="py-4">
                <div class="p-2 bg-white shadow dark:bg-gray-800 lg:p-8 rounded-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-600 dark:text-white">Recent Activity</h2>
                        <a href="{{route('transaction.index')}}" class="text-base font-semibold text-gray-400 dark:text-gray-300">View All</a>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="hidden w-full text-sm border border-gray-200 rounded-md shadow-lg dark:border-0 md:table">
                            <thead class="text-center text-gray-600 bg-gray-100 dark:text-white dark:bg-gray-800">
                                <tr class="text-sm font-semibold">
                                    <th class="px-4 py-4">Type</th>
                                    <th>Saving Goals Name</th>
                                    <th>Note</th>
                                    <th>Date and Time</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-gray-700 dark:text-gray-300">
                                @foreach ($transactionHistory as $history)
                                    <tr class="font-medium border-t hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-2 capitalize md:p-4">
                                            {!! $history->type == 'deposit'
                                                ? '<i class="p-2 mr-2 text-white bg-green-400 rounded-lg fa-solid fa-plus"></i>'
                                                : '<i class="p-2 mr-2 text-white bg-red-400 rounded-lg fa-solid fa-minus"></i>' !!}
                                            {{ $history->type }}
                                        </td>
                                        <td>{{ $history->savings->name }}</td>
                                        <td>{{ $history->note }}</td>
                                        <td>
                                            {{ $history->date->isToday() ? 'Today' : $history->date->format('M d') }},
                                            {{ $history->date->format('g:iA') }}
                                        </td>
                                        <td>
                                            {!! $history->type == 'deposit'
                                                ? '<span class="text-green-500">+ ₱ ' . $history->amount . '</span>'
                                                : '<span class="text-red-500">- ₱ ' . $history->amount . '</span>' !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Mobile Cards -->
                        <div class="space-y-4 md:hidden">
                            @foreach ($transaction_history as $history)
                                <div class="p-4 border rounded-lg shadow-sm">
                                    <div class="flex items-center justify-between">
                                        <div class="font-medium capitalize">
                                            {!! $history->type == 'deposit'
                                                ? '<i class="p-2 mr-2 text-white bg-green-400 rounded-lg fa-solid fa-plus"></i>'
                                                : '<i class="p-2 mr-2 text-white bg-red-400 rounded-lg fa-solid fa-minus"></i>' !!}
                                            {{ $history->type }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $history->date->isToday() ? 'Today' : $history->date->format('M d Y') }},
                                            {{ $history->date->format('g:iA') }}
                                        </div>
                                    </div>

                                    <div class="mt-2 space-y-2 text-sm text-gray-800">
                                        <p><span class="font-semibold">Saving Goals:</span>
                                            {{ $history->savings->name }}</p>
                                        <p><span class="font-semibold">Note:</span> {{ $history->note }}</p>
                                        <p>
                                            <span class="font-semibold">Amount:</span>
                                            {!! $history->type == 'deposit'
                                                ? '<span class="text-green-500">+ ₱ ' . $history->amount . '</span>'
                                                : '<span class="text-red-500">- ₱ ' . $history->amount . '</span>' !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        {{ $transaction_history->links() }}
                    </div>
                </div>
            </section>

        </main>

        {{-- Modal for Savings Deletion --}}
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
        function showModal(savingID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `savings/${savingID}`;
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
