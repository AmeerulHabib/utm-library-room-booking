@extends('layouts.app')

@section('content')
<h2>Rooms</h2>
<a href="{{ route('rooms.create') }}" class="btn btn-primary mb-2">Add Room</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Capacity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{{ $room->name }}</td>
            <td>{{ $room->location }}</td>
            <td>{{ $room->capacity }}</td>
            <td>{{ ucfirst($room->status) }}</td>
            <td>
                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
