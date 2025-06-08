<header class="hidden px-4 py-4 mb-4 transition-colors duration-300 bg-white shadow dark:bg-gray-800 dark:shadow-none md:block md:px-8">
    <div class="flex flex-col items-center justify-end gap-4 md:flex-row">
        <div class="relative flex items-center gap-4" id="profileDropdownWrapper">
            {{-- Dark Mode Toggle --}}
            <button onclick="toggleDarkMode()" id="darkModeToggle"
                class="p-2 transition-colors duration-200 bg-gray-200 rounded-lg dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600"
                title="Toggle Dark Mode">
                <i id="sunIcon" class="hidden text-yellow-500 fas fa-sun"></i>
                <i id="moonIcon" class="text-blue-400 fas fa-moon"></i>
            </button>

            <div class="flex items-center gap-3 cursor-pointer" id="profileToggle">
                <i class="p-3 text-sm text-white bg-gray-500 rounded-full dark:bg-gray-600 fa-solid fa-user"></i>
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</h3>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileToggle = document.getElementById('profileToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        profileToggle.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!document.getElementById('profileDropdownWrapper').contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
