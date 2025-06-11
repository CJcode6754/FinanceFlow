<x-app-layout title="Create Savings">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="w-full px-8 py-6 mx-auto mt-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 md:w-1/2 md:px-8">
            <h1 class="mb-6 text-2xl font-bold text-center">Setup budget per category</h1>

            <form action="{{ route('savings.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Savings Name -->
                <div class="mb-4">
                    <label for="name" class="label">Savings Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('name') border-red-400 @enderror"
                        value="{{ old('name') }}" placeholder="e.g., Trip to Abroad, Medicine">
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $icons = [
                        'fa-solid fa-piggy-bank' => 'Piggy Bank',
                        'fa-solid fa-wallet' => 'Wallet',
                        'fa-solid fa-money-bill-wave' => 'Money Bill Wave',
                        'fa-solid fa-coins' => 'Coins',
                        'fa-solid fa-dollar-sign' => 'Dollar Sign',
                        'fa-solid fa-landmark' => 'Bank',
                        'fa-solid fa-plane' => 'Travel',
                        'fa-solid fa-suitcase-rolling' => 'Vacation',
                        'fa-solid fa-house' => 'House',
                        'fa-solid fa-car' => 'Car',
                        'fa-solid fa-graduation-cap' => 'Education',
                        'fa-solid fa-briefcase' => 'Business',
                        'fa-solid fa-stethoscope' => 'Medical',
                        'fa-solid fa-ring' => 'Wedding',
                        'fa-solid fa-gamepad' => 'Gaming',
                        'fa-solid fa-gift' => 'Gift',
                        'fa-solid fa-heart' => 'Self-care',
                        'fa-solid fa-star' => 'Wish',
                        'fa-solid fa-music' => 'Music',
                        'fa-solid fa-camera' => 'Photography',
                        'fa-solid fa-bag-shopping' => 'Shopping',
                    ];
                @endphp

                <!-- Icon -->
                <div class="mb-4">
                    <label for="iconDropdown" class="label">Icon</label>
                    <select id="iconDropdown" name="icon"
                        class="w-full px-4 py-3 text-sm text-gray-700 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-emerald-500">
                        <option value="">Select Icon</option>
                        @foreach ($icons as $class => $label)
                            <option value="{{ $class }}" {{ old('icon') == $class ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('icon')
                        <span class="mt-1 text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Target Amount -->
                <div class="mb-4">
                    <label for="target_amount" class="label">Target Amount</label>
                    <input type="number" name="target_amount" id="target_amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('target_amount') border-red-400 @enderror"
                        value="{{ old('target_amount') }}" placeholder="e.g., 1000, 2000">
                    @error('target_amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Amount -->
                <div class="mb-4">
                    <label for="current_amount" class="label">Current Amount</label>
                    <input type="number" name="current_amount" id="current_amount"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('current_amount') border-red-400 @enderror"
                        value="{{ old('current_amount', 0) }}" placeholder="Default is 0">
                    @error('current_amount')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label for="note" class="label">Notes</label>
                    <input type="text" name="note" id="note"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('note') border-red-400 @enderror"
                        value="{{ old('note') }}" placeholder="Make this short">
                    @error('note')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deadline --}}
                <div class="mb-4">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                        class="w-full px-4 py-3 border rounded-lg text-sm dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('deadline') border-red-400 @enderror">
                    @error('deadline')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 text-white transition-all duration-200 bg-emerald-500 rounded-lg hover:bg-emerald-600">
                    Save
                </button>
            </form>
        </main>

    </div>
</x-app-layout>
