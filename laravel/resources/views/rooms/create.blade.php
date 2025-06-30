@extends('layouts.app')

@section('content')
<h2>Create Room</h2>
<form method="POST" action="{{ route('rooms.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control">
    </div>
    <div class="mb-3">
        <label>Capacity</label>
        <input type="number" name="capacity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection
