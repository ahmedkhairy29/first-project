@extends('layouts.app')

@section('title', 'Add Service')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Add New Service</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.services.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
