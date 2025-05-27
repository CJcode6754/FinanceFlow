<x-app-layout title="Create Category">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Create Your Own Transaction</h1>

            <form action="{{ route('transaction.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Category Dropdown -->
                <div class="mb-4">
                    <label for="categoryDropdown" class="label">Category</label>
                    <select id="categoryDropdown" name="category_id"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Note -->
                <div class="mb-4">
                    <label for="note" class="label">Notes</label>
                    <input type="text" name="note" id="note"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('note') border-red-400 @enderror"
                        value="{{ old('note') }}" placeholder="e.g., Buy Pizza, Grocery">
                    @error('note')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="typeDropdown" class="label">Type</label>
                    <select id="typeDropdown" name="type"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Type</option>
                        <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>income</option>
                        <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>expense</option>
                        <option value="transfer" {{ old('type') == 'transfer' ? 'selected' : '' }}>transfer</option>
                    </select>
                    @error('type')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- amount -->
                <div class="mb-4">
                    <label for="amount" class="label">Amount</label>
                    <input type="number" name="amount" id="amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('amount') border-red-400 @enderror"
                        value="{{ old('amount') }}" placeholder="e.g., 1000.00, 2000.00">
                    @error('amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Wallter -->
                <div class="mb-4">
                    <label for="walletDropdown" class="label">Wallet</label>
                    <select id="walletDropdown" name="wallet_id"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Wallet</option>
                        @foreach ($wallet as $item)
                            <option value="{{ $item->id }}" {{ old('wallet') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('wallet')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date') border-red-400 @enderror">

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
