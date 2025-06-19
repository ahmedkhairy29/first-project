@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit User</h4>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input name="name" type="text" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password (leave blank if unchanged)</label>
            <input name="password" type="password" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
