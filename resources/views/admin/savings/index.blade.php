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
                class="flex flex-col items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md md:flex-row">
                <div>
                    <h2 class="mb-2 text-2xl font-semibold">My Savings <i class="fa-solid fa-piggy-bank"></i></h2>
                    <p class="text-sm text-gray-600">Track your spending limits and stay on budget</p>
                </div>

                <div class="flex items-center gap-2 md:gap-4">
                    {{-- Filter --}}
                    <x-savings-filter/>

                    <a href="{{ route('savings.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-blue-600 transition border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white">
                        <i class="fa-solid fa-plus"></i>
                        Goal
                    </a>
                </div>
            </section>

            <!-- Savings Content -->
            <section class="py-4">
                {{-- Overview --}}
                <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">PHP {{ number_format($totalSaved, 2) }}</h2>
                        <p class="text-sm font-medium text-gray-400">Total Saved</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">PHP {{ number_format($totalGoals, 2) }}</h2>
                        <p class="text-sm font-medium text-gray-400">Total Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">{{ $activeGoals }}</h2>
                        <p class="text-sm font-medium text-gray-400">Active Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">{{ number_format($avgProgress, 2) }}%</h2>
                        <p class="text-sm font-medium text-gray-400">Avg Progress</p>
                    </div>
                </div>
            </section>

            <section class="py-4">
                <h1 class="mb-6 text-2xl font-bold">Saving Goals</h1>

                <x-saving-goals :savings="$savings"/>
            </section>

            <section class="py-4">
                <div class="p-2 lg:p-8 bg-white shadow rounded-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-600">Recent Activity</h2>
                        <a href="{{route('transaction.index')}}" class="text-base font-semibold text-gray-400">View All</a>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full text-sm border border-gray-200 rounded-md md:table hidden">
                            <thead class="text-center text-gray-600 bg-gray-100">
                                <tr class="text-sm font-semibold">
                                    <th class="px-4 py-4">Type</th>
                                    <th>Saving Goals Name</th>
                                    <th>Note</th>
                                    <th>Date and Time</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-gray-700">
                                @foreach ($transactionHistory as $history)
                                    <tr class="font-medium border-t hover:bg-gray-50">
                                        <td class="p-2 md:p-4 capitalize">
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
                                                ? '<span class="text-green-500">+ PHP ' . $history->amount . '</span>'
                                                : '<span class="text-red-500">- PHP ' . $history->amount . '</span>' !!}
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
                                        <div class="capitalize font-medium">
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

                                    <div class="mt-2 text-sm text-gray-800 space-y-2">
                                        <p><span class="font-semibold">Saving Goals:</span>
                                            {{ $history->savings->name }}</p>
                                        <p><span class="font-semibold">Note:</span> {{ $history->note }}</p>
                                        <p>
                                            <span class="font-semibold">Amount:</span>
                                            {!! $history->type == 'deposit'
                                                ? '<span class="text-green-500">+ PHP ' . $history->amount . '</span>'
                                                : '<span class="text-red-500">- PHP ' . $history->amount . '</span>' !!}
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

        {{-- Modal for Car deletion --}}
        <div id="modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
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
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                        Delete sort</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to delete
                                            this savings? All of your data will be permanently removed.
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
    </script>
</x-app-layout>
