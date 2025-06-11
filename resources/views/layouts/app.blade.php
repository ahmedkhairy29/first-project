<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.sidebar') <!-- if you extract sidebar/menu -->
    <div class="main-content">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
