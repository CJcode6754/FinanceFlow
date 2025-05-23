<header class="px-4 py-4 mb-4 bg-white shadow md:px-8">
    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
        <div class="flex items-center w-full px-3 py-1 border border-gray-200 rounded-lg md:w-auto">
            <i class="text-gray-500 fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search..." class="w-full ml-2 text-sm border-none outline-none" />
        </div>
        <div class="relative flex items-center gap-4" id="profileDropdownWrapper">
            <i class="text-lg fa-regular fa-bell"></i>

            <div class="flex items-center gap-3 cursor-pointer" id="profileToggle">
                <i class="p-3 text-sm text-white bg-gray-500 rounded-full fa-solid fa-user"></i>
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-medium">Ceejay Ibabiosa</h3>
                    <i class="text-xs fa-solid fa-caret-down"></i>
                </div>
            </div>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu"
                class="absolute right-0 z-10 hidden w-40 mt-2 bg-white border border-gray-200 rounded-md shadow-lg top-12">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
