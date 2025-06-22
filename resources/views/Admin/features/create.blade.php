@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6>messages.packages.features.create_title</h6>
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary btn-sm">
                    messages.packages.features.back_to_index
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.features.store', $package->id) }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name_en" class="form-label">Feature Name (English)</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Feature Name (Arabic)</label>
                        <input type="text" name="name_ar" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label">Description (English)</label>
                        <input type="text" name="Description" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Description (Arabic)</label>
                        <input type="text" name="Description" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">daily</label>
                        <input type="text" name="daily" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">minute</label>
                        <input type="number" name="minute" class="form-control">
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">messages.features.Package_Type</label>
                        <select name="type" class="form-select" required>
                            <option value="">messages.Package.features.select_Type</option>
                            <option value="with Access Limits">with Access Limits</option>
                            <option value="without Access Limits">without Access Limits</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">messages.packages.features.submit_create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

