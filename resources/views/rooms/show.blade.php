<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $room->name }} — Book Now
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">

            <form method="POST" action="{{ route('bookings.store', $room) }}">
              @csrf
              <div class="grid grid-cols-1 gap-4">
                <div>
                  <label for="date" class="block">Date</label>
                  <input id="date" name="date" type="date" value="{{ old('date') }}" required class="mt-1 block w-full border-gray-300 rounded-md @error('date') border-red-600 @enderror">
                  @error('date')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>
                <div>
                  <label for="start_time" class="block">Start Time</label>
                  <input id="start_time" name="start_time" type="time" value="{{ old('start_time') }}" required class="mt-1 block w-full border-gray-300 rounded-md @error('start_time') border-red-600 @enderror">
                  @error('start_time')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>
                <div>
                  <label for="end_time" class="block">End Time</label>
                  <input id="end_time" name="end_time" type="time" value="{{ old('end_time') }}" required class="mt-1 block w-full border-gray-300 rounded-md @error('end_time') border-red-600 @enderror">
                  @error('end_time')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>
                <div>
                  <label for="purpose" class="block">Purpose</label>
                  <input id="purpose" name="purpose" type="text" value="{{ old('purpose') }}" class="mt-1 block w-full border-gray-300 rounded-md @error('purpose') border-red-600 @enderror">
                  @error('purpose')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
                </div>
                <div>
                  <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Book Room</button>
                </div>
              </div>
            </form>

            <h3 class="mt-8">Today's Bookings</h3>
            <ul class="list-disc pl-5">
              @forelse ($bookings as $b)
                <li>{{ \Carbon\Carbon::parse($b->start_time)->format('H:i') }} – {{ \Carbon\Carbon::parse($b->end_time)->format('H:i') }} by {{ $b->user->name }}</li>
              @empty
                <li>No bookings for today.</li>
              @endforelse
            </ul>

          </div>
        </div>
      </div>
    </div>
</x-app-layout>
