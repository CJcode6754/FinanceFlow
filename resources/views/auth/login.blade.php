<x-guest-layout title="Login" pageText="Sign in" headerText="Login to Finance Flow Dashboard"
    image="{{ asset('assets/pic 1.jpg') }}">

    <div>
        <form action="" method="post" class="space-y-4">
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

            <button type="submit"
                class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-150">Login</button>

            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-700">
                    <input type="checkbox" name="check" id="check" class="form-checkbox">
                    Remember me
                </div>
                <a href="" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
        </form>
    </div>

    <x-slot:footerLink>
        <p class="text-sm text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </x-slot:footerLink>
</x-guest-layout>
