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
                    <div>
                        <select name="status_filter"
                            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="'all_goals'" {{ old('status_filter') == 'all_goals' ? 'selected' : '' }}>
                                All Goals
                            </option>
                            <option value="'active'" {{ old('status_filter') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="'completed'" {{ old('status_filter') == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>

                    <div>
                        <select name="sort"
                            class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="sort_by_date" {{ old('sort') == 'sort_by_date' ? 'selected' : '' }}>
                                Sort by Date
                            </option>
                            <option value="sort_by_amount" {{ old('sort') == 'sort_by_amount' ? 'selected' : '' }}>
                                Sort by Amount
                            </option>
                            <option value="sort_by_progress" {{ old('sort') == 'sort_by_progress' ? 'selected' : '' }}>
                                Sort by Progress
                            </option>
                            <option value="sort_by_target" {{ old('sort') == 'sort_by_target' ? 'selected' : '' }}>
                                Sort by Target
                            </option>
                        </select>
                    </div>

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
                        <h2 class="text-xl font-bold text-gray-600">PHP 20,000</h2>
                        <p class="text-sm font-medium text-gray-400">Total Saved</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">PHP 30,000</h2>
                        <p class="text-sm font-medium text-gray-400">Total Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">3</h2>
                        <p class="text-sm font-medium text-gray-400">Active Goals</p>
                    </div>

                    <div class="p-8 text-center bg-white rounded-lg shadow">
                        <h2 class="text-xl font-bold text-gray-600">50%</h2>
                        <p class="text-sm font-medium text-gray-400">Avg Progress</p>
                    </div>
                </div>
            </section>

            <section class="py-4">
                <h1 class="mb-6 text-2xl font-bold">Saving Goals</h1>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($savings as $saving)
                        <div class="relative w-full max-w-sm p-6 space-y-5 bg-white shadow-md rounded-2xl">
                            <!-- Icon -->
                            <div class="flex items-center justify-center">
                                <i
                                    class="p-4 text-2xl shadow-sm {{ $saving->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i>
                            </div>

                            <div class="absolute flex gap-2 top-3 right-4">
                                <a href="{{ route('savings.edit', $saving->id) }}"
                                    class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button onclick="showModal({{ $saving->id }})"
                                    class="p-2 text-white transition bg-red-500 rounded-lg cursor-pointer hover:bg-red-600">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                            <!-- Title and Target -->
                            <div class="text-center">
                                <h2 class="text-xl font-semibold">{{ $saving->name }}</h2>
                                <p class="text-gray-500">Target: PHP {{ number_format($saving->target_amount, 2) }}</p>
                            </div>

                            @if ($saving->note)
                                <p class="text-sm italic text-center text-gray-600">
                                    "{{ $saving->note }}"
                                </p>
                            @endif

                            <!-- Progress -->
                            <div class="space-y-1">
                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <p>PHP {{ number_format($saving->current_amount, 2) }}</p>
                                    <p>of PHP {{ number_format($saving->target_amount) }}</p>
                                </div>

                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <p>{{$saving->process_percent}}%</p>
                                    <p>PHP {{number_format($saving->target_amount - $saving->current_amount, 2)}} to go</p>
                                </div>
                                <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                                    <div class="h-full transition-all duration-300 rounded-full bg-emerald-500"
                                        style="width: {{$saving->process_percent}}%"></div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col justify-center gap-4 lg:flex-row">
                                <a href="#"
                                    class="w-full py-3 font-medium text-center text-white transition-all bg-emerald-500 hover:bg-emerald-600 lg:w-1/2 rounded-xl"><i
                                        class="mr-2 fa-solid fa-sack-dollar"></i>Deposit</a>
                                <a href="#"
                                    class="w-full py-3 font-medium text-center transition-all bg-gray-100 hover:bg-gray-400 hover:text-white lg:w-1/2 rounded-xl">
                                    <i class="mr-2 fa-solid fa-money-bill-wave"></i>Withdraw
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="py-4">
                <div class="p-8 bg-white shadow rounded-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-600">Recent Activity</h2>
                        <a href="" class="text-base font-semibold text-gray-400">View All</a>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full overflow-hidden text-sm border rounded-md">
                            <thead class="text-center text-gray-600 bg-gray-100">
                                <tr class="text-sm font-semibold">
                                    <td class="px-4 py-4">Type</td>
                                    <td>Saving Goals Name</td>
                                    <td>Date and Time</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody class="text-center text-gray-700">
                                <tr class="font-medium border-t hover:bg-gray-50">
                                    <td class="px-4 py-4"><i
                                            class="p-2 mr-2 text-white bg-green-400 rounded-lg fa-solid fa-plus"></i>
                                        Deposit
                                    </td>
                                    <td>Trip to Japan</td>
                                    <td>Today, 2:00PM</td>
                                    <td class="text-green-500"><i class="mr-2 fa-solid fa-plus"></i> PHP 500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
