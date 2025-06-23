@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-5">messages.services.index.title</h6>
        <a href="{{ route('admin.services.create') }}" class="btn btn-success">
            <i class=""></i> messages.services.index.create_buttom
        </a>
    </div>
    <div class="d-flex justify-content-end mb-3 align-items-center">
    <form method="GET" action="{{ route('admin.services.index') }}" class="d-flex align-items-center" style="gap: 8px;">
        <label for="search" class="fw-bold mb-0">Search:</label>
        <input type="text" id="search" name="search"
               value="{{ old('search', '') }}"
               class="form-control form-control-sm"
               style="width: 150px;" placeholder="">
    </form>
</div>

    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $index => $service)
                        <tr>
                            
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this package?')">Delete</button>
        </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
