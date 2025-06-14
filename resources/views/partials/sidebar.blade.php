<!-- resources/views/partials/sidebar.blade.php -->
<nav class="d-flex flex-column bg-dark text-white vh-100 p-3" style="width: 250px;">
    <div class="mb-4">
        <h4 class="text-white">Admin Panel</h4>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dewaniya_categories.index') }}" class="nav-link text-white {{ request()->routeIs('admin.dewaniya_categories.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-collection me-2"></i> Main Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.dewaniya_sub_categories.index') }}" class="nav-link text-white {{ request()->routeIs('admin.dewaniya_sub_categories.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-list-ul me-2"></i> Sub Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.logout') }}" class="nav-link text-white">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </ul>
</nav>
