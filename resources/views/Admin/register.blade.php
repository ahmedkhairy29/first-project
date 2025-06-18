<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin register | Matsync</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts + Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        .auth-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .auth-left {
            flex: 1.3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background-color: #f8f9fa;
        }

        .auth-form {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    max-width: 900px;
    background: white;
    padding: 3rem 2.5rem 4rem 2.5rem;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    min-height: 550px;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
}
           

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .logo-img {
            height: 40px;
        }

        .logo-text {
            font-weight: 600;
            font-size: 1.2rem;
            color: #000;
            line-height: 1;
        }

        .auth-form h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
        }

        .auth-form p {
            text-align: center;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .auth-form .mb-3 {
            margin-bottom: 2.25rem;
        }

        .form-label {
            font-weight: 500;
        }

        .input-group .btn-toggle {
            background: transparent;
            border: none;
        }

        .auth-right {
            flex: 3;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .blue-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 255, 0.3);
            pointer-events: none;
        }

        .auth-right img {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        @media (min-width: 992px) {
            .auth-right {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-left">
        <div class="auth-form">

            <div class="logo-container mb-4" style="padding-top: 3rem; padding-bottom: 3rem;">
    <div class="logo justify-content-center">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo3" class="logo-img" style="height: 40px; margin-right: 8px;">
            <span class="logo-text">MATSYNC</span>
        </div>
    </div>
</div>
            <!-- نموذج الدخول -->
            <form method="POST" action="{{ route('admin.register') }}">

            <h4 class="text-center mb-1">Register Account</h4>
    <p class="text-center text-muted mb-4">Get your free Minia Account Now</p>
                @csrf

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter email">
                </div>

                <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your name">
</div>

                <div class="mb-3">
                    <label for="password" class="form-label d-flex justify-content-between">
                        <span>Password</span>
                        
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        <span class="input-group-text bg-light toggle-password" onclick="togglePassword()">
                            <i class="mdi mdi-eye-outline" id="toggle-icon"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirm Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
        <span class="input-group-text bg-light toggle-password" onclick="toggleConfirmPassword()">
            <i class="mdi mdi-eye-outline" id="confirm-toggle-icon"></i>
        </span>
    </div>
</div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>
    </div>

    <div class="auth-right position-relative">
        <img src="{{ asset('images/login-bg.jpg') }}" alt="Login Background" class="img-fluid w-100">
        <div class="blue-overlay"></div>
    </div>
</div>

<!-- Toggle Password JS -->
<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggle-icon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('mdi-eye-outline');
            icon.classList.add('mdi-eye-off-outline');
        } else {
            password.type = 'password';
            icon.classList.remove('mdi-eye-off-outline');
            icon.classList.add('mdi-eye-outline');
        }
    }

    function toggleConfirmPassword() {
        const password = document.getElementById('password_confirmation');
        const icon = document.getElementById('confirm-toggle-icon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('mdi-eye-outline');
            icon.classList.add('mdi-eye-off-outline');
        } else {
            password.type = 'password';
            icon.classList.remove('mdi-eye-off-outline');
            icon.classList.add('mdi-eye-outline');
        }
    }
</script>

</body>
</html>