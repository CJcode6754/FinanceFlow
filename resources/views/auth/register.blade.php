<x-guest-layout title="Register" pageText="Sign up" headerText="Please input to create an account"
    image="{{ asset('assets/pic 2.jpg') }}">
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

    <x-slot:footerLink>
        <p class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </x-slot:footerLink>
</x-guest-layout>
