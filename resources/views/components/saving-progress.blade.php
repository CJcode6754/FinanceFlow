<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @foreach ($savings as $saving)
        <div class="bg-gray-50 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-emerald-500 rounded-lg">
                        <i class="p-2 shadow-sm {{ $saving->icon }} bg-emerald-100 text-emerald-600 rounded-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $saving->name }}</h3>
                        <p class="text-sm text-gray-600">{{ number_format($saving->target_amount - $saving->current_amount, 2) }} remaining</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-gray-900">{{ number_format($saving->process_percent, 2) }}%</p>
                    <p class="text-sm text-gray-600">Complete</p>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Current</span>
                    <span class="font-medium text-gray-900">₱{{number_format($saving->current_amount, 2)}}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-emerald-500 h-3 rounded-full" style="width: {{ $saving->process_percent }}%"></div>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Target</span>
                    <span class="font-medium text-gray-900">₱{{number_format($saving->target_amount, 2)}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
