<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <p>Welcome to your Dashboard! Use the navigation to access rooms and bookings.</p>
                    <div class="mt-4">
                        <a href="{{ route('rooms.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            View All Rooms
                        </a>
                    </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
