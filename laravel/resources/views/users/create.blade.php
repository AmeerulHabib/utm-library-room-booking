@extends('layouts.app')

@section('content')
<h2>Create User</h2>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Roles</label><br>
        @foreach($roles as $role)
            <input type="checkbox" name="roles[]" value="{{ $role }}"> {{ $role }}<br>
        @endforeach
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection
