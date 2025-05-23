<x-app-layout title="Verify Email">
    <div class="max-w-md p-8 mx-auto mt-12 bg-white shadow-md rounded-2xl">
        <h2 class="mb-4 text-2xl font-bold text-gray-800">Verify Your Email</h2>
        <p class="mb-6 text-gray-600">
            A verification link has been sent to your email. Please check your inbox and click the link to complete your registration.
        </p>

        <form action="{{ route('verification.send') }}" method="POST">
            @csrf

            <button type="submit"
                class="w-full py-3 font-semibold text-white transition duration-200 bg-blue-500 rounded-lg hover:bg-blue-600">
                Resend Verification Email
            </button>
        </form>
    </div>
</x-app-layout>