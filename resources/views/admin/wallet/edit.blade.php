<x-app-layout title="Create Wallet">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Create Your Own Wallet</h1>

            <form action="{{ route('wallet.update', $wallet->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PATCH')
                <!-- Note -->
                <div class="mb-4">
                    <label for="name" class="label">Wallet Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @enderror"
                        value="{{ old('name', $wallet->name) }}" placeholder="e.g., GCash, Cash on Hand">
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label for="typeDropdown" class="label">Type</label>
                    <select id="typeDropdown" name="type"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Type</option>
                        <option value="bank" {{ old('type', $wallet->type) == 'bank' ? 'selected' : '' }}>Bank</option>
                        <option value="cash" {{ old('type', $wallet->type) == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="e-wallet" {{ old('type', $wallet->type) == 'e-wallet' ? 'selected' : '' }}>E-wallet</option>
                    </select>
                    @error('type')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- amount -->
                <div class="mb-4">
                    <label for="amount" class="label">Balance</label>
                    <input type="number" name="balance" id="balance"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('balance') border-red-400 @enderror"
                        value="{{ old('balance', $wallet->balance) }}" placeholder="e.g., 1000, 2000">
                    @error('balance')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 text-white transition-all duration-200 bg-blue-500 rounded-lg cursor-pointer hover:bg-blue-600">
                    Save
                </button>
            </form>
        </main>

    </div>
</x-app-layout>
