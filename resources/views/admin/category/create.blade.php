<x-app-layout title="Create Category">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Create Your Own Category</h1>

            <form action="{{ route('category.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf

                <!-- Category Name -->
                <div class="mb-4">
                    <label for="name" class="label">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @enderror"
                        value="{{ old('name') }}" placeholder="e.g., Groceries, Utilities">
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type Dropdown -->
                <div class="mb-4">
                    <label for="typeDropdown" class="label">Type</label>
                    <select id="typeDropdown" name="type"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Type</option>
                        <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Expense</option>
                        <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Income</option>
                    </select>
                    @error('type')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-300">Category Type Image</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload one image related to category name (PNG, JPG, JPEG)</p>

                    <div class="mt-3">
                        <label for="categoryFormImageUpload" class="block w-full cursor-pointer">
                            <div
                                class="flex flex-col items-center justify-center px-6 py-4 mt-2 transition duration-150 border-2 border-gray-300 border-dashed rounded-lg dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 group">
                                <div class="flex flex-col items-center space-y-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-10 h-10 text-gray-400 group-hover:text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    <div class="text-center">
                                        <span class="font-medium text-blue-600 hover:text-blue-700 dark:text-gray-300">Click to
                                            upload</span>
                                        <span class="text-gray-500 dark:text-gray-300"> or drag and drop</span>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Select one image
                                    </p>
                                </div>
                            </div>
                        </label>
                        <input id="categoryFormImageUpload" type="file" name="image"
                             class="hidden"
                            @error('image') aria-invalid="true" @enderror onchange="previewImage(event)" />

                        @error('image')
                            <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Preview Area (initially hidden, shown with JS) --}}
                    <div id="imagePreviewArea" class="hidden mt-4">
                        <h4 class="mb-2 text-sm font-medium text-gray-700">Selected Images</h4>
                        <div id="imagePreviewGrid" class="grid grid-cols-3 gap-3"></div>
                    </div>

                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 text-white transition-all duration-200 bg-blue-500 rounded-lg hover:bg-blue-600">
                    Save
                </button>
            </form>
        </main>

    </div>

    <script>
        function previewImage(event) {
            const files = event.target.files;
            const previewArea = document.getElementById('imagePreviewArea');
            const previewGrid = document.getElementById('imagePreviewGrid');

            // Clear previous previews
            previewGrid.innerHTML = '';

            if (files.length > 0) {
                previewArea.classList.remove('hidden');

                Array.from(files).forEach(file => {
                    if (!file.type.startsWith('image/')) return;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-32 object-cover rounded-lg border';

                        const container = document.createElement('div');
                        container.appendChild(img);

                        previewGrid.appendChild(container);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                previewArea.classList.add('hidden');
            }
        }
    </script>

</x-app-layout>
