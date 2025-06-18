<div id="sidebar" class="sidebar collapsed">
    <div class="sidebar-header">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo" style="height: 15px;">
            <span class="logo-text ms-2">Matsync</span>
        </div>

        <button id="toggleBtn" class="hamburger-btn hamburger-inside" onclick="toggleSidebar()">
            <i id="toggleIcon" class="bi bi-list"></i>
        </button>
    </div>

    <div class="menu-title">Menu</div>
    <a href="#" class="nav-link"><i class="bi bi-house"></i> <span>Dashboard</span></a>
    <a href="#" class="nav-link"><i class="bi bi-person"></i> <span>Users</span></a>
    <a href="#" class="nav-link"><i class="bi bi-grid"></i> <span>Packages</span></a>
    <a href="#" class="nav-link"><i class="bi bi-menu-button-wide"></i> <span>Services</span></a>
    <a href="#" class="nav-link"><i class="bi bi-telephone"></i> <span>Contact Us</span></a>
    <a href="#" class="nav-link"><i class="bi bi-gear"></i> <span>About Us</span></a>
</div>

<button class="hamburger-btn hamburger-fixed" onclick="toggleSidebar()">
    <i id="toggleIconFixed" class="bi bi-list"></i>
</button>
