@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6>{{ __('messages.services.edit_title') }}</h6>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">
                {{ __('messages.services.back_to_index') }}
            </a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.services.title_en') }}</label>
                    <input type="text" name="title_en" class="form-control" placeholder="Directions API" value="{{ old('title_en', $service->title_en) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.services.title_ar') }}</label>
                    <input type="text" name="title_ar" class="form-control" placeholder="خدمة الاتجاهات" value="{{ old('title_ar', $service->title_ar) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.services.description_en') }}</label>
                    <input type="text" name="description_en" class="form-control" placeholder="Plan efficient routes..." value="{{ old('description_en', $service->description_en) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.services.description_ar') }}</label>
                    <input type="text" name="description_ar" class="form-control" placeholder="خطط لمسارات فعالة..." value="{{ old('description_ar', $service->description_ar) }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('messages.services.submit_update') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
