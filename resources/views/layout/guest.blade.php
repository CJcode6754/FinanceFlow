@props(['title' => '', 'image' => '', 'headerText' => '', 'pageText' => ''])
<x-base-layout :$title :$image :$headerText :$pageText>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-8">
        <div class="flex w-full max-w-6xl bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="w-1/2 relative hidden md:block">
                <div class="absolute top-4 right-4 z-30 p-4 text-white drop-shadow-md">
                    <h1 class="text-3xl font-extrabold">Finance Flow</h1>
                </div>
                <img src="{{ $image }}" alt="Picture" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent z-10"></div>
                <div class="relative z-20 p-8 text-white h-full flex flex-col justify-end">
                    <h2 class="text-2xl font-bold mb-2">Welcome to Finance Flow</h2>
                    <p class="text-sm opacity-90">Take control of your finances with tools for expense tracking, budget planning, and savings goal monitoring.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-10 space-y-6">
                <div class="text-center">
                    <h1 class="text-3xl font-bold mb-2">Hi, Welcome</h1>
                    <p class="text-gray-500 text-base">{{$headerText}}</p>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <x-google-component/>
                    <x-facebook-component/>
                </div>

                <div class="flex items-center gap-4">
                    <hr class="flex-1 border-gray-300">
                    <h5 class="text-gray-400 text-sm">Or {{$pageText}} with</h5>
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
