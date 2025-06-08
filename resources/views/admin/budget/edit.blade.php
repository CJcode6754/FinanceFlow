<x-app-layout title="Create Category">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Setup budget per category</h1>

            <form action="{{ route('budget.update', $budget->id) }}" method="POST" class="space-y-5">
                @csrf

                @method('PATCH')
                <!-- Category Dropdown -->
                <div class="mb-4">
                    <label for="categoryDropdown" class="label">Category</label>
                    <select id="categoryDropdown" name="category_id"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-blue-500">
                        <option value="">Select category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id', $budget->category->name) == $item->name ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- amount -->
                <div class="mb-4">
                    <label for="amount" class="label">Amount</label>
                    <input type="number" name="amount" id="amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 @error('amount') border-red-400 @enderror"
                        value="{{ old('amount', $budget->amount) }}" placeholder="e.g., 1000.00, 2000.00">
                    @error('amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($budget->start_date)->format('Y-m-d')) }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 @error('start_date') border-red-400 @enderror">
                    @error('start_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($budget->end_date)->format('Y-m-d')) }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 @error('end_date') border-red-400 @enderror">
                    @error('end_date')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
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
</x-app-layout>
