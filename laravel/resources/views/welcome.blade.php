<x-guest-layout>
    <div class="flex flex-col justify-center items-center min-h-screen py-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4 text-center">
            Welcome to UTM Library Room Booking System
        </h1>
        <p class="mb-8 text-gray-600 dark:text-gray-300 text-lg text-center">
            Book library rooms online with ease.<br>
            Please login or register to continue.
        </p>
        <div class="flex flex-row space-x-4">
            <a href="{{ route('login') }}"
               class="px-8 py-3 bg-blue-600 text-white rounded-md font-semibold hover:bg-blue-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="px-8 py-3 bg-green-600 text-white rounded-md font-semibold hover:bg-green-700 transition">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
