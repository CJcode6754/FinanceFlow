<x-app-layout title="Dashboard">
    {{-- Sidebar --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header --}}
        <x-header />

        <main class="px-8">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <section class="grid grid-cols-1 gap-2 py-4 sm:grid-cols-3">
                <div class="p-4 space-y-1 rounded-lg bg-gray-50">
                    <div class="flex transactions-center gap-2">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <h4 class="font-medium">Income</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="font-medium text-blue-500">+ PHP 500.00</span> last month</p>
                </div>

                <div class="p-4 space-y-1 rounded-lg bg-gray-50">
                    <div class="flex transactions-center gap-2">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <h4 class="font-medium">Expense</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="font-medium text-blue-500">+ PHP 500.00</span> last month</p>
                </div>

                <div class="p-4 space-y-1 rounded-lg bg-gray-50">
                    <div class="flex transactions-center gap-2">
                        <i class="fa-solid fa-piggy-bank"></i>
                        <h4 class="font-medium">Saving</h4>
                    </div>
                    <h2 class="text-lg font-bold">PHP 10,000.00</h2>
                    <p class="text-sm"><span class="font-medium text-blue-500">+ PHP 500.00</span> last month</p>
                </div>
            </section>

            <section>
                <div class="flex flex-wrap transactions-center justify-between gap-4">
                    <h2 class="text-lg font-semibold">Statistics</h2>

                    <select class="px-2 py-1 text-sm border rounded-lg">
                        <option>Last Month</option>
                        <option>This Month</option>
                    </select>
                </div>


                <div class="w-full mt-4 bg-gray-200 rounded-lg h-60">
                    Chart
                </div>
            </section>

            <section class="flex flex-col gap-4 py-4 md:flex-row">
                <!-- Ratio Box -->
                <div class="w-full p-4 bg-gray-200 rounded-lg md:w-2/5">
                    <h2 class="mb-4 text-lg font-bold">Ratio</h2>
                    <div class="flex justify-around">
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Expense</h3>
                        <h3 class="text-base font-semibold border-b-2 border-blue-500">Income</h3>
                    </div>
                </div>

                <!-- Money Report -->
                <div class="w-full p-4 space-y-4 overflow-x-auto bg-gray-200 rounded-lg md:w-3/5">
                    <div class="flex flex-col transactions-start justify-between gap-2 sm:flex-row sm:transactions-center">
                        <h2 class="text-lg font-semibold text-gray-700">Transaction History</h2>
                        <div class="flex gap-4">
                            <select class="px-3 py-1 text-sm border border-gray-300 rounded-lg">
                                <option>This Month</option>
                                <option>Last Month</option>
                            </select>
                            <a href="{{route('transaction.index')}}"
                                class="px-4 py-2 text-sm transition duration-150 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-500 hover:text-white">
                                <i class="fa-solid fa-plus"></i> New Transaction
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left min-w-[600px]">
                                <thead class="text-gray-500 border-b text-center">
                                    <tr>
                                        <th class="pb-2">Category</th>
                                        <th>Notes</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Wallet</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-center">
                                    @foreach ($transactions as $transaction)
                                        <tr class="border-t">
                                            <td class="py-2">{{ $transaction->category->name }}</td>
                                            <td>{{ $transaction->note }}</td>
                                            <td class="font-semibold">₱ {{ $transaction->amount }}</td>
                                            <td class="capitalize">{{ $transaction->type }}</td>
                                            <td>{{ $transaction->wallet->name }}</td>
                                            <td>{{ $transaction->date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </main>
    </div>

</x-app-layout>
