<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Room $room)
    {
        // Authorize that the user may create a booking
        $this->authorize('create', Booking::class);
        return view('bookings.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        // Authorize booking creation
        $this->authorize('create', Booking::class);

        $data = $request->validate([
            'date'       => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time'   => 'required|date_format:H:i|after:start_time',
            'purpose'    => 'nullable|string|max:255',
        ]);

        $conflict = Booking::where('room_id', $room->id)
            ->where('date', $data['date'])
            ->where(function($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time',   [$data['start_time'], $data['end_time']]);
            })->exists();

        if ($conflict) {
            return back()->withErrors(['time' => 'Selected time slot is already booked.'])->withInput();
        }

        Booking::create([
            'room_id'   => $room->id,
            'user_id'   => Auth::id(),
            'date'      => $data['date'],
            'start_time'=> $data['start_time'],
            'end_time'  => $data['end_time'],
            'purpose'   => $data['purpose'],
        ]);

        return redirect()->route('rooms.show', $room)
                         ->with('success', 'Booking confirmed successfully.');
    }

    public function edit(Booking $booking)
    {
        // Authorize that the user may update this booking
        $this->authorize('update', $booking);
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        // Authorize booking update
        $this->authorize('update', $booking);

        $data = $request->validate([
            'date'       => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time'   => 'required|date_format:H:i|after:start_time',
            'purpose'    => 'nullable|string|max:255',
        ]);

        $conflict = Booking::where('room_id', $booking->room_id)
            ->where('date', $data['date'])
            ->where('id', '!=', $booking->id)
            ->where(function($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time',   [$data['start_time'], $data['end_time']]);
            })->exists();

        if ($conflict) {
            return back()->withErrors(['time' => 'Selected time slot is already booked.'])->withInput();
        }

        $booking->update($data);

        return redirect()->route('rooms.show', $booking->room)
                         ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        // Authorize booking deletion
        $this->authorize('delete', $booking);
        $room = $booking->room;
        $booking->delete();

        return redirect()->route('rooms.show', $room)
                         ->with('success', 'Booking canceled successfully.');
    }
}
