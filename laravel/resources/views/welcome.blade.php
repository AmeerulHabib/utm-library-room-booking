<x-guest-layout>
    <div class="flex flex-col justify-center items-center min-h-screen py-10 bg-rose-900">
        <!-- Logo here -->
        <img src="{{ asset('assets/logos/LOGO_UTM_REVERSE.png') }}" alt="UTM Logo"
             class="h-16 mb-6">
        <div class="bg-white rounded-xl shadow-lg px-8 py-10 max-w-lg w-full flex flex-col items-center">


            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 text-center">
                Welcome to UTM Library Room Booking System
            </h1>
            <p class="mb-8 text-gray-600 text-lg text-center">
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
    </div>
</x-guest-layout>
