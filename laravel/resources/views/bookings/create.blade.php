@extends('layouts.app')

@section('content')
<h2>Create Booking</h2>
<form method="POST" action="{{ route('bookings.store') }}">
    @csrf
    <div class="mb-3">
        <label>Room</label>
        <select name="room_id" class="form-control" required>
            <option value="">Select Room</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Start Time</label>
        <input type="datetime-local" name="start_time" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>End Time</label>
        <input type="datetime-local" name="end_time" class="form-control" required>
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection
