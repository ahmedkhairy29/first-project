<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Matsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background-color: transparent;
        }

        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 260px;
            background-color: #f8f9fc;
            border-right: 1px solid #dee2e6;
            transition: width 0.3s;
            overflow: hidden;
            z-index: 1040;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #f8f9fc !important;
        }

        .sidebar-header img {
            height: 24px;
            width: auto;
        }

        .sidebar .logo-text {
            font-weight: bold;
            font-size: 1rem;
            margin-left: 0.5rem;
        }

        .sidebar.collapsed .logo-text,
        .sidebar.collapsed .menu-title,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .menu-title {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: bold;
            
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            gap: 10px;
            
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            
        }

              

        
        .main-content {
            margin-left: 260px;
            padding-top: 56px;
            transition: margin-left 0.3s;
        }

        .main-content.collapsed {
            margin-left: 70px;
        }

        
        .hamburger-btn {
            background-color: transparent;
            border: none;
            padding: 6px;
            border-radius: 5px;
            font-size: 1.2rem;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .hamburger-btn:hover {
            background-color: #f1f1f1;
        }

       
        .hamburger-inside {
            display: block;
        }

       
        .hamburger-fixed {
            position: fixed;
            top: 12px;
            left: 75px;
            z-index: 1050;
            background: none;
            border: none;
            font-size: 1.4rem;
            color: #000;
            font-weight: bold;
            padding: 0;
            box-shadow: none;
        }
        
        .sidebar:not(.collapsed) ~ .hamburger-fixed {
            display: none !important;
        }

        .sidebar.collapsed .hamburger-inside {
            display: none !important;
        }

        
        .navbar {
            height: 56px;
        }   
        .dashboard-boxes {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.dashboard-box {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-left: 4px solidrgb(247, 248, 250);
}

.dashboard-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.box-title {
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 10px;
    font-weight: 600;
}

.box-value {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 5px;
}

.box-icon {
    font-size: 24px;
    color:rgb(248, 249, 250);
    margin-bottom: 10px;
}

.box-footer {
    font-size: 12px;
    color: #6c757d;
    border-top: 1px solid #eee;
    padding-top: 10px;
    margin-top: 10px;
}        



    </style>
</head>

<body>


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


<div id="main" class="main-content collapsed">
    
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
    <div class="container-fluid">
    
    
    <div class="dashboard-boxes">
        
        <div class="dashboard-box">
            <div class="box-icon">
                
            </div>
            <div class="box-title">Users</div>
            <div class="box-value">0</div>
           
        </div>
        
        
        <div class="dashboard-box">
            <div class="box-icon">
                
            </div>
            <div class="box-title">Packages</div>
            <div class="box-value">0</div>
            
        </div>
        
        
        <div class="dashboard-box">
            <div class="box-icon">
                
            </div>
            <div class="box-title">Services</div>
            <div class="box-value">0</div>
            
        </div>
        
        
    
   
</div>

    
    <main class="p-4 mt-5">
        @yield('content')
    </main>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');
        const icon = document.getElementById('toggleIcon');
        const fixedIcon = document.getElementById('toggleIconFixed');

        sidebar.classList.toggle('collapsed');
        main.classList.toggle('collapsed');

        const isCollapsed = sidebar.classList.contains('collapsed');
        icon.className = isCollapsed ? 'bi bi-list' : 'bi bi-list';
        fixedIcon.className = isCollapsed ? 'bi bi-list' : 'bi bi-list';
    }

    
    window.addEventListener('load', function () {
        document.getElementById('sidebar').classList.add('collapsed');
        document.getElementById('main').classList.add('collapsed');
    });
</script>
</body>
</html>
