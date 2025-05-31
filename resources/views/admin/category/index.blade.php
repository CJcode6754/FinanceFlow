<x-app-layout title="Categories">
    {{-- Toast Component --}}
    <x-toast />

    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        {{-- Main Content --}}
        <main class="px-4 py-2 md:py-8 md:px-16">
            <div class="flex flex-col items-center justify-center gap-4 py-6 md:flex-row md:justify-between md:gap-12">
                <h1 class="text-3xl font-bold">Categories</h1>
                <div class="flex items-center gap-4">
                    <a class="px-4 py-2 rounded-lg transition {{ request('type') === 'expense' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'expense']) }}">Expense</a>

                    <a class="px-4 py-2 rounded-lg transition {{ request('type') === 'income' ? 'bg-blue-500 text-white' : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' }}"
                        href="{{ route('category.index', ['type' => 'income']) }}">Income</a>

                    <a class="px-4 py-2 border border-gray-500 text-gray-600 rounded-lg hover:bg-gray-100"
                        href="{{ route('category.index') }}">All</a>

                    <a href="{{ route('category.create') }}"
                        class="px-6 py-2 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-600 hover:text-white group"
                        title="Add Category">
                        <i class="fa-solid fa-plus"></i>
                    </a>

                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($categories as $category)
                    <div
                        class="flex items-center justify-between w-full gap-4 px-6 py-4 transition bg-white rounded-lg shadow-lg hover:shadow-xl">
                        <div class="flex items-center gap-4">
                            <img class="rounded-full w-15 h-15 object-cover"
                                src="{{ asset('storage/' . $category->image ?? 'storage/category_image/default.png') }}"
                                alt="Category Image">
                            <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('category.edit', $category->id) }}"><i
                                    class="fa-solid fa-pen-to-square text-blue-500 hover:text-blue-700 cursor-pointer transition duration-150"></i></a>
                            <button onclick="showModal({{ $category->id }})"><i
                                    class="fa-solid fa-trash text-red-500 hover:text-red-700 cursor-pointer transition duration-150"></i></button>
                        </div>
                    </div>
                @endforeach
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
