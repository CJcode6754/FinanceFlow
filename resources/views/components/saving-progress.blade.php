<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    @forelse ($savings as $saving)
        <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 rounded-lg bg-emerald-500">
                        <i class="p-2 shadow-sm {{ $saving->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $saving->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ number_format($saving->target_amount - $saving->current_amount, 2) }} remaining</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ number_format($saving->process_percent, 2) }}%</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Complete</p>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300">Current</span>
                    <span
                        class="font-medium text-gray-900 dark:text-gray-300">₱{{ number_format($saving->current_amount, 2) }}</span>
                </div>
                <div class="w-full h-3 bg-gray-200 rounded-full">
                    <div class="h-3 rounded-full bg-emerald-500" style="width: {{ $saving->process_percent }}%"></div>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-300">Target</span>
                    <span
                        class="font-medium text-gray-900 dark:text-gray-300">₱{{ number_format($saving->target_amount, 2) }}</span>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-20 w-full col-span-2">
            <p class="text-gray-500 dark:text-gray-400 mb-4">No savings available yet.</p>
            <a href="{{ route('savings.create') }}"
                class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg">
                Create Your First Savings
            </a>
        </div>
    @endforelse
</div>
