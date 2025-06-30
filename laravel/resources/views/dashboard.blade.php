<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Flash message (status) --}}
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- “You are logged in!” message --}}
                <div class="mb-6">
                    <span class="font-semibold text-green-600 dark:text-green-400">
                        {{ __('You are logged in!') }}
                    </span>
                </div>

                <div class="flex flex-wrap gap-4">
                    {{-- Room Management (all can see) --}}
                    <a href="{{ route('rooms.index') }}"
                       class="px-6 py-3 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">
                        Room Management
                    </a>

                    {{-- Booking Management (all can see) --}}
                    <a href="{{ route('bookings.index') }}"
                       class="px-6 py-3 bg-purple-600 text-white rounded shadow hover:bg-purple-700 transition">
                        Booking Management
                    </a>

                    {{-- User Management (show if user has permission) --}}
                    @can('user-view-all')
                    <a href="{{ route('users.index') }}"
                       class="px-6 py-3 bg-green-600 text-white rounded shadow hover:bg-green-700 transition">
                        User Management
                    </a>
                    @endcan

                    {{-- Role Management (show if user has permission) --}}
                    @can('role-view')
                    <a href="{{ route('roles.index') }}"
                       class="px-6 py-3 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                        Role Management
                    </a>
                    @endcan
                </div>

                {{-- Example: “Check Auth Info” button (optional) --}}
                <div class="mt-8">
                    <a href="{{ url('/test-auth') }}"
                       class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 transition">
                        Check Auth Info
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
