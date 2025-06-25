@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-5">Contact Us</h6>
        
    </div>

    <div class="d-flex justify-content-end mb-3 align-items-center">
        <form method="GET" action="{{ route('admin.contact.index') }}" class="d-flex align-items-center" style="gap: 8px;">
            <label for="search" class="fw-bold mb-0">Search:</label>
            <input type="text" id="search" name="search"
                   value="{{ old('search', '') }}"
                   class="form-control form-control-sm"
                   style="width: 150px;" placeholder="">
        </form>
    </div>

    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>title</th>
                        <th>comment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center py-4">No data available in table</td>
                    </tr>
                </tbody>
            </table>
           <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
    <div class="text-muted small">
        Showing {{ $contacts->firstItem() ?? 0 }} to {{ $contacts->lastItem() ?? 0 }} of {{ $contacts->total() }} entries
    </div>
    <div>
        {!! $contacts->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-5') !!}
    </div>
</div>
        </div>
    </div> 
</div> 
@endsection
