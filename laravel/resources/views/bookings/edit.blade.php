@extends('layouts.app')

@section('content')
<h2>Edit Booking</h2>
<form method="POST" action="{{ route('bookings.update', $booking) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Room</label>
        <select name="room_id" class="form-control" required>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>
                    {{ $room->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Start Time</label>
        <input type="datetime-local" name="start_time" class="form-control"
               value="{{ \Carbon\Carbon::parse($booking->start_time)->format('Y-m-d\TH:i') }}" required>
    </div>
    <div class="mb-3">
        <label>End Time</label>
        <input type="datetime-local" name="end_time" class="form-control"
               value="{{ \Carbon\Carbon::parse($booking->end_time)->format('Y-m-d\TH:i') }}" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            @foreach(['pending','approved','rejected','cancelled'] as $status)
                <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
