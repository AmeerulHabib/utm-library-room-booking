<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a new booking for a given room.
     */
    public function store(Request $request, Room $room)
    {
        $data = $request->validate([
            'date'       => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
            'purpose'    => 'nullable|string|max:255',
        ]);

        // Check for time conflicts
        $conflict = Booking::where('room_id', $room->id)
            ->where('date', $data['date'])
            ->where(function ($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time',   [$data['start_time'], $data['end_time']]);
            })->exists();

        if ($conflict) {
            return back()->withErrors(['Room is already booked for this time slot.']);
        }

        // Create booking
        Booking::create([
            'room_id'    => $room->id,
            'user_id'    => $request->user()->id,
            'date'       => $data['date'],
            'start_time' => $data['start_time'],
            'end_time'   => $data['end_time'],
            'purpose'    => $data['purpose'],
        ]);

        return redirect()->route('rooms.index')
                         ->with('success', 'Room booked successfully!');
    }
}

