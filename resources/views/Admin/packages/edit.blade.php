@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Edit Package</h5>
            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary btn-sm">← Back</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.packages.update', $package->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Name --}}
                <div class="mb-3">
                    <label class="form-label">Package Name (English)</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required>
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label">Price per Request</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
                </div>

                {{-- Type --}}
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select" required>
                        <option value="">-- Select Type --</option>
                        <option value="free" {{ $package->type == 'free' ? 'selected' : '' }}>Free</option>
                        <option value="paid" {{ $package->type == 'paid' ? 'selected' : '' }}>Paid</option>
                    </select>
                </div>

                {{-- Photo --}}
                <div class="mb-3">
                    <label class="form-label">Current Photo</label><br>
                    @if ($package->photo)
                        <img src="{{ asset('storage/' . $package->photo) }}" alt="Photo" class="img-thumbnail mb-2" style="width: 100px;">
                    @else
                        <p>No image uploaded.</p>
                    @endif
                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Optional: upload new photo</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Package</button>
            </form>
        </div>
    </div>
</div>
@endsection
