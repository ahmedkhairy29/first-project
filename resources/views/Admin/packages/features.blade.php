@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Manage Features - {{ $package->name }}</h5>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary btn-sm">← Back</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.packages.features.store', $package->id) }}" class="mb-3 d-flex" style="gap: 8px;">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="Enter new feature..." required>
                <button class="btn btn-success">Add</button>
            </form>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Feature Name</th>
                        <th>Status</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $index => $feature)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $feature->name }}</td>
                            <td>
                                @if($feature->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this feature?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($features->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">No features found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
