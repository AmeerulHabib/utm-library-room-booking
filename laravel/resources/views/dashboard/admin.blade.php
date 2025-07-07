<!-- resources/views/dashboard/admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12 bg-orange-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Admin Dashboard<br>Welcome, {{ $user->name }}!</h1>
                    <!-- Navigation Buttons -->
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('bookings.index') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Manage Bookings
                        </a>
                        <a href="{{ route('rooms.index') }}"
                           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Manage Rooms
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                            Manage Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
