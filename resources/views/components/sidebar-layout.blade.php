<button id="hamburger-button" aria-controls="default-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 dark:text-gray-400 rounded-lg ms-3 md:hidden hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600 transition-colors">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
    aria-label="Sidebar">
    <div class="flex flex-col justify-between h-full px-3 overflow-y-auto bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
        <div>
            <div class="flex justify-center items-center py-4">
                <img class="w-22" src="{{ asset('assets/logo.png') }}" alt="Logo">
                <span class="tracking-wide text-lg font-semibold">Finance Flow</span>
            </div>

            {{-- Dark Mode Toggle for Mobile --}}
            <div class="flex justify-center mb-4 md:hidden">
                <button 
                    onclick="toggleDarkMode()" 
                    class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200"
                    title="Toggle Dark Mode"
                >
                    <i id="sunIconMobile" class="fas fa-sun text-yellow-500 hidden"></i>
                    <i id="moonIconMobile" class="fas fa-moon text-blue-400"></i>
                </button>
            </div>

            <ul class="space-y-3 font-medium">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->is('/')">
                    <x-slot name="icon"><i class="fa-solid fa-house"></i></x-slot>
                    Dashboard
                </x-nav-link>

                <x-nav-link href="{{ route('wallet.index') }}" :active="request()->is('wallet')">
                    <x-slot:icon><i class="fa-solid fa-wallet"></i></x-slot:icon>
                    Wallet
                </x-nav-link>

                <x-nav-link href="{{ route('transaction.index') }}" :active="request()->is('transaction')">
                    <x-slot:icon><i class="fa-solid fa-right-left"></i></x-slot:icon>
                    Transaction
                </x-nav-link>

                <x-nav-link href="{{ route('category.index') }}" :active="request()->is('category')">
                    <x-slot:icon><i class="fa-solid fa-tags"></i></x-slot:icon>
                    Category
                </x-nav-link>

                <x-nav-link href="{{ route('budget.index') }}" :active="request()->is('budget')">
                    <x-slot:icon><i class="fa-solid fa-scale-balanced"></i></x-slot:icon>
                    Budget
                </x-nav-link>

                <x-nav-link href="{{ route('savings.index') }}" :active="request()->is('savings')">
                    <x-slot:icon><i class="fa-solid fa-bullseye"></i></x-slot:icon>
                    Savings
                </x-nav-link>

                <x-nav-link href="{{ route('analytics') }}" :active="request()->is('analytics')">
                    <x-slot:icon><i class="fa-solid fa-chart-line"></i></x-slot:icon>
                    Analytics
                </x-nav-link>

                <x-nav-link href="{{ route('setting') }}" :active="request()->is('setting')">
                    <x-slot:icon><i class="fa-solid fa-gear"></i></x-slot:icon>
                    Setting
                </x-nav-link>
            </ul>
        </div>

        <div class="pb-4 space-y-2 sm:hidden">
            <div class="flex items-center gap-3 px-4 py-2 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <i class="p-3 text-sm text-white bg-gray-500 dark:bg-gray-600 rounded-full fa-solid fa-user"></i>
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</h3>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<script>
// Update mobile toggle icons as well
function updateToggleButton() {
    const toggleButton = document.getElementById('darkModeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const sunIconMobile = document.getElementById('sunIconMobile');
    const moonIconMobile = document.getElementById('moonIconMobile');
    
    const isDark = document.documentElement.classList.contains('dark');
    
    // Desktop icons
    if (sunIcon && moonIcon) {
        if (isDark) {
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }
    }
    
    // Mobile icons
    if (sunIconMobile && moonIconMobile) {
        if (isDark) {
            sunIconMobile.classList.remove('hidden');
            moonIconMobile.classList.add('hidden');
        } else {
            sunIconMobile.classList.add('hidden');
            moonIconMobile.classList.remove('hidden');
        }
    }
}
</script>