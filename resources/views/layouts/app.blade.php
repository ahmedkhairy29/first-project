<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Matsync')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>


<div id="sidebar" class="sidebar collapsed">
    <div class="sidebar-header">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo00.png') }}" alt="Logo" style="height: 20px;">
            <span class="logo-text ms-2">Matsync</span>
        </div>

        <button id="toggleBtn" class="hamburger-btn hamburger-inside" onclick="toggleSidebar()">
            <i id="toggleIcon" class="bi bi-list"></i>
        </button>
    </div>

    <div class="menu-title">Menu</div>
    <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="bi bi-house-door"></i> <span>Dashboard</span></a>
    <a href="{{ route('admin.users.index') }}" class="nav-link"><i class="bi bi-people"></i> <span>Users</span></a>
    <a href="{{ route('admin.packages.index') }}" class="nav-link"><i class="bi bi-box-seam"></i><span>Packages</span></a>
    <a href="{{ route('admin.services.index') }}" class="nav-link"><i class="bi bi-list"></i><span>Services</span></a>
    <a href="{{ route('admin.contact.index') }}" class="nav-link"><i class="bi bi-telephone"></i> <span>Contact Us</span></a>
    <a href="{{ route('admin.about') }}" class="nav-link"><i class="bi bi-gear"></i> <span>About Us</span></a>
</div>


<button class="hamburger-btn hamburger-fixed" onclick="toggleSidebar()">
    <i id="toggleIconFixed" class="bi bi-list"></i>
</button>


<div id="main" class="main-content collapsed">

    
    <nav class="navbar bg-white shadow-sm px-3 d-flex justify-content-end align-items-center fixed-top collapsed" style="right: 0; z-index: 1030;">
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

    
     <div class="page-wrapper">
        <div class="page-content container-fluid mt-5 pt-4">
            @yield('content')
        </div>

        <hr class="m-0">
        <footer class="text-start text-muted small py-3 border-top ms-3">
            2025 © Matsync.
        </footer>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');
        const navbar = document.querySelector('.navbar');
        const icon = document.getElementById('toggleIcon');
        const fixedIcon = document.getElementById('toggleIconFixed');

        sidebar.classList.toggle('collapsed');
        main.classList.toggle('collapsed');

        const isCollapsed = sidebar.classList.contains('collapsed');
        if (isCollapsed) {
            navbar.classList.add('collapsed');
            navbar.classList.remove('expanded');
        } else {
            navbar.classList.remove('collapsed');
            navbar.classList.add('expanded');
        }
    }

    window.addEventListener('load', function () {
        document.getElementById('sidebar').classList.add('collapsed');
        document.getElementById('main').classList.add('collapsed');
        document.querySelector('.navbar').classList.add('collapsed');
    });
</script>

</body>
</html>
