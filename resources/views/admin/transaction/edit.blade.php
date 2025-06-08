<x-app-layout title="Create Category">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Create Your Own Transaction</h1>

            <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" class="space-y-5">
                @csrf

                @method('PATCH')
                <!-- Category Dropdown -->
                <div class="mb-4">
                    <label for="categoryDropdown" class="label">Category</label>
                    <select id="categoryDropdown" name="category_id"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $transaction->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
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
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 @error('note') border-red-400 @enderror"
                        value="{{ old('note', $transaction->note) }}" placeholder="e.g., Buy Pizza, Grocery">
                    @error('note')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="typeDropdown" class="label">Type</label>
                    <select id="typeDropdown" name="type"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Type</option>
                        <option value="income" {{ old('type', $transaction->type) == 'income' ? 'selected' : '' }}>Income</option>
                        <option value="expense" {{ old('type', $transaction->type) == 'expense' ? 'selected' : '' }}>Expense</option>
                        <option value="transfer" {{ old('type', $transaction->type) == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    </select>
                    @error('type')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- amount -->
                <div class="mb-4">
                    <label for="amount" class="label">Amount</label>
                    <input type="number" name="amount" id="amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 @error('amount') border-red-400 @enderror"
                        value="{{ old('amount', $transaction->amount) }}" placeholder="e.g., 1000.00, 2000.00">
                    @error('amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Wallter -->
                <div class="mb-4">
                    <label for="walletDropdown" class="label">Wallet</label>
                    <select id="walletDropdown" name="wallet_id"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Wallet</option>
                        @foreach ($wallets as $wallet)
                            <option value="{{ $wallet->id }}" {{ old('wallet_id', $transaction->wallet_id) == $wallet->id ? 'selected' : '' }}>
                                {{ $wallet->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('wallet')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date', \Carbon\Carbon::parse($transaction->date)->format('Y-m-d')) }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none dark:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 @error('date') border-red-400 @enderror">

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
