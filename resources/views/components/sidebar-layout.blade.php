<button id="hamburger-button" aria-controls="default-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
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
    <div class="flex flex-col justify-between h-full px-3 overflow-y-auto bg-gray-50">
        <div>
            <div class="flex justify-center">
                <img class="w-32" src="{{ asset('assets/logo.png') }}" alt="Logo  ">
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

                <a href="#" class="sidebar-link group">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Analytics</span>
                </a>

                <a href="#" class="sidebar-link group">
                    <i class="fa-solid fa-gear"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Setting</span>
                </a>
            </ul>
        </div>

        <div class="pb-4 space-y-2 sm:hidden">
            <div class="flex items-center gap-3 px-4 py-2 rounded-lg cursor-pointer hover:bg-gray-100">
                <i class="p-3 text-sm text-white bg-gray-500 rounded-full fa-solid fa-user"></i>
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-medium">{{ auth()->user()->name }}</h3>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
