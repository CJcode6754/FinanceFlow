<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
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
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <h2 class="text-lg font-semibold">Statistics</h2>

                    <select class="border rounded-lg py-1 px-2 text-sm">
                        <option>Last Month</option>
                        <option>This Month</option>
                    </select>
                </div>


                <div class="bg-gray-200 mt-4 h-60 w-full rounded-lg">
                    Chart
                </div>
            </section>

            <section class="flex flex-col md:flex-row gap-4 py-4">
                <!-- Ratio Box -->
                <div class="bg-gray-200 w-full md:w-2/5 p-4 rounded-lg">
                    <h2 class="text-lg font-bold mb-4">Ratio</h2>
                    <div class="flex justify-around">
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Expense</h3>
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Income</h3>
                    </div>
                </div>

                <!-- Money Report -->
                <div class="bg-gray-200 w-full md:w-3/5 p-4 rounded-lg space-y-4 overflow-x-auto">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                        <h2 class="text-lg font-bold">Money Report</h2>
                        <button class="border border-blue-500 hover:bg-blue-500 hover:text-white rounded-lg py-2 px-4 text-sm cursor-pointer transition duration-150">
                            <i class="fa-solid fa-plus"></i> New Report
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2 text-left">Category</th>
                                    <th class="border px-4 py-2 text-left">Note</th>
                                    <th class="border px-4 py-2 text-left">Time</th>
                                    <th class="border px-4 py-2 text-left">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2">Lunch</td>
                                    <td class="border px-4 py-2">Buy Pizza</td>
                                    <td class="border px-4 py-2">Today</td>
                                    <td class="border px-4 py-2">PHP 350.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

</x-app-layout>
