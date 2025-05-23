<x-guest-layout title="Register" pageText="Or Sign up with" headerText="Please input to create an account"
    image="{{ asset('assets/pic 2.jpg') }}" header="Hi, Welcome">

    <x-slot:socials>
        <x-google-component/>
        <x-facebook-component/>
    </x-slot:socials>
    <div>
        <form action="{{route('register.store')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium">Full Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name')
                        ring-red-400
                    @enderror"
                    value="{{old('name')}}"
                    placeholder="ex: Juan Dele Cruz">
                @error('name')
                    <p class="text-xs text-red-600">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                <input type="text" name="email" id="email"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email')
                        ring-red-400
                    @enderror"
                    value="{{old('email')}}"
                    placeholder="ex: example123@gmail.com">
                @error('email')
                    <p class="text-xs text-red-600">{{$message}}</p>
                @enderror
            </div>

            <div class="relative">
                <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password')
                        ring-red-500
                    @enderror"
                    placeholder="ex: 12345678">
                @error('password')
                    <p class="text-xs text-red-600">{{$message}}</p>
                @enderror

                <span id="togglePassword" class="absolute" style="right: 15px; top: 40px; cursor: pointer;">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            <div class="relative">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="ex: 12345678">

                <span id="toggleConfirmPassword" class="absolute" style="right: 15px; top: 40px; cursor: pointer;">
                    <i class="fas fa-eye" id="toggleConfirmIcon"></i>
                </span>
            </div>

            <button type="submit"
                class="w-full p-3 text-white transition duration-150 bg-blue-600 rounded-lg hover:bg-blue-700">Register</button>
        </form>
    </div>

    <x-slot:footerLink>
        <p class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </x-slot:footerLink>
</x-guest-layout>
