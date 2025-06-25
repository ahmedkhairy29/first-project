@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border">
        <div class="card-header text-center">
            <h6 class="mb-0 fw-bold">عنّا / About Us</h6>
        </div>

        <div class="card-body">

            <form>
                
                <div class="mb-4 border rounded p-3">
                    <label for="details_ar" class="form-label fw-bold">التفاصيل (عربي)</label>
                    <textarea id="details_ar" class="form-control border" rows="5" readonly>{{ $aboutUs->details_ar ?? '' }}</textarea>
                </div>

                
                <div class="mb-4 border rounded p-3">
                    <label for="details_en" class="form-label fw-bold">Details (English)</label>
                    <textarea id="details_en" class="form-control border" rows="5" readonly>{{ $aboutUs->details_en ?? '' }}</textarea>
                </div>
                 <button type="submit" class="btn btn-success">messages.general.save</button>
            </form>

        </div>
    </div>
</div>
@endsection
