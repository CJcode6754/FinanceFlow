<x-app-layout title="Settings">
    {{-- Sidebar Component --}}
    <x-sidebar-layout />

    <div class="flex-1 md:ml-64">
        {{-- Header Component --}}
        <x-header />

        <main>
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
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Profile Settings
                                    </h2>
                                </div>

                                <div class="space-y-6">
                                    <!-- Avatar Section -->
                                    <div class="flex items-center space-x-4">
                                        <div class="relative">
                                            <i
                                                class="p-6 text-sm text-white bg-gray-500 rounded-full dark:bg-gray-600 fa-solid fa-user"></i>
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
                                            <input type="text" value="{{ auth()->user()->name }}"
                                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                                                Address</label>
                                            <input type="email" value="{{ auth()->user()->email }}"
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
                        </div>

                        <!-- Sidebar with Danger Zone -->
                        <div class="lg:col-span-1">
                            <div class="sticky top-8 space-y-6">
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
                                                onclick="showModal({{auth()->user()->id}})">
                                                Delete Account
                                            </button>
                                        </div>

                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button
                                                class="w-full flex items-center justify-center px-4 py-3 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-colors">
                                                <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modern Delete Modal --}}
            <div id="deleteModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div id="modal-backdrop"
                    class="fixed inset-0 transition-opacity duration-300 opacity-0 bg-black/50 backdrop-blur-sm"
                    aria-hidden="true"></div>

                <div id="modal-wrapper"
                    class="fixed inset-0 z-10 w-screen overflow-y-auto transition duration-300 ease-out scale-95 opacity-0">
                    <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative overflow-hidden text-left transition-all transform bg-white border border-gray-200 shadow-2xl dark:bg-gray-800 rounded-2xl sm:my-8 sm:w-full sm:max-w-lg dark:border-gray-700">
                            {{-- Modal Header --}}
                            <div class="px-6 py-6">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl">
                                        <i
                                            class="text-xl text-red-600 fas fa-exclamation-triangle dark:text-red-400"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100"
                                            id="modal-title">
                                            Delete Acount
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            This action cannot be undone
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Body --}}
                            <div class="px-6 pb-6">
                                <p class="text-gray-700 dark:text-gray-300">
                                    Are you sure you want to delete this acount? All associated data will be
                                    permanently removed from your records.
                                </p>
                            </div>

                            {{-- Modal Footer --}}
                            <div
                                class="flex flex-col-reverse gap-3 px-6 py-4 bg-gray-50 dark:bg-gray-700/50 sm:flex-row sm:justify-end">
                                <button onclick="hideModal()" type="button"
                                    class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 transition-colors duration-200 bg-white border border-gray-300 dark:text-gray-300 dark:bg-gray-600 dark:border-gray-500 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-500">
                                    Cancel
                                </button>
                                <form id="deleteForm" action="" method="post" class="inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex justify-center items-center px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <i class="mr-2 fas fa-trash"></i>
                                        Delete Acount
                                    </button>
                                </form>
                            </div>
                        </div>
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

                function showModal(itemID) {
                    const modal = document.getElementById('deleteModal');
                    const backdrop = document.getElementById('modal-backdrop');
                    const wrapper = document.getElementById('modal-wrapper');
                    const form = document.getElementById('deleteForm');

                    // form.action = `transaction/${itemID}`;
                    modal.classList.remove('hidden');

                    // Animate in
                    setTimeout(() => {
                        backdrop.classList.remove('opacity-0');
                        wrapper.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                }

                function hideModal() {
                    const modal = document.getElementById('modal');
                    const backdrop = document.getElementById('modal-backdrop');
                    const wrapper = document.getElementById('modal-wrapper');

                    // Animate out
                    backdrop.classList.add('opacity-0');
                    wrapper.classList.add('opacity-0', 'scale-95');

                    // Hide after animation
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
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
