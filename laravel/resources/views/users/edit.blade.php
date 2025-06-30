@extends('layouts.app')

@section('content')
<h2>Edit User</h2>
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password (leave blank to keep current)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <div class="mb-3">
        <label>Roles</label><br>
        @foreach($roles as $role)
            <input type="checkbox" name="roles[]" value="{{ $role }}" {{ in_array($role, $userRoles) ? 'checked' : '' }}> {{ $role }}<br>
        @endforeach
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
