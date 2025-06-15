@extends('layouts.admin') {{-- هذا يعني أنه يستخدم قالب admin.blade.php الموجود داخل layouts --}}

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">users</h6>
                    <h4 class="mb-0">0</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">packages</h6>
                    <h4 class="mb-0">0</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">services</h6>
                    <h4 class="mb-0">0</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
