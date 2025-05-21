<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of rooms.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Display a specific room and its bookings for today.
     */
    public function show(Room $room)
    {
        $bookings = $room->bookings()
                         ->where('date', now()->toDateString())
                         ->get();

        return view('rooms.show', compact('room', 'bookings'));
    }
}
