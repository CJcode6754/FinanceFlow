<x-app-layout title="Transactions">
    {{-- Toast Component --}}
    <x-toast/>

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-2 md:py-8 md:px-16">
            <div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center">
                <h1 class="text-2xl font-bold text-gray-800">Transactions</h1>

                {{-- Filters --}}
                <div class="flex flex-wrap gap-3">
                    <form action="{{ route('transaction.index') }}" method="GET" class="flex flex-wrap gap-3">
                        <select name="type"
                            class="px-4 py-2 text-sm border-gray-300 rounded-md apperance-none focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Filter by Type</option>
                            <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Expense</option>
                            <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Income</option>
                            <option value="transfer" {{ request('type') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                        </select>

                        <select name="wallet"
                            class="px-4 py-2 text-sm border-gray-300 rounded-md apperance-none focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Filter by Wallet</option>
                            <option value="bank" {{ request('wallet') == 'bank' ? 'selected' : '' }}>Bank</option>
                            <option value="cash" {{ request('wallet') == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="e-wallet" {{ request('wallet') == 'e-wallet' ? 'selected' : '' }}>E-wallet</option>
                        </select>

                        <select name="date_filter"
                            class="px-4 py-2 text-sm border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Filter by Date</option>
                            <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
                            <option value="this_week" {{ request('date_filter') == 'this_week' ? 'selected' : '' }}>This Week</option>
                            <option value="this_month" {{ request('date_filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
                            <option value="last_month" {{ request('date_filter') == 'last_month' ? 'selected' : '' }}>Last Month</option>
                            <option value="last_3_month" {{ request('date_filter') == 'last_3_month' ? 'selected' : '' }}>Last 3 Months</option>
                            <option value="last_6_month" {{ request('date_filter') == 'last_6_month' ? 'selected' : '' }}>Last 6 Months</option>
                            <option value="this_year" {{ request('date_filter') == 'this_year' ? 'selected' : '' }}>This Year</option>
                        </select>

                        <button type="submit"
                            class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700">
                            Filter
                        </button>
                    </form>

                    <a href="{{ route('transaction.create') }}"
                        class="px-4 py-2 text-sm text-blue-600 transition border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white">
                        <i class="mr-1 fa-solid fa-plus"></i> Add
                    </a>
                </div>
            </div>

            <div class="mt-4 overflow-x-auto">
                    <table class="w-full overflow-hidden text-sm border rounded-md">
                        <thead class="text-center text-gray-600 bg-gray-100">
                            <tr class="text-sm font-semibold">
                                <th class="px-2 py-3">Category</th>
                                <th>Notes</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Wallet</th>
                                <th>Date/Time</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-gray-700">
                            @foreach ($transaction as $item)
                                <tr class="border-t hover:bg-gray-100">
                                    <td class="py-2">{{ $item->category->name }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td class="font-semibold">₱ {{ $item->amount }}</td>
                                    <td class="capitalize">{{ $item->type }}</td>
                                    <td>{{ $item->wallet->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td><a href="{{ route('transaction.edit', $item->id) }}"><i
                                                class="text-blue-500 transition duration-150 cursor-pointer fa-solid fa-pen-to-square hover:text-blue-700"></i></a>
                                    </td>
                                    <td><button onclick="showModal({{ $item->id }})"><i
                                                class="text-red-500 transition duration-150 cursor-pointer fa-solid fa-trash hover:text-red-700"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
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
    </script>
</x-app-layout>
