<header
    class="hidden px-4 py-4 mb-4 transition-colors duration-300 bg-white shadow dark:bg-gray-800 dark:shadow-none md:block md:px-8">
    <div class="flex flex-col items-center justify-end gap-4 md:flex-row">
        <div class="relative flex items-center gap-4" id="profileDropdownWrapper">
            <div class="flex items-center gap-3 cursor-pointer" id="profileToggle">
                @if (auth()->user()->profile)
                    <img src="{{ asset('storage/' . auth()->user()->profile) }}" alt="{{ auth()->user()->name }}"
                        class="w-10 h-10 object-cover bg-gray-500 rounded-full dark:bg-gray-600">
                @else
                    <i class="p-3 text-sm text-white bg-gray-500 rounded-full dark:bg-gray-600 fa-solid fa-user"></i>
                @endif
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</h3>
                    <i class="text-xs text-gray-700 fa-solid fa-caret-down dark:text-gray-300"></i>
                </div>
            </div>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu"
                class="absolute right-0 z-10 hidden w-40 mt-2 bg-white border border-gray-200 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-600 top-12">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 transition-colors dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
