@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Create New Package</h5>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary btn-sm">
                    ← Back to Packages
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name_en" class="form-label">Name (English)</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                        <input type="text" name="name_ar" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Price per Request</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Photo (optional)</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">Package Type</label>
                        <select name="type" class="form-select" required>
                            <option value="">Select Type</option>
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Create Package</button>
                </form>
            </div>
        </div>
    </div>
@endsection
