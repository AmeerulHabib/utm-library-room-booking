<div>
    <label for="room_id" class="block mb-2">Room</label>
    <select id="room_id" name="room_id" class="w-full rounded border p-2 mb-4" required>
        <option value="">Select a room</option>
        @foreach ($rooms as $room)
            <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id ?? '') == $room->id ? 'selected' : '' }}>
                {{ $room->name }}
            </option>
        @endforeach
    </select>

    <label for="start_time" class="block mb-2">Start Time</label>
    <input id="start_time" type="datetime-local" name="start_time"
        value="{{ old('start_time', isset($booking->start_time) ? \Illuminate\Support\Carbon::parse($booking->start_time)->format('Y-m-d\TH:i') : '') }}"
        class="w-full rounded border p-2 mb-4" required>

    <label for="end_time" class="block mb-2">End Time</label>
    <input id="end_time" type="datetime-local" name="end_time"
        value="{{ old('end_time', isset($booking->end_time) ? \Illuminate\Support\Carbon::parse($booking->end_time)->format('Y-m-d\TH:i') : '') }}"
        class="w-full rounded border p-2 mb-4" required>

    <label for="notes" class="block mb-2">Notes</label>
    <textarea id="notes" name="notes" class="w-full rounded border p-2 mb-4">{{ old('notes', $booking->notes ?? '') }}</textarea>
</div>
