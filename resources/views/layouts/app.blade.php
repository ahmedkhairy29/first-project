<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Matsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">

    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    @include('partials.sidebar')

    @include('partials.header')

    <div id="main" class="main-content collapsed">
        <div class="container-fluid mt-5 pt-3">
            @yield('content')
        </div>
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
