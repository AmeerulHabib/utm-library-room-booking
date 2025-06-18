<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit User
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
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <label class="block mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full mb-4 rounded border p-2">

                    <label class="block mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full mb-4 rounded border p-2">

                    <label class="block mb-2">Role</label>
                    <select name="role" class="w-full mb-4 rounded border p-2" required>
                        <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                        <option value="staff" @if($user->role == 'staff') selected @endif>Staff</option>
                        <option value="user" @if($user->role == 'user') selected @endif>User</option>
                    </select>

                    <label class="block mb-2">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="w-full mb-4 rounded border p-2">
                    <label class="block mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="w-full mb-4 rounded border p-2">

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
