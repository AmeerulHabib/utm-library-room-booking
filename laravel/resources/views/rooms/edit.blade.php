@extends('layouts.app')

@section('content')
<h2>Edit Room</h2>
<form method="POST" action="{{ route('rooms.update', $room) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $room->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" value="{{ $room->location }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Capacity</label>
        <input type="number" name="capacity" value="{{ $room->capacity }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
            <option value="unavailable" {{ $room->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
