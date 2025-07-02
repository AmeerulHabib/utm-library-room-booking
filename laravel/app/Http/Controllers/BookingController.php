<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin' || $user->role === 'staff') {
            $bookings = Booking::with(['room', 'user'])->latest()->get();
        } else {
            $bookings = Booking::with(['room', 'user'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rooms = Room::all();
        return view('bookings.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'notes' => 'nullable|string',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $validated['room_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $this->authorize('update', $booking);

        $rooms = Room::all();
        return view('bookings.edit', compact('booking', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($booking)
    {
        $this->authorize('delete', $booking);

        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }

    public function approve(Booking $booking)
    {
        $this->authorize('update', $booking);
        $booking->update(['status' => 'approved']);
        return redirect()->route('bookings.index')->with('success', 'Booking approved successfully.');
    }

    public function reject(Booking $booking)
    {
        $this->authorize('update', $booking);
        $booking->update(['status' => 'rejected']);
        return redirect()->route('bookings.index')->with('success', 'Booking rejected successfully.');
    }
}
