@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    
    <div class="d-flex justify-content-between align-items-center px-3 pt-3">
        <h5 class="mb-0">Packages</h5>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-success">+ Create New Package</a>
    </div>

    
    <hr class="my-2">

   
    <div class="d-flex justify-content-end mb-2 px-3">
        <form method="GET" action="{{ route('admin.packages.index') }}" class="d-flex align-items-center" style="gap: 8px;">
            <label for="search" class="fw-bold mb-0">Search:</label>
            <input type="text" id="search" name="search"
                   value="{{ old('search', '') }}"
                   class="form-control form-control-sm"
                   style="width: 150px;" placeholder="">
        </form>
    </div>
    <table class="table table-bordered w-100 me-auto">

        <thead>
            <tr>
                <th style="width: 70px;">#<i class="bi bi-chevron-expand float-end"></i></th>
                <th>Name (en)<i class="bi bi-chevron-expand float-end"></i></th>
                <th>Price/Request<i class="bi bi-chevron-expand float-end"></i></th>
                <th style="width: 100px;">Photo<i class="bi bi-chevron-expand float-end"></i></th>
                <th style="width: 300px;">Type<i class="bi bi-chevron-expand float-end"></i></th>
                <th style="width: 300px;">Actions<i class="bi bi-chevron-expand float-end"></i></th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $index => $package)
                <tr>
    <td>{{ $packages->firstItem() + $index }}</td>
    <td>{{ $package->name }}</td>
    <td>{{ $package->price }}</td>
    <td>
    @if($package->photo)
        <img src="{{ asset('storage/' . $package->photo) }}" alt="Package Photo" style="width: 50px; height: 50px; object-fit: cover;">
    @else
        <img src="{{ asset('images/default.png') }}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
    @endif
</td>
    <td>{{ $package->type }}</td>
    <td> 
        <a href="{{ route('admin.features.index', $package->id) }}" class="btn btn-primary">Manage Features</a>
<a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
     <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this package?')">Delete</button>
        </form>
    </td>
</tr>
          @empty
                <tr><td colspan="6" class="text-center">No packages found.</td></tr>
            @endforelse
        </tbody>
    </table>
   <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
    <div class="text-muted small">
        Showing {{ $packages->firstItem() }} to {{ $packages->lastItem() }} of {{ $packages->total() }} entries
    </div>
    <div>
        {{ $packages->withQueryString()->links('pagination::bootstrap-5') }}

    </div>
</div>

</div>
</div>
@endsection
