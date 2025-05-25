<x-app-layout title="Categories">
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

    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="px-4 py-2 md:py-8 md:px-16">
            <div class="flex flex-col items-center justify-center gap-4 py-6 md:flex-row md:justify-between md:gap-12">
                <h1 class="text-3xl font-bold">Categories</h1>
                <div class="flex items-center gap-4">
                    <a class="px-4 py-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600"
                        href="">Expense</a>
                    <a class="px-4 py-2 text-blue-500 transition border border-blue-500 rounded-lg hover:bg-blue-500 hover:text-white"
                        href="">Income</a>
                    <a href="{{ route('category.create') }}"
                        class="px-6 py-2 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-600 hover:text-white group"
                        title="Add Category">
                        <i class="fa-solid fa-plus"></i>
                    </a>

                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($categories as $category)
                    <div
                        class="flex items-center w-full gap-4 px-6 py-4 transition bg-white rounded-lg shadow-lg hover:shadow-xl">
                        <img class="rounded-full w-15" src="{{ asset('storage/' . $category->image) }}" alt="Category Image">
                        <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>
