<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bookings List
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('bookings.create') }}"
                    class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Booking</a>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th>Room</th>
                            <th>User</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->room->name ?? '-' }}</td>
                                <td>{{ $booking->user->name ?? '-' }}</td>
                                <td>{{ $booking->start_time }}</td>
                                <td>{{ $booking->end_time }}</td>
                                <td>{{ ucfirst($booking->status) }}</td>
                                <td>
                                    <a href="{{ route('bookings.show', $booking) }}"
                                        class="text-blue-500 underline">View</a>
                                    @can('update', $booking)
                                        <a href="{{ route('bookings.edit', $booking) }}"
                                            class="text-yellow-500 underline mx-2">Edit</a>
                                        @if ($booking->status === 'pending')
                                            <form action="{{ route('bookings.approve', $booking) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 underline"
                                                    onclick="return confirm('Approve this booking?')">Approve</button>
                                            </form>
                                            <form action="{{ route('bookings.reject', $booking) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-600 underline"
                                                    onclick="return confirm('Reject this booking?')">Reject</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 underline"
                                                onclick="return confirm('Delete this booking?')">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
