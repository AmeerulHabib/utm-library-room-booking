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

                <div class="mt-6 flex gap-2">
                    <a href="{{ route('bookings.edit', $booking) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                    <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Back to List</a>
                </div>

                @can('update', $booking)
                    @if($booking->status === 'pending')
                        <div class="mt-4 flex flex-row gap-2">
                            <form action="{{ route('bookings.approve', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                                    onclick="return confirm('Approve this booking?')">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('bookings.reject', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                                    onclick="return confirm('Reject this booking?')">
                                    Reject
                                </button>
                            </form>
                        </div>
                    @endif
                @endcan

            </div>
        </div>
    </div>
</x-app-layout>
