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
                <p>
                    <strong>Status:</strong>
                    <span class="px-2 py-1 rounded
                        @if($booking->status == 'approved') bg-green-200 text-green-800
                        @elseif($booking->status == 'rejected') bg-red-200 text-red-800
                        @else bg-yellow-200 text-yellow-800
                        @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
                <p><strong>Notes:</strong> {{ $booking->notes }}</p>
                <div class="mt-6 flex gap-2">
                    @can('update', $booking)
                        <a href="{{ route('bookings.edit', $booking) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                    @endcan
                    @can('delete', $booking)
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 ml-2"
                                onclick="return confirm('Delete this booking?')">Delete</button>
                        </form>
                    @endcan
                    @can('update', $booking)
                        @if($booking->status === 'pending')
                            <form action="{{ route('bookings.approve', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mx-1">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('bookings.reject', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 mx-1">
                                    Reject
                                </button>
                            </form>
                        @endif
                    @endcan
                    <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 ml-2">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
