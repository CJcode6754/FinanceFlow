@if ($message = Session::get('success') ?? Session::get('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition.opacity
        class="fixed z-50 top-4 right-12">
        <div
            class="max-w-sm w-[280px] bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 {{ Session::get('success') ? 'text-green-500' : 'text-red-500' }}"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            @if (Session::get('success'))
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            @endif
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">
                            {{ Session::get('success') ? 'Success' : 'Error' }}
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ $message }}
                        </p>
                    </div>
                    <div class="flex flex-shrink-0 ml-4">
                        <button @click="show = false"
                            class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 8.586L4.707 3.293A1 1 0 103.293 4.707L8.586 10l-5.293 5.293a1 1 0 101.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
