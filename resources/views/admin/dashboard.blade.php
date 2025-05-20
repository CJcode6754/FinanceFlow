<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 ml-64">
        {{-- Header --}}
        <x-header />

        <main class="px-8">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <section class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-4">
                <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <h4 class="font-medium">Income</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="text-blue-500 font-medium">+ PHP 500.00</span> last month</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h4 class="font-medium">Expense</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="text-blue-500 font-medium">+ PHP 500.00</span> last month</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <h4 class="font-medium">Saving</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="text-blue-500 font-medium">+ PHP 500.00</span> last month</p>
                </div>
            </section>

            <section>
                <div class="flex items-center justify-between">
                    <h2>Statistics</h2>

                    <h4>Dropdown</h4>
                </div>


                <div class="bg-gray-200 mt-4 h-75">
                    Chart
                </div>
            </section>

            <section class="flex gap-4 py-4">
                <div class="bg-gray-200 w-2/5 p-4">
                    <h2 class="text-lg font-bold">Ratio</h2>

                    <div class="flex items-start justify-center gap-24 h-100">
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Expense</h3>
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Income</h3>
                    </div>
                </div>

                <div class="bg-gray-200 w-3/5 p-4 space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-bold">Money Report</h2>
                        <button class="border border-blue-500 rounded-lg py-2 px-4">
                            <i class="fa-solid fa-plus"></i> New Report
                        </button>
                    </div>

                    <table class="table-auto border-collapse border border-gray-300 w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Category</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Note</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Time</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Lunch</td>
                                <td class="border border-gray-300 px-4 py-2">Buy Pizza</td>
                                <td class="border border-gray-300 px-4 py-2">Today</td>
                                <td class="border border-gray-300 px-4 py-2">PHP 350.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

</x-app-layout>
