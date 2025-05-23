<x-guest-layout title="Login" pageText="Reset" headerText="Please input your email to send request"
    image="{{ asset('assets/pic 1.jpg') }}" header="Reset Your Password">

    <div>
        <form action="{{route('password.update')}}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div class="pb-4">
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

            @error('error')
                <span class="text-xs text-red-400">{{$message}}</span>
            @enderror

            <button type="submit"
                class="w-full p-3 text-white transition duration-150 bg-blue-600 rounded-lg hover:bg-blue-700">Reset Password</button>
        </form>
    </div>
</x-guest-layout>
