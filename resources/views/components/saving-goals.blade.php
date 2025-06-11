<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($savings as $saving)
        <div class="relative w-full max-w-sm p-6 space-y-5 bg-white shadow transition dark:bg-gray-800 hover:shadow-xl dark:shadow-gray-900/20 dark:hover:shadow-gray-900/40 rounded-2xl">
            <!-- Icon -->
            <div class="flex items-center justify-center">
                <i class="p-4 text-2xl shadow-sm {{ $saving->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i>
            </div>

            <div class="absolute flex gap-2 top-3 right-4">
                <a href="{{ route('savings.edit', $saving->id) }}"
                    class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button onclick="showModal({{ $saving->id }})"
                    class="p-2 text-white transition bg-red-500 rounded-lg cursor-pointer hover:bg-red-600">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>

            <!-- Title and Target -->
            <div class="text-center">
                <h2 class="text-xl font-semibold dark:text-white">{{ $saving->name }}</h2>
                <p class="text-gray-500 dark:text-gray-300">Target: ₱ {{ number_format($saving->target_amount, 2) }}</p>
            </div>

            @if ($saving->note)
                <p class="text-sm italic text-center text-gray-600 dark:text-gray-300">
                    "{{ $saving->note }}"
                </p>
            @endif

            <!-- Progress -->
            <div class="space-y-1">
                <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-300">
                    <p>₱ {{ number_format($saving->current_amount, 2) }}</p>
                    <p>of ₱ {{ number_format($saving->target_amount) }}</p>
                </div>

                <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-300">
                    <p>{{ $saving->process_percent }}%</p>
                    <p>₱ {{ number_format($saving->target_amount - $saving->current_amount, 2) }} to
                        go</p>
                </div>
                <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                    <div class="h-full transition-all duration-300 rounded-full bg-emerald-500"
                        style="width: {{ $saving->process_percent }}%"></div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col justify-center gap-4 lg:flex-row">
                <a href="{{ route('savings.transaction', [$saving->id, 'method' => 'deposit']) }}"
                    class="w-full py-3 font-medium text-center text-white transition-all bg-emerald-500 hover:bg-emerald-600 lg:w-1/2 rounded-xl"><i
                        class="mr-2 fa-solid fa-sack-dollar"></i>Deposit</a>
                <a href="{{ route('savings.transaction', [$saving->id, 'method' => 'withdraw']) }}"
                    class="w-full py-3 font-medium text-center transition-all bg-gray-100 dark:text-gray-600 hover:bg-gray-400 hover:text-white lg:w-1/2 rounded-xl">
                    <i class="mr-2 fa-solid fa-money-bill-wave"></i>Withdraw
                </a>
            </div>
        </div>
    @endforeach
</div>
