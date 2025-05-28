<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Available Rooms
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="row">
              {{-- Only admins may manage rooms --}}
              @can('manage', App\Models\Room::class)
                <a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">
                  Add New Room
                </a>
              @endcan
              @foreach ($rooms as $room)
                <div class="col-md-4 mb-3">
                  <div class="card h-100 shadow-sm">
                    <div class="card-body">
                      <h4>{{ $room->name }}</h4>
                      <p>Location: {{ $room->location ?? '—' }}<br>Capacity: {{ $room->capacity }}</p>
                      <a href="{{ route('rooms.show', $room) }}" class="btn btn-primary">View & Book</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
