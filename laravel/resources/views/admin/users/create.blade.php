<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add New User
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <label class="block mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full mb-4 rounded border p-2">

                    <label class="block mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full mb-4 rounded border p-2">

                    <label class="block mb-2">Role</label>
                    <select name="role" class="w-full mb-4 rounded border p-2" required>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user" selected>User</option>
                    </select>

                    <label class="block mb-2">Password</label>
                    <input type="password" name="password" required class="w-full mb-4 rounded border p-2">
                    <label class="block mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="w-full mb-4 rounded border p-2">

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Create User
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
