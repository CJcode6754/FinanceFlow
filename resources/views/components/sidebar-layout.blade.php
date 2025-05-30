<button id="hamburger-button" aria-controls="default-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex flex-col justify-between h-full px-3 overflow-y-auto bg-gray-50">
        <div>
            <div class="flex justify-center">
                <img class="w-32" src="{{ asset('assets/logo.png') }}" alt="Logo  ">
            </div>

            <ul class="space-y-3 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="sidebar-link group">
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('wallet.index') }}"
                        class="sidebar-link group">
                        <i class="fa-solid fa-wallet"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Wallet</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('transaction.index')}}"
                        class="sidebar-link group">
                        <i class="fa-solid fa-right-left"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}"
                        class="sidebar-link group">
                        <i class="fa-solid fa-tags"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('budget.index')}}"
                        class="sidebar-link group">
                        <i class="fa-solid fa-scale-balanced"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Budgets</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="sidebar-link group">
                        <i class="fa-solid fa-bullseye"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Saving goals</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="sidebar-link group">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="sidebar-link group">
                        <i class="fa-solid fa-gear"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Setting</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="pb-4 space-y-2 sm:hidden">
            <div class="flex items-center gap-3 px-4 py-2 rounded-lg cursor-pointer hover:bg-gray-100">
                <i class="p-3 text-sm text-white bg-gray-500 rounded-full fa-solid fa-user"></i>
                <div class="flex items-center gap-3 text-sm">
                    <h3 class="font-medium">{{auth()->user()->name}}</h3>
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
