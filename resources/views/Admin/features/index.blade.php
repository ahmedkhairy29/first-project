@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0">Features for “Standard Plan ”</h6>
        <a href="{{ route('admin.features.create', $package->id) }}" class="btn btn-success">Add new Feature</a>


    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Feature Name</th>
                    <th>Daily</th>
                    <th>Minute</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($features as $index => $feature)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $feature->name }}</td>
                        <td>
                            @if($feature->daily)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            {{ $feature->minute ?? '-' }}
                        </td>
                        <td>
                            {{ ucfirst($feature->type) }}
                        </td>
                      <td>
    <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-warning">Edit</a>

    <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No features found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
