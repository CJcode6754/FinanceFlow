<x-app-layout title="Savings Transaction">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Savings Transaction</h1>

            <form action="{{route('savings.transaction.store')}}" method="POST" class="space-y-5">
                @csrf

                <input type="hidden" name="saving_id" value="{{$saving->id}}">
                <!-- Amount -->
                <div class="mb-4">
                    <label for="amount" class="label">Amount</label>
                    <input type="number" name="amount" id="amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('amount') border-red-400 @enderror"
                        value="{{ old('amount') }}" placeholder="e.g., 1000, 2000">
                    @error('amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Transaction Method -->
                <div class="mb-4">
                    <label for="transactionDropdown" class="label">Transaction Method</label>
                    <select id="transactionDropdown" name="transaction"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500">
                        <option value="">Select Type</option>
                            <option value="deposit" {{ old('transaction') == 'deposit' || request('method') == 'deposit' ? 'selected' : '' }}>
                                Deposit
                            </option>
                            <option value="withdraw" {{ old('transaction') == 'withdraw' || request('method') == 'withdraw' ? 'selected' : '' }}>
                                Withdraw
                            </option>
                    </select>
                    @error('transaction')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="note" class="label">Notes</label>
                    <input type="text" name="note" id="note"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('note') border-red-400 @enderror"
                        value="{{ old('note') }}" placeholder="Make this short">
                    @error('note')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Date --}}
                <div class="mb-4">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date') border-red-400 @enderror">
                    @error('date')
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
