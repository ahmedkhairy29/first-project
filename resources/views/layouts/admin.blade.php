<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Matsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            height: 100vh;
            background-color: #f5f7fb;
            padding-top: 1rem;
        }
        .sidebar a {
            display: block;
            padding: 1rem;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #e0e0e0;
        }
        .navbar-profile {
            display: flex;
            align-items: center;
        }
        .navbar-profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <a href="#"><i class="bi bi-house"></i></a>
        <a href="#"><i class="bi bi-people"></i></a>
        <a href="#"><i class="bi bi-grid"></i></a>
        <a href="#"><i class="bi bi-telephone"></i></a>
        <a href="#"><i class="bi bi-gear"></i></a>
    </div>

    <!-- Content -->
    <div class="flex-grow-1">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4">
            <div class="ms-auto navbar-profile">
                <img src="{{ asset('images/admin.png') }}" alt="Admin Photo">
                <span>Admin <i class="bi bi-caret-down-fill"></i></span>
            </div>
        </nav>

        <!-- Content Area -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>

