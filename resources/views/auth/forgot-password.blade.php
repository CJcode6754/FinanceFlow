<x-guest-layout title="Login" pageText="Reset" headerText="Please input your email to send request"
    image="{{ asset('assets/pic 1.jpg') }}" header="Reset Your Password">

    <div>
        <form action="{{route('password.email')}}" method="POST" class="space-y-4">
            @csrf
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

            <button type="submit"
                class="w-full p-3 text-white transition duration-150 bg-blue-600 rounded-lg hover:bg-blue-700">Send Password Reset Link</button>
        </form>
    </div>
</x-guest-layout>
