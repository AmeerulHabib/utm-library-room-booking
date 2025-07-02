<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rooms List
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @can('create', App\Models\Room::class)
                <a href="{{ route('rooms.create') }}"
                   class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Room</a>
                @endcan
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->location }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ $room->type }}</td>
                            <td>
                                <a href="{{ route('rooms.show', $room) }}" class="text-blue-500 underline">View</a>
                                @can('update', $room)
                                    <a href="{{ route('rooms.edit', $room) }}" class="text-yellow-500 underline mx-2">Edit</a>
                                @endcan
                                @can('delete', $room)
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 underline" onclick="return confirm('Delete this room?')">Delete</button>
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
