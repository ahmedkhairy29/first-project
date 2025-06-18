@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')
<div class="auth-wrapper">
    <div class="auth-left">
        <div class="auth-form">
            <div class="logo justify-content-center">
                <div style="display: flex; align-items: center;">
                    <img src="{{ asset('images/logo-symbol.png') }}" alt="Logo Symbol" class="logo-img" style="height: 40px; margin-right: 8px;">
                    <span class="logo-text">MATSYNC</span>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.login') }}">
                <h4 class="text-center mb-1">Welcome Back!</h4>
                <p class="text-center text-muted mb-4">Sign in to continue to Minia.</p>
                @csrf

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label d-flex justify-content-between">
                        <span>Password</span>
                        <a href="#" class="text-decoration-none small text-muted">Forgot password?</a>
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        <span class="input-group-text bg-light toggle-password" onclick="togglePassword()">
                            <i class="mdi mdi-eye-outline" id="toggle-icon"></i>
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
@endsection
