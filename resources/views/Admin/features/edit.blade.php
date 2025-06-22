@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6>messages.packages.features.edit_title</h6>
            <a href="{{ route('admin.features.index', $feature->package_id) }}" class="btn btn-secondary btn-sm">messages.packages.features.back_to_index</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.features.update', $feature->id) }}">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Feature Name (English)</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $feature->name) }}" required>
                </div>
                 
                <div class="mb-3">
                    <label class="form-label">Feature Name (Arabic)</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $feature->name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description (English)</label>
                    <input type="text" name="Description" class="form-control" value="{{ old('Description', $feature->Description) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description (Arabic)</label>
                    <input type="text" name="Description" class="form-control" value="{{ old('Description', $feature->Description) }}" required>
                </div>

                {{-- Daily --}}
                <div class="mb-3">
                    <label class="form-label">Daily</label>
                    <select name="daily" class="form-select" required>
                        <option value="1" {{ $feature->daily ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$feature->daily ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                {{-- Minute --}}
                <div class="mb-3">
                    <label class="form-label">Minute</label>
                    <input type="number" name="minute" class="form-control" value="{{ old('minute', $feature->minute) }}">
                </div>

                {{-- Type --}}
                <div class="mb-3">
                    <label class="form-label">messages.features.Package_Type</label>
                    <select name="type" class="form-select" required>
                        <option value="">messages.Package.features.select_Type</option>
                            <option value="with Access Limits">with Access Limits</option>
                            <option value="without Access Limits">without Access Limits</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Feature</button>
            </form>
        </div>
    </div>
</div>
@endsection
