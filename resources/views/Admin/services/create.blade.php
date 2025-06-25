@extends('layouts.app')

@section('title', 'Add Service')

@section('content')
<div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0">messages.services.create_title</h6>
         <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
                    messages.services.back_to_index
                </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.services.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">messages.services.title_en</label>
        <input type="text" name="title_en" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">messages.services.title_ar</label>
        <input type="text" name="title_ar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">messages.services.description_en</label>
        <textarea name="description_en" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">messages.services.description_ar</label>
        <textarea name="description_ar" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">messages.services.submit_create</button>
</form>

    </div>
</div>
@endsection
