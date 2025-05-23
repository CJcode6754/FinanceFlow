<x-guest-layout title="Login" pageText="Or Sign in with" headerText="Login to Finance Flow Dashboard"
    image="{{ asset('assets/pic 1.jpg') }}" header="Hi, Welcome">

    <x-slot:socials>
        <x-google-component/>
        <x-facebook-component/>
    </x-slot:socials>
    <div>
        <form action="{{route('loginUser')}}" method="POST" class="space-y-4">
            @csrf
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
                        ring-red-400
                    @enderror"
                    placeholder="ex: 12345678">
                @error('password')
                    <p class="text-xs text-red-600">{{$message}}</p>
                @enderror

                <span id="togglePassword" class="absolute" style="right: 15px; top: 40px; cursor: pointer;">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            @error('errors')
                <p class="text-xs text-red-600">{{$message}}</p>
            @enderror
            <button type="submit"
                class="w-full p-3 text-white transition duration-150 bg-blue-600 rounded-lg hover:bg-blue-700">Login</button>

            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-700">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                    <label for="remember">Remember me</label>
                </div>
                <a href="{{route('password.request')}}" class="text-blue-500 hover:underline">Forgot Password?</a>
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
