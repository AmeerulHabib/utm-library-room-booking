@extends('layouts.app')

@section('content')
<h2>Bookings</h2>
<a href="{{ route('bookings.create') }}" class="btn btn-primary mb-2">Add Booking</a>
<table class="table">
    <thead>
        <tr>
            <th>Room</th>
            <th>User</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->room->name ?? '-' }}</td>
            <td>{{ $booking->user->name ?? '-' }}</td>
            <td>{{ $booking->start_time }}</td>
            <td>{{ $booking->end_time }}</td>
            <td><span class="badge bg-info">{{ ucfirst($booking->status) }}</span></td>
            <td>
                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-sm btn-secondary">View</a>
                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</bu
