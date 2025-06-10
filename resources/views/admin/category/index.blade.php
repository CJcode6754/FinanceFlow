<x-app-layout title="Categories">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-2 sm:px-6 lg:px-16 md:py-8">
            <div class="flex flex-col gap-4 py-6 lg:flex-row lg:items-center lg:justify-between">
                <h1
                    class="text-xl font-bold text-center text-gray-900 sm:text-2xl lg:text-3xl lg:text-left dark:text-gray-100">
                    Categories</h1>

                <div class="flex flex-wrap justify-center gap-2 lg:justify-end">
                    <a class="px-4 py-2 rounded-lg transition text-sm sm:text-base {{ request('type') === 'expense' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-500 dark:hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'expense']) }}">Expense</a>

                    <a class="px-4 py-2 rounded-lg transition text-sm sm:text-base {{ request('type') === 'income' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white dark:border-blue-400 dark:text-blue-400 dark:hover:bg-blue-500 dark:hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'income']) }}">Income</a>

                    <a class="px-4 py-2 text-sm text-gray-600 transition-colors border border-gray-500 rounded-lg dark:border-gray-400 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 sm:text-base"
                        href="{{ route('category.index') }}">All</a>

                    <a href="{{ route('category.create') }}"
                        class="px-4 py-2 text-sm transition-colors border border-blue-500 rounded-lg dark:border-blue-400 hover:bg-blue-600 hover:text-white dark:text-blue-400 dark:hover:bg-blue-500 dark:hover:text-white group sm:text-base"
                        title="Add Category">
                        <i class="fa-solid fa-plus mr-2"></i>Add
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                @forelse ($categories as $category)
                    <div
                        class="flex flex-col items-center justify-between gap-4 px-4 py-4 transition bg-white rounded-lg shadow sm:flex-row dark:bg-gray-800 hover:shadow-xl dark:shadow-gray-900/20 dark:hover:shadow-gray-900/40">
                        <div class="flex items-center gap-4 text-center sm:text-left">
                            <div class="w-16 h-16 rounded-full"> <i class="p-4 text-2xl shadow-sm {{ $category->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i> </div>
                            <h2 class="text-base font-semibold text-gray-900 break-words sm:text-lg dark:text-gray-100">
                                {{ $category->name }}</h2>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('category.edit', $category->id) }}">
                                <i
                                    class="text-blue-500 transition-colors fa-solid fa-pen-to-square dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300"></i>
                            </a>
                            <button onclick="showModal({{ $category->id }})">
                                <i
                                    class="text-red-500 transition-colors fa-solid fa-trash dark:text-red-400 hover:text-red-700 dark:hover:text-red-300"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 col-span-4">
                        <p class="text-gray-500 dark:text-gray-400 mb-4">No category available yet.</p>
                        <a href="{{ route('category.create') }}"
                            class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Create Your First Category
                        </a>
                    </div>
                @endforelse
            </div>
        </main>

        {{-- Modal for Category Deletion --}}
        <div id="modal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" id="modal-title">
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
        function showModal(categoryID) {
            const modal = document.getElementById('modal');
            const backdrop = document.getElementById('modal-backdrop');
            const wrapper = document.getElementById('modal-wrapper');
            const form = document.getElementById('deleteForm');

            form.action = `category/${categoryID}`;
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
