<div>
    <label for="name" class="block mb-2">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $room->name ?? '') }}" class="w-full rounded border p-2 mb-4" required>

    <label for="location" class="block mb-2">Location</label>
    <input id="location" type="text" name="location" value="{{ old('location', $room->location ?? '') }}" class="w-full rounded border p-2 mb-4">

    <label for="capacity" class="block mb-2">Capacity</label>
    <input id="capacity" type="number" name="capacity" value="{{ old('capacity', $room->capacity ?? '') }}" class="w-full rounded border p-2 mb-4">

    <label for="type" class="block mb-2">Type</label>
    <input id="type" type="text" name="type" value="{{ old('type', $room->type ?? '') }}" class="w-full rounded border p-2 mb-4">

    <label for="description" class="block mb-2">Description</label>
    <textarea id="description" name="description" class="w-full rounded border p-2 mb-4">{{ old('description', $room->description ?? '') }}</textarea>
</div>
