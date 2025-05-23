<x-app-layout title="My Wallet">
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        <x-header />

        <main class="px-2 md:px-8">
            <!-- Wallet Card + Balance -->
            <section class="flex flex-col gap-4 px-2 py-4 lg:flex-row md:gap-6 md:px-8">
                <!-- Wallet Card -->
                <div
                    class="flex items-center justify-center w-full h-48 font-bold text-white bg-gray-400 rounded-lg lg:w-1/2">
                    <h1>Card</h1>
                </div>

                <!-- Total Balance -->
                <div class="w-full">
                    <section
                        class="flex flex-col gap-4 p-6 bg-white rounded-lg shadow-md md:flex-row md:items-center md:justify-between">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-sm font-medium text-gray-500">Total Balance</h3>
                            <p class="text-3xl font-bold text-gray-800">PHP 100,000.00</p>
                        </div>
                        <div
                            class="flex flex-col items-center w-full gap-6 p-6 bg-gray-800 lg:flex-row rounded-2xl md:w-auto">
                            <!-- Income -->
                            <div class="flex-1 text-white">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-base font-semibold">Total Income</h3>
                                    <p class="flex items-center gap-1 text-emerald-400">
                                        <i class="fa-solid fa-arrow-up"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold">PHP 20,000</p>
                            </div>

                            <!-- Expense -->
                            <div class="flex-1 w-full p-4 bg-white rounded-xl md:w-auto">
                                <div class="flex justify-between mb-1 text-gray-600">
                                    <h4 class="text-base font-semibold">Total Expense</h4>
                                    <p class="flex items-center gap-1">
                                        <i class="fa-solid fa-arrow-down"></i> 2.89%
                                    </p>
                                </div>
                                <p class="text-2xl font-bold text-gray-700">PHP 20,000</p>
                            </div>
                        </div>
                    </section>

                    <!-- Actions -->
                    <section class="py-4">
                        <div
                            class="grid grid-cols-2 gap-4 p-6 bg-white shadow rounded-xl sm:grid-cols-3 lg:grid-cols-5">
                            @php
                                $actions = [
                                    ['icon' => 'wallet', 'label' => 'Deposit', 'color' => 'text-blue-600'],
                                    ['icon' => 'arrow-up-from-bracket', 'label' => 'Send', 'color' => 'text-green-600'],
                                    [
                                        'icon' => 'arrow-down-to-bracket',
                                        'label' => 'Receive',
                                        'color' => 'text-yellow-600',
                                    ],
                                    [
                                        'icon' => 'file-invoice-dollar',
                                        'label' => 'Invoicing',
                                        'color' => 'text-purple-600',
                                    ],
                                    ['icon' => 'check', 'label' => 'Checkout', 'color' => 'text-indigo-600'],
                                ];
                            @endphp

                            @foreach ($actions as $action)
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-{{ $action['icon'] }} text-xl {{ $action['color'] }}"></i>
                                    <h5 class="text-sm font-semibold">{{ $action['label'] }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Graph + Subscriptions -->
                    <section class="flex flex-col gap-4 p-4 bg-white shadow-md lg:flex-row rounded-xl">
                        <!-- Graph -->
                        <div
                            class="flex items-center justify-center w-full h-48 font-bold text-white bg-gray-400 rounded lg:w-1/2">
                            Graph
                        </div>

                        <!-- Subscriptions -->
                        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl text-red-400 fa-solid fa-money-bill"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Subscription</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl fa-solid fa-wallet text-amber-300"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Investing</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl fa-solid fa-bowl-food text-violet-400"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Food</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl fa-solid fa-person text-emerald-500"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Lifestyle</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl text-blue-400 fa-solid fa-film"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Entertainment</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-white rounded shadow">
                                <i class="text-2xl text-pink-400 fa-solid fa-house"></i>
                                <div>
                                    <h5 class="font-semibold text-gray-800">Mortgage</h5>
                                    <h6 class="text-gray-600">PHP 500</h6>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Transaction History -->
                    <section class="p-6 mt-4 bg-white shadow rounded-xl">
                        <div class="flex flex-col items-start justify-between gap-2 mb-4 md:flex-row md:items-center">
                            <h3 class="text-lg font-semibold text-gray-700">Transaction History</h3>
                            <select class="px-3 py-1 text-sm border border-gray-300 rounded-lg">
                                <option>This Month</option>
                                <option>Last Month</option>
                            </select>
                        </div>

                        <!-- Table Wrapper for Mobile -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left min-w-[600px]">
                                <thead class="text-gray-500 border-b">
                                    <tr>
                                        <th class="pb-2">Category</th>
                                        <th>Business Name</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    <tr class="border-t">
                                        <td class="py-2">Lunch</td>
                                        <td>Buy Pizza</td>
                                        <td class="font-semibold">₱350.00</td>
                                        <td>Today</td>
                                        <td>Pending</td>
                                    </tr>
                                    <!-- More rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </section>
        </main>
    </div>
</x-app-layout>
