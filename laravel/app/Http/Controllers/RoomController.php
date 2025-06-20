<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // List all rooms
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // Show the form to create a new room
    public function create()
    {
        $this->authorize('create', Room::class);

        return view('rooms.create');
    }

    // Store a new room in the database
    public function store(Request $request)
    {
        $this->authorize('create', Room::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Room::create($validated);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

    // Display a single room's details
    public function show(Room $room)
    {
        // View is public per your policy, so no need for $this->authorize('view', $room);
        return view('rooms.show', compact('room'));
    }

    // Show the form to edit a room
    public function edit(Room $room)
    {
        $this->authorize('update', $room);

        return view('rooms.edit', compact('room'));
    }

    // Update a room in the database
    public function update(Request $request, Room $room)
    {
        $this->authorize('update', $room);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'type' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }

    // Delete a room
    public function destroy(Room $room)
    {
        $this->authorize('delete', $room);

        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
    }
}
