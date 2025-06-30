@extends('layouts.app')

@section('content')
<h2>Roles</h2>
<a href="{{ route('roles.create') }}" class="btn btn-primary mb-2">Add Role</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                @foreach($role->permissions as $perm)
                    <span class="badge bg-info">{{ $perm->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
