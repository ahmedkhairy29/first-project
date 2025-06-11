<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", sans-serif;
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
        }

        .left-panel {
            flex: 1;
            background-color: #fff;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-panel h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .left-panel p {
            margin-bottom: 30px;
            color: #888;
        }

        .right-panel {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1555949963-aa79dcee981d') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .right-panel::after {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(63, 81, 181, 0.7); /* blue overlay */
        }

        .form-control {
            margin-bottom: 20px;
            padding: 12px;
        }

        .login-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #5a5a5a;
        }

        .btn-login {
            background-color: #5d5fef;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Left Side: Form -->
        <div class="left-panel">
            <div class="login-logo">minia</div>
            <h2>Welcome Back!</h2>
            <p>Sign in to continue to Minia.</p>

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>

                <button type="submit" class="btn btn-login w-100">Log In</button>
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="right-panel"></div>
    </div>
</body>
</html>
