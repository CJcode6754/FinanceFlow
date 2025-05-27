<x-app-layout title="Transactions">
    @if ($message = Session::get('success') ?? Session::get('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition.opacity
            class="fixed z-50 top-4 right-12">
            <div
                class="max-w-sm w-[280px] bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 {{ Session::get('success') ? 'text-green-500' : 'text-red-500' }}"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                @if (Session::get('success'))
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                @endif
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">
                                {{ Session::get('success') ? 'Success' : 'Error' }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $message }}
                            </p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="show = false"
                                class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 8.586L4.707 3.293A1 1 0 103.293 4.707L8.586 10l-5.293 5.293a1 1 0 101.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="px-4 py-2 md:py-8 md:px-16">
            <div class="flex flex-col items-center justify-center gap-4 py-6 md:flex-row md:justify-between md:gap-12">
                <h1 class="text-3xl font-bold">Transactions</h1>
                <div class="flex items-center gap-4">
                    <div class="">
                        <select id="categoryDropdown" name="type"
                            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500">
                            <option value="">Filter by Category</option>
                            <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Expense</option>
                            <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Income</option>
                        </select>
                        @error('type')
                            <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="date" name="" id="">
                    </div>

                    <button type="submit"
                        class="px-6 py-2 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-600 hover:text-white group"
                        title="Filter">
                        <p>Filter</p>
                    </button>
                    <a href="{{ route('transaction.create') }}"
                        class="px-6 py-2 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-600 hover:text-white group"
                        title="Add Category">
                        <i class="fa-solid fa-plus"></i>
                    </a>

                </div>
            </div>

            <div class="overflow-x-auto mt-4">
                <div class="overflow-x-auto flex items-center justify-center">
                    <table class="w-3/4 text-sm text-left">
                        <thead class="text-gray-500 border-b text-center">
                            <tr class="text-base font-semibold">
                                <th class="pb-2">Category</th>
                                <th>Notes</th>
                                <th>Amount</th>
                                <th>Wallet</th>
                                <th>Time</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-center">
                            @foreach ($transaction as $item)
                                <tr class="border-t">
                                    <td class="py-2">{{$item->category->name}}</td>
                                    <td>{{$item->note}}</td>
                                    <td class="font-semibold">₱{{$item->amount}}</td>
                                    <td class="capitalize">{{$item->type}}</td>
                                    <td>{{$item->wallet->name}}</td>
                                    <td>{{$item->date}}</td>
                                    <td><a href="{{$item->id}}"><i
                                                class="fa-solid fa-pen-to-square text-blue-500 hover:text-blue-700 cursor-pointer transition duration-150"></i></a>
                                    </td>
                                    <td><button onclick="showModal($item->id)"><i
                                                class="fa-solid fa-trash text-red-500 hover:text-red-700 cursor-pointer transition duration-150"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        {{-- Modal for Car deletion --}}
        <div id="modal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div id="modal-backdrop" class="fixed inset-0 bg-gray-500/75 opacity-0 transition-opacity duration-300"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="fixed inset-0 z-10 w-screen overflow-y-auto opacity-0 scale-95 transition duration-300 ease-out">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                    <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24"
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
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <form id="deleteForm" action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">Yes,
                                    Delete</button>
                            </form>
                            <button onclick="hideModal()" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(categoryID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `transaction/${categoryID}`;
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
