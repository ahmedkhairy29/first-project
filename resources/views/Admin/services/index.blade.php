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
        @forelse ($services as $service)
            <tr>
                <td>{{ $service->title_en }}</td>
                <td>{{ $service->description_en }}</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-3">No services found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
    <div class="text-muted small">
        Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} entries
    </div>
    <div>
        {{ $services->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
       </div>
    </div>
</div>
@endsection
