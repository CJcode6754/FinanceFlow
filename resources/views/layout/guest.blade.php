@props(['title' => '', 'image' => '', 'headerText' => '', 'pageText' => ''])
<x-base-layout :$title :$image :$headerText :$pageText>
    <section class="flex items-center justify-center min-h-screen p-8 bg-gray-100">
        <div class="flex w-full max-w-6xl overflow-hidden bg-white rounded-lg shadow-2xl">
            <div class="relative hidden w-1/2 md:block">
                <div class="absolute z-30 p-4 text-white top-4 right-4 drop-shadow-md">
                    <h1 class="text-3xl font-extrabold">Finance Flow</h1>
                </div>
                <img src="{{ $image }}" alt="Picture" class="absolute inset-0 object-cover w-full h-full">
                <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
                <div class="relative z-20 flex flex-col justify-end h-full p-8 text-white">
                    <h2 class="mb-2 text-2xl font-bold">Welcome to Finance Flow</h2>
                    <p class="text-sm opacity-90">Take control of your finances with tools for expense tracking, budget planning, and savings goal monitoring.</p>
                </div>
            </div>
            <div class="w-full p-10 space-y-6 md:w-1/2">
                <div class="text-center">
                    <h1 class="mb-2 text-3xl font-bold">Hi, Welcome</h1>
                    <p class="text-base text-gray-500">{{$headerText}}</p>
                </div>

                <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
                    <x-google-component/>
                    <x-facebook-component/>
                </div>

                <div class="flex items-center gap-4">
                    <hr class="flex-1 border-gray-300">
                    <h5 class="text-sm text-gray-400">Or {{$pageText}} with</h5>
                    <hr class="flex-1 border-gray-300">
                </div>

                <div>
                    {{$slot}}
                </div>

                {{$footerLink}}
            </div>
        </div>
    </section>
</x-base-layout>
