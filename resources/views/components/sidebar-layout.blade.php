<button id="hamburger-button" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
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
    <div class="h-full px-3 overflow-y-auto bg-gray-50">
        <div class="flex justify-center">
            <img class="w-32" src="{{asset('assets/logo.png')}}" alt="Logo  ">
        </div>
        
        <ul class="space-y-3 font-medium">
            <li>
                <a href="#" class="flex items-center py-2 pl-5 text-gray-900 rounded-lg hover:text-blue-800 hover:bg-blue-100 group">
                    <i class="fa-solid fa-house"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 pl-5 text-gray-900 rounded-lg hover:text-blue-800 hover:bg-blue-100 group">
                    <i class="fa-solid fa-wallet"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">My Wallet</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 pl-5 text-gray-900 rounded-lg hover:text-blue-800 hover:bg-blue-100 group">
                    <i class="fa-solid fa-piggy-bank"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Piggy Bank</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 pl-5 text-gray-900 rounded-lg hover:text-blue-800 hover:bg-blue-100 group">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-2 pl-5 text-gray-900 rounded-lg hover:text-blue-800 hover:bg-blue-100 group">
                    <i class="fa-solid fa-gear"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
