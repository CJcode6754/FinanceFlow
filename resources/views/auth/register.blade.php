<x-guest-layout title="Register">
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-8">
        <div class="flex w-full max-w-6xl bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="w-1/2 relative hidden md:block">
                <div class="absolute top-4 right-4 z-30 p-4 text-white drop-shadow-md">
                    <h1 class="text-3xl font-extrabold">Finance Flow</h1>
                </div>
                <img src="{{ asset('assets/pic 2.jpg') }}" alt="Picture"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent z-10"></div>
                <div class="relative z-20 p-8 text-white h-full flex flex-col justify-end">
                    <h2 class="text-2xl font-bold mb-2">Welcome to Finance Flow</h2>
                    <p class="text-sm opacity-90">Take control of your finances with tools for expense tracking, budget
                        planning, and savings goal monitoring.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-10 space-y-6">
                <div class="text-center">
                    <h1 class="text-3xl font-bold mb-2">Hi, Welcome</h1>
                    <p class="text-gray-500 text-base">Please input to create an account</p>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <button
                        class="flex items-center gap-2 px-4 py-2 ring-1 ring-gray-300 hover:ring-gray-800 rounded-lg transition duration-150 w-full sm:auto">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
                            viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                            <path fill="#FF3D00"
                                d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                            </path>
                            <path fill="#4CAF50"
                                d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                            </path>
                            <path fill="#1976D2"
                                d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                            </path>
                        </svg>
                        <h2 class="text-sm font-medium">Sign up with Google</h2>
                    </button>
                    <button
                        class="flex items-center gap-2 px-4 py-2 ring-1 ring-gray-300 hover:ring-gray-800 rounded-lg transition duration-150 w-full sm:auto">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32"
                            viewBox="0 0 48 48">
                            <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                            <path fill="#fff"
                                d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                            </path>
                        </svg>
                        <h2 class="text-sm font-medium">Sign up with Facebook</h2>
                    </button>
                </div>

                <div class="flex items-center gap-4">
                    <hr class="flex-1 border-gray-300">
                    <h5 class="text-gray-400 text-sm">Or Register in with</h5>
                    <hr class="flex-1 border-gray-300">
                </div>

                <div>
                    <form action="" method="post" class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Full Name</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ex: Juan Dele Cruz">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ex: example123@gmail.com">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium mb-2">Password</label>
                            <input type="password" name="password" id="password"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ex: 12345678">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ex: 12345678">
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-150">Login</button>
                    </form>
                </div>

                <p class="text-sm text-center text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                </p>
            </div>
        </div>
    </section>
</x-guest-layout>
