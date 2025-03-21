@extends('layouts.app')

@section('content')
<div class="login-page">
    <div class="login-container" style="background-image: url('https://garuda.industry.co.id/uploads/berita/detail/49702.jpg'); background-color: #2c3e50;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="login-card">
                        <div class="login-card-header">
                            <h2>Login</h2>
                            <p>Masuk ke Sistem Manajemen Inventaris</p>
                        </div>

                        <div class="login-card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ route('home') }}">

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback d-block text-warning" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Masukkan password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback d-block text-warning" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-login">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                    </button>
                                </div>

                                <!-- Password Reset Link -->
                                @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="forgot-password" href="{{ route('password.request') }}">
                                        Lupa Password?
                                    </a>
                                </div>
                                @endif

                                <!-- Register Link -->
                                <div class="register-link text-center">
                                    <p>Belum punya akun? <a href="{{ route('register') }}">Register disini</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Override styles to fix the issues */
    .login-container {
        position: relative;
        background-size: cover;
        background-position: center;
        min-height: calc(100vh - 140px);
        /* Adjust based on navbar and footer height */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .login-card {
        background: rgba(40, 40, 40, 0.8);
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        position: relative;
        z-index: 10;
        max-width: 450px;
        margin: 0 auto;
    }

    .login-card-header {
        background: rgba(217, 4, 41, 0.8);
        color: white;
        text-align: center;
        padding: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .login-card-body {
        padding: 25px;
        color: white;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 10px 15px;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        color: white;
        border-color: #ffb703;
        box-shadow: 0 0 0 0.25rem rgba(255, 183, 3, 0.25);
    }

    .input-group-text {
        background: rgba(217, 4, 41, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .btn-login {
        background: linear-gradient(to right, #d90429, #ef233c);
        border: none;
        color: white;
        padding: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background: linear-gradient(to right, #ef233c, #d90429);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(239, 35, 60, 0.4);
        color: white;
    }

    .forgot-password,
    .register-link a {
        color: #ffb703;
        font-weight: 600;
    }

    .forgot-password:hover,
    .register-link a:hover {
        color: #ffdd00;
    }

    .form-check-input:checked {
        background-color: #d90429;
        border-color: #d90429;
    }
</style>
@endsection