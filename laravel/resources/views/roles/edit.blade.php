@extends('layouts.app')

@section('content')
<h2>Edit Role</h2>
<form method="POST" action="{{ route('roles.update', $role) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Permissions</label><br>
        @foreach($permissions as $perm)
            <input type="checkbox" name="permissions[]" value="{{ $perm->name }}" {{ in_array($perm->name, $rolePermissions) ? 'checked' : '' }}> {{ $perm->name }}<br>
        @endforeach
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
