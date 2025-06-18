<nav class="navbar bg-white shadow-sm px-3 d-flex justify-content-end align-items-center fixed-top" style="left: 70px; right: 0; z-index: 1030;">
    <div class="d-flex align-items-center dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle px-3 py-2 bg-light rounded shadow-sm"
           id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
            <img src="{{ asset('images/admin.png') }}" alt="Admin" class="rounded-circle me-2" style="width: 32px; height: 32px;">
            <span>Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
            <li>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
