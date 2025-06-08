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
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-center lg:text-left">Categories</h1>

                <div class="flex flex-wrap justify-center lg:justify-end gap-2">
                    <a class="px-4 py-2 rounded-lg transition text-sm sm:text-base {{ request('type') === 'expense' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'expense']) }}">Expense</a>

                    <a class="px-4 py-2 rounded-lg transition text-sm sm:text-base {{ request('type') === 'income' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'income']) }}">Income</a>

                    <a class="px-4 py-2 border border-gray-500 text-gray-600 rounded-lg hover:bg-gray-100 text-sm sm:text-base"
                        href="{{ route('category.index') }}">All</a>

                    <a href="{{ route('category.create') }}"
                        class="px-4 py-2 border border-blue-500 rounded-lg hover:bg-blue-600 hover:text-white group text-sm sm:text-base"
                        title="Add Category">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($categories as $category)
                    <div
                        class="flex flex-col sm:flex-row items-center justify-between gap-4 px-4 py-4 transition bg-white rounded-lg shadow hover:shadow-xl">
                        <div class="flex items-center gap-4 text-center sm:text-left">
                            <img class="rounded-full w-16 h-16 object-cover"
                                src="{{ asset('storage/' . ($category->image ?? 'category_image/default.png')) }}"
                                alt="Category Image">
                            <h2 class="text-base sm:text-lg font-semibold break-words">{{ $category->name }}</h2>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('category.edit', $category->id) }}">
                                <i class="fa-solid fa-pen-to-square text-blue-500 hover:text-blue-700 transition"></i>
                            </a>
                            <button onclick="showModal({{ $category->id }})">
                                <i class="fa-solid fa-trash text-red-500 hover:text-red-700 transition"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>


        {{-- Modal for Category Deletion --}}
        <div id="modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div id="modal-backdrop" class="fixed inset-0 bg-gray-300 bg-opacity-50 transition-opacity duration-300"
                aria-hidden="true"></div>

            <div id="modal-wrapper"
                class="flex items-center justify-center min-h-screen px-4 py-6 sm:p-0 transition-all duration-300">
                <div
                    class="relative bg-white rounded-lg shadow-xl w-full max-w-md sm:max-w-lg transform opacity-100 scale-100">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 bg-red-100 text-red-600 rounded-full p-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Delete Category</h3>
                        </div>

                        <p class="mt-4 text-sm text-gray-600">
                            Are you sure you want to delete this category? This action cannot be undone.
                        </p>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 flex flex-col sm:flex-row sm:justify-end gap-3">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full sm:w-auto bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-md shadow-sm transition">
                                Yes, Delete
                            </button>
                        </form>
                        <button onclick="hideModal()" type="button"
                            class="w-full sm:w-auto border border-gray-300 text-gray-700 hover:bg-gray-100 py-2 px-4 rounded-md transition">
                            Cancel
                        </button>
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
    </script>
</x-app-layout>
