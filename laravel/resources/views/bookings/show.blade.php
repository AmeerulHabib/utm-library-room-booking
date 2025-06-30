@extends('layouts.app')

@section('content')
<h2>Booking Details</h2>
<ul>
    <li><strong>Room:</strong> {{ $booking->room->name ?? '-' }}</li>
    <li><strong>User:</strong> {{ $booking->user->name ?? '-' }}</li>
    <li><strong>Start Time:</strong> {{ $booking->start_time }}</li>
    <li><strong>End Time:</strong> {{ $booking->end_time }}</li>
    <li><strong>Status:</strong> {{ ucfirst($booking->status) }}</li>
</ul>
<a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back</a>
@endsection
