{{-- resources/views/rooms/show.blade.php --}}
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

          @can('create', App\Models\Booking::class)
            <form method="POST" action="{{ route('bookings.store', $room) }}">
              @csrf
              <div class="grid grid-cols-1 gap-4">

                {{-- Date --}}
                <div>
                  <label for="date" class="block">Date</label>
                  <input
                    id="date"
                    name="date"
                    type="date"
                    value="{{ old('date') }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md {{ $errors->has('date') ? 'border-red-600' : '' }}"
                  >
                  @if($errors->has('date'))
                    <span class="text-red-600 text-sm">{{ $errors->first('date') }}</span>
                  @endif
                </div>

                {{-- Start Time --}}
                <div>
                  <label for="start_time" class="block">Start Time</label>
                  <input
                    id="start_time"
                    name="start_time"
                    type="time"
                    value="{{ old('start_time') }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md {{ $errors->has('start_time') ? 'border-red-600' : '' }}"
                  >
                  @if($errors->has('start_time'))
                    <span class="text-red-600 text-sm">{{ $errors->first('start_time') }}</span>
                  @endif
                </div>

                {{-- End Time --}}
                <div>
                  <label for="end_time" class="block">End Time</label>
                  <input
                    id="end_time"
                    name="end_time"
                    type="time"
                    value="{{ old('end_time') }}"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md {{ $errors->has('end_time') ? 'border-red-600' : '' }}"
                  >
                  @if($errors->has('end_time'))
                    <span class="text-red-600 text-sm">{{ $errors->first('end_time') }}</span>
                  @endif
                </div>

                {{-- Purpose --}}
                <div>
                  <label for="purpose" class="block">Purpose</label>
                  <input
                    id="purpose"
                    name="purpose"
                    type="text"
                    value="{{ old('purpose') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md {{ $errors->has('purpose') ? 'border-red-600' : '' }}"
                  >
                  @if($errors->has('purpose'))
                    <span class="text-red-600 text-sm">{{ $errors->first('purpose') }}</span>
                  @endif
                </div>

                {{-- Submit --}}
                <div>
                  <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">
                    Book Room
                  </button>
                </div>

              </div>
            </form>
          @endcan

          <h3 class="mt-8">Today's Bookings</h3>
          <ul class="list-disc pl-5">
            @forelse ($bookings as $b)
              <li>
                {{ \Carbon\Carbon::parse($b->start_time)->format('H:i') }}
                 – {{ \Carbon\Carbon::parse($b->end_time)->format('H:i') }}
                 by {{ $b->user->name }}
              </li>
            @empty
              <li>No bookings for today.</li>
            @endforelse
          </ul>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
