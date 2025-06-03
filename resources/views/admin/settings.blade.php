<x-app-layout>
    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        <main class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
            <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <!-- Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Settings</h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Manage your account preferences and security
                            settings</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Settings Content -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Profile Settings Section -->
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-6">
                                    <i data-lucide="user-circle" class="w-6 h-6 text-emerald-600 mr-3"></i>
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Profile Settings
                                    </h2>
                                </div>

                                <div class="space-y-6">
                                    <!-- Avatar Section -->
                                    <div class="flex items-center space-x-6">
                                        <div class="relative">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="Profile" class="w-20 h-20 rounded-full object-cover">
                                            <button
                                                class="absolute -bottom-1 -right-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full p-2 shadow-lg transition-colors">
                                                <i data-lucide="camera" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Profile Photo
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Click the camera icon to
                                                update your avatar</p>
                                        </div>
                                    </div>

                                    <!-- Form Fields -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full
                                                Name</label>
                                            <input type="text" value="John Doe"
                                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                                                Address</label>
                                            <input type="email" value="john.doe@example.com"
                                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3 pt-4">
                                        <button
                                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                                            Update Info
                                        </button>
                                        <button
                                            class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-6 py-3 rounded-xl font-medium transition-colors">
                                            Change Password
                                        </button>
                                    </div>

                                    <!-- Two-Factor Authentication -->
                                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">Two-Factor
                                                    Authentication</h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Add an extra layer
                                                    of security to your account</p>
                                            </div>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer">
                                                <div
                                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Preferences Section -->
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-6">
                                    <i data-lucide="settings" class="w-6 h-6 text-emerald-600 mr-3"></i>
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Preferences</h2>
                                </div>

                                <div class="space-y-6">
                                    <!-- Theme Toggle -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i data-lucide="moon" class="w-5 h-5 text-gray-600 dark:text-gray-400"></i>
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">Dark Mode
                                                </h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Toggle between light
                                                    and dark themes</p>
                                            </div>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" id="darkModeToggle">
                                            <div
                                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                                            </div>
                                        </label>
                                    </div>

                                    <!-- Language Selector -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Language</label>
                                        <select
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                                            <option value="en">English</option>
                                            <option value="es">Español</option>
                                            <option value="fr">Français</option>
                                            <option value="de">Deutsch</option>
                                        </select>
                                    </div>

                                    <!-- Currency Selector -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Currency</label>
                                        <select
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                                            <option value="PHP">Philippine Peso (₱)</option>
                                            <option value="USD">US Dollar ($)</option>
                                            <option value="EUR">Euro (€)</option>
                                            <option value="GBP">British Pound (£)</option>
                                        </select>
                                    </div>

                                    <!-- Theme Colors -->
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Theme
                                            Color</label>
                                        <div class="flex space-x-3">
                                            <button
                                                class="w-8 h-8 rounded-full bg-emerald-500 ring-2 ring-emerald-500 ring-offset-2 ring-offset-white dark:ring-offset-gray-800 transition-all hover:scale-110"></button>
                                            <button
                                                class="w-8 h-8 rounded-full bg-indigo-500 hover:ring-2 hover:ring-indigo-500 hover:ring-offset-2 hover:ring-offset-white dark:hover:ring-offset-gray-800 transition-all hover:scale-110"></button>
                                            <button
                                                class="w-8 h-8 rounded-full bg-gray-500 hover:ring-2 hover:ring-gray-500 hover:ring-offset-2 hover:ring-offset-white dark:hover:ring-offset-gray-800 transition-all hover:scale-110"></button>
                                            <button
                                                class="w-8 h-8 rounded-full bg-rose-500 hover:ring-2 hover:ring-rose-500 hover:ring-offset-2 hover:ring-offset-white dark:hover:ring-offset-gray-800 transition-all hover:scale-110"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notifications Section -->
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-6">
                                    <i data-lucide="bell" class="w-6 h-6 text-emerald-600 mr-3"></i>
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Notifications</h2>
                                </div>

                                <div class="space-y-6">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">Transaction
                                                Alerts</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Get notified when new
                                                transactions are recorded</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                                            </div>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">Budget
                                                Reminders</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Receive alerts when
                                                approaching budget limits</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" checked>
                                            <div
                                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                                            </div>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">Weekly
                                                Summaries</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Get weekly reports of
                                                your spending habits</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div
                                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar with Danger Zone -->
                        <div class="lg:col-span-1">
                            <div class="sticky top-8 space-y-6">
                                <!-- Quick Actions -->
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions
                                    </h3>
                                    <div class="space-y-3">
                                        <button
                                            class="w-full flex items-center justify-center px-4 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-colors">
                                            <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                                            Export Data
                                        </button>
                                        <button
                                            class="w-full flex items-center justify-center px-4 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-colors">
                                            <i data-lucide="upload" class="w-4 h-4 mr-2"></i>
                                            Import Data
                                        </button>
                                    </div>
                                </div>

                                <!-- Danger Zone -->
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-red-200 dark:border-red-900 p-6">
                                    <div class="flex items-center mb-4">
                                        <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600 mr-3"></i>
                                        <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">Danger Zone
                                        </h3>
                                    </div>

                                    <div class="space-y-4">
                                        <div
                                            class="p-4 bg-red-50 dark:bg-red-900/20 rounded-xl border border-red-200 dark:border-red-800">
                                            <h4 class="text-sm font-medium text-red-800 dark:text-red-300 mb-2">Delete
                                                Account</h4>
                                            <p class="text-xs text-red-600 dark:text-red-400 mb-3">This action cannot
                                                be undone. All your data will be permanently deleted.</p>
                                            <button
                                                class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                                                onclick="confirmDelete()">
                                                Delete Account
                                            </button>
                                        </div>

                                        <button
                                            class="w-full flex items-center justify-center px-4 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-colors">
                                            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
                                            Log Out
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteModal"
                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-md mx-4 w-full">
                    <div class="flex items-center mb-4">
                        <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Confirm Account Deletion</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Are you absolutely sure you want to delete your
                        account? This action cannot be undone and all your financial data will be permanently lost.</p>
                    <div class="flex space-x-3">
                        <button onclick="closeDeleteModal()"
                            class="flex-1 px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg font-medium transition-colors">
                            Cancel
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                            Delete Forever
                        </button>
                    </div>
                </div>
            </div>

            <script>
                // Initialize Lucide icons
                lucide.createIcons();

                // Dark mode toggle functionality
                const darkModeToggle = document.getElementById('darkModeToggle');
                const html = document.documentElement;

                // Check for saved dark mode preference or default to light mode
                const savedTheme = localStorage.getItem('theme') || 'light';
                if (savedTheme === 'dark') {
                    html.classList.add('dark');
                    darkModeToggle.checked = true;
                }

                darkModeToggle.addEventListener('change', () => {
                    if (darkModeToggle.checked) {
                        html.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        html.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                });

                // Delete confirmation modal
                function confirmDelete() {
                    document.getElementById('deleteModal').classList.remove('hidden');
                }

                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.add('hidden');
                }

                // Theme color selection
                document.querySelectorAll('button[class*="rounded-full"]').forEach(button => {
                    if (button.classList.contains('bg-emerald-500') ||
                        button.classList.contains('bg-indigo-500') ||
                        button.classList.contains('bg-gray-500') ||
                        button.classList.contains('bg-rose-500')) {
                        button.addEventListener('click', () => {
                            // Remove active state from all color buttons
                            document.querySelectorAll('button[class*="rounded-full"]').forEach(btn => {
                                btn.classList.remove('ring-2', 'ring-offset-2');
                            });
                            // Add active state to clicked button
                            button.classList.add('ring-2', 'ring-offset-2');
                        });
                    }
                });
            </script>
        </main>
    </div>
</x-app-layout>
