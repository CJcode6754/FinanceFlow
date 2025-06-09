@props(['title' => '', 'image' => '', 'headerText' => '', 'pageText' => '', 'header' => ''])
<x-base-layout :$title :$image :$headerText :$pageText :header>

        @if ($message = Session::get('status'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 5000)" 
            x-show="show"
            x-transition.opacity
            class="fixed z-50 top-4 right-12"
        >
            <div class="max-w-sm w-[280px] bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <!-- Success icon only -->
                            <svg 
                                class="w-6 h-6 text-green-500" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">
                                Success
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $message }}
                            </p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="show = false" class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 8.586L4.707 3.293A1 1 0 103.293 4.707L8.586 10l-5.293 5.293a1 1 0 101.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <section class="flex items-center justify-center min-h-screen p-8 bg-gray-100 dark:bg-gray-800">
        <div class="flex w-full max-w-6xl overflow-hidden bg-white rounded-lg shadow-2xl">
            <div class="relative hidden w-1/2 md:block">
                <div class="absolute z-30 p-4 text-white top-4 right-4 drop-shadow-md">
                    <h1 class="text-3xl font-extrabold">Finance Flow</h1>
                </div>
                <img src="{{ $image }}" alt="Picture" class="absolute inset-0 object-cover w-full h-full">
                <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/50 via-black/20 dark:rom-black/20 dark:via-black/10 to-transparent"></div>
                <div class="relative z-20 flex flex-col justify-end h-full p-8 text-white">
                    <h2 class="mb-2 text-2xl font-bold">Welcome to Finance Flow</h2>
                    <p class="text-sm opacity-90">Take control of your finances with tools for expense tracking, budget planning, and savings goal monitoring.</p>
                </div>
            </div>
            <div class="w-full p-10 space-y-6 md:w-1/2">
                <div class="text-center">
                    <h1 class="mb-2 text-3xl font-bold dark:text-gray-900">{{$header}}</h1>
                    <p class="text-base text-gray-500 dark:text-gray-700">{{$headerText}}</p>
                </div>

                <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
                    {{$socials ?? ''}}
                </div>

                <div class="flex items-center gap-4">
                    <hr class="flex-1 border-gray-300 dark:border-gray-600">
                    <h5 class="text-sm text-gray-400 dark:text-gray-700">{{$pageText}}</h5>
                    <hr class="flex-1 border-gray-300 dark:border-gray-600">
                </div>

                <div>
                    {{$slot}}
                </div>

                {{$footerLink ?? ''}}
            </div>
        </div>
    </section>
</x-base-layout>
