<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Booking Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Booking #{{ $booking->id }}</h3>
                <p><strong>Room:</strong> {{ $booking->room->name ?? '-' }}</p>
                <p><strong>User:</strong> {{ $booking->user->name ?? '-' }}</p>
                <p><strong>Start:</strong> {{ $booking->start_time }}</p>
                <p><strong>End:</strong> {{ $booking->end_time }}</p>
                <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                <p><strong>Notes:</strong> {{ $booking->notes }}</p>
                <div class="mt-6">
                    <a href="{{ route('bookings.edit', $booking) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                    <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 ml-2">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
