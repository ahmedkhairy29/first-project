<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
        }

        .left-panel {
            flex: 1;
            background-color: #f8fafc;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .login-logo {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1e293b;
            text-align: center;
        }

        .left-panel h2 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e293b;
            font-size: 1.5rem;
            text-align: center;
        }

        .left-panel p {
            margin-bottom: 2rem;
            color: #64748b;
            text-align: center;
            font-size: 0.95rem;
        }

        .right-panel {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1555949963-aa79dcee981d') no-repeat center center;
            background-size: cover;
            position: relative;
            display: none;
        }

        .right-panel::after {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(79, 70, 229, 0.7); /* indigo overlay */
        }

        .form-label {
            font-weight: 500;
            color: #475569;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            margin-bottom: 1.25rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-login {
            background-color: #6366f1;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
            border: none;
            transition: background-color 0.2s;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #4f46e5;
        }

        .forgot-password {
            text-align: right;
            margin-top: -0.75rem;
            margin-bottom: 1.5rem;
        }

        .forgot-password a {
            color: #64748b;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: #6366f1;
        }

        .alert {
            margin-bottom: 1.5rem;
            border-radius: 8px;
        }

        @media (min-width: 992px) {
            .right-panel {
                display: block;
            }
            .left-panel {
                padding: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Left: Form -->
        <div class="left-panel">
            <div class="login-container">
                <div class="login-logo">
                    <div class="d-flex align-items-center mb-4">
    <img src="{{ asset('images/logo.png') }}" alt="Matsync Logo" style="height: 40px; width: auto;">
    <span class="ms-0.5 fw-bold fs-5 text-dark">Matsync</span>
</div>
                </div>
                <h2>Welcome Back!</h2>
                <p>Sign in to continue to Minia.</p>

                <form method="POST" action="{{ route('user.login') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn btn-login">Log In</button>
                </form>
            </div>
        </div>

        <!-- Right: Background Image (visible only on large screens) -->
        <div class="right-panel"></div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
