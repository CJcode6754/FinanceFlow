<x-app-layout title="Budget">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="px-12 py-6">
            <section
                class="flex flex-col items-start justify-between w-full gap-4 p-4 bg-white rounded-lg shadow-md md:flex-row md:items-center">
                <div>
                    <h2 class="text-lg font-semibold">Budget Management</h2>
                    <p class="text-sm text-gray-600">Track your spending limits and stay on budget</p>
                </div>

                <form class="flex flex-wrap items-end gap-4" method="GET">
                    <div class="flex flex-col gap-1">
                        <label for="start_date" class="text-sm text-gray-500">Start date</label>
                        <input type="date" id="start_date" name="start_date"
                            class="p-2 text-sm border border-gray-300 rounded-md" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="end_date" class="text-sm text-gray-500">End date</label>
                        <input type="date" id="end_date" name="end_date"
                            class="p-2 text-sm border border-gray-300 rounded-md" />
                    </div>

                    <button type="submit"
                        class="px-4 py-2 text-sm text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                        Filter
                    </button>
                </form>
            </section>

            <section class="flex flex-col items-start gap-6 mt-6 md:flex-row">
                <!-- My Budget -->
                <div class="w-full p-6 space-y-6 bg-white shadow-lg md:w-3/5 rounded-2xl">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">My Budget</h2>
                            <p class="text-sm text-gray-500">View and manage your current budget allocations.</p>
                        </div>
                        <a href="#"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 transition border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white">
                            <i class="fa-solid fa-plus"></i>
                            Add
                        </a>
                    </div>

                    <!-- Budget Card -->
                    <div class="flex flex-col gap-4 p-4 border-gray-500 border-l-6 bg-gray-50 rounded-xl">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/category_image/default.png') }}" alt="Category Image"
                                    class="object-cover bg-white shadow w-14 h-14 rounded-xl">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-800">Category Name</h3>
                                    <p class="text-sm text-gray-500">PHP 800 spent of PHP 1000</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <button class="p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="p-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div>
                            <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                                <div class="h-full bg-green-500 w-[80%] transition-all">
                                    
                                </div>
                            </div>
                            <div class="flex justify-between mt-1 text-sm text-gray-600">
                                <span>80%</span>
                                <span>PHP 200 remaining</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar: Budget Overview + Alerts -->
                <div class="flex flex-col w-full gap-4 md:w-2/5">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">Budget Overview</h2>
                        <p class="text-sm text-gray-600">Summary of spending, limits, and remaining balance.</p>

                        <div class="mt-4 bg-gray-500 h-75">
                            <h3>Hello</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-4 py-4 space-y-4">
                            <div class="text-center">
                                <h3 class="text-lg text-gray-700">PHP 5300</h3>
                                <p class="text-sm text-gray-500">Total Budget</p>
                            </div>

                            <div class="text-center">
                                <h3>PHP 5300</h3>
                                <p>Total Budget</p>
                            </div>

                            <div class="text-center">
                                <h3>PHP 5300</h3>
                                <p>Total Budget</p>
                            </div>

                            <div class="text-center">
                                <h3>PHP 5300</h3>
                                <p>Total Budget</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-2 text-lg font-semibold text-gray-800">Alerts</h2>
                        <p class="text-sm text-gray-600">Important updates or warnings related to your budget.</p>

                        <div class="py-4 space-y-4">
                            <div class="w-full p-6 bg-white border-l-4 border-gray-500 shadow rounded-xl">
                                <h2>Transportation: 84% of budget used</h2>
                            </div>

                            <div class="w-full p-6 bg-white border-l-4 border-gray-500 shadow rounded-xl">
                                <h2>Transportation: 84% of budget used</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
</x-app-layout>
