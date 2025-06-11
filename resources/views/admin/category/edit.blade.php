<x-app-layout title="Create Category">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Edit Your Own Category</h1>

            <form action="{{route('category.update', $category->id)}}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf

                @method('PATCH')
                <!-- Category Name -->
                <div class="mb-4">
                    <label for="name" class="label">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700  focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @enderror"
                        value="{{ old('name', $category->name) }}" placeholder="e.g., Groceries, Utilities">
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
                        <option value="expense" {{ old('type', $category->type) == 'expense' ? 'selected' : '' }}>
                            Expense</option>
                        <option value="income" {{ old('type', $category->type) == 'income' ? 'selected' : '' }}>Income
                        </option>
                    </select>
                    @error('type')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="currentImage">Current Icon</label>
                    @if ($category->icon)
                        <div class="w-16 h-16 rounded-full mt-2"> <i class="p-4 text-2xl shadow-sm {{ $category->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i> </div>
                    @endif
                </div>
                @php
                    $icons = [
                        'fa-solid fa-bag-shopping' => 'Shopping',
                        'fa-solid fa-utensils' => 'Food & Drinks',
                        'fa-solid fa-car' => 'Transportation',
                        'fa-solid fa-house' => 'Housing',
                        'fa-solid fa-stethoscope' => 'Healthcare',
                        'fa-solid fa-gamepad' => 'Entertainment',
                        'fa-solid fa-gift' => 'Gifts & Donations',
                        'fa-solid fa-graduation-cap' => 'Education',
                        'fa-solid fa-suitcase-rolling' => 'Vacation',
                        'fa-solid fa-plane' => 'Travel',
                        'fa-solid fa-heart' => 'Self-care',
                        'fa-solid fa-bolt' => 'Utilities',
                        'fa-solid fa-paw' => 'Pets',
                        'fa-solid fa-tshirt' => 'Clothing',
                        'fa-solid fa-wrench' => 'Repairs',
                        'fa-solid fa-ring' => 'Wedding',
                        'fa-solid fa-wallet' => 'Salary',
                        'fa-solid fa-coins' => 'Freelance',
                        'fa-solid fa-dollar-sign' => 'Investments',
                        'fa-solid fa-piggy-bank' => 'Savings',
                        'fa-solid fa-briefcase' => 'Business',
                        'fa-solid fa-landmark' => 'Bank Interest',
                        'fa-solid fa-star' => 'Bonus',
                        'fa-solid fa-hand-holding-dollar' => 'Rental Income',
                    ];
                @endphp

                <!-- Icon -->
                <div class="mb-4">
                    <label for="iconDropdown" class="label">Icon</label>
                    <select id="iconDropdown" name="icon"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-emerald-500">
                        <option value="">Select Icon</option>
                        @foreach ($icons as $class => $label)
                            <option value="{{ $class }}" {{ old('icon', $category->icon) == $class ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('icon')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
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
