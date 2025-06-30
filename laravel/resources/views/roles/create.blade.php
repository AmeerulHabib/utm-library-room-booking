@extends('layouts.app')

@section('content')
<h2>Create Role</h2>
<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Permissions</label><br>
        @foreach($permissions as $perm)
            <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"> {{ $perm->name }}<br>
        @endforeach
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection
