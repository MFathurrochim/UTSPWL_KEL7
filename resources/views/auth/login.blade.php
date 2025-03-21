<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Inventaris</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Header styles */
        .site-header {
            background-color: #dc0a2d;
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .site-header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        /* Main content area */
        .main-content {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }

        /* Background image overlay */
        .bg-image-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .bg-image {
            width: 100%;
            height: 100%;
            background-image: url('https://garuda.industry.co.id/uploads/berita/detail/49702.jpg');
            background-size: cover;
            background-position: center;
            filter: brightness(0.4);
            /* Membuat gambar lebih gelap */
            z-index: -1;
        }

        /* Login card */
        .login-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            overflow: hidden;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        .login-card-header {
            background-color: #dc0a2d;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .login-card-header h2 {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .login-card-header p {
            margin-bottom: 0;
            opacity: 0.9;
        }

        .login-card-body {
            padding: 20px;
        }

        /* Form controls */
        .form-label {
            font-weight: 500;
            color: #333;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            height: 38px;
            font-size: 14px;
        }

        .form-control {
            border-left: none;
            height: 38px;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .btn-login {
            background-color: #dc0a2d;
            color: white;
            padding: 8px 0;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #b8001e;
            color: white;
        }

        .forgot-password {
            color: #6c757d;
            text-decoration: none;
            font-size: 13px;
        }

        .forgot-password:hover {
            color: #dc0a2d;
            text-decoration: underline;
        }

        .register-link a {
            color: #dc0a2d;
            font-weight: 500;
            font-size: 13px;
            text-decoration: none;
        }

        .register-link a:hover {
            font-size: 13px;
            text-decoration: underline;
        }

        /* Page title */
        .page-title {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 10;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* Footer styles */
        .site-footer {
            background-color: #212529;
            color: #ffffff;
            padding: 15px 0;
            font-size: 14px;
            width: 100%;
        }

        .site-footer a {
            color: #ffc107;
            text-decoration: none;
        }

        .site-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h5 mb-0">Sistem Manajemen Inventaris</h1>
                <div>
                    <a href="{{ route('login') }}" class="auth-link">Login</a>
                    <a href="{{ route('register') }}" class="auth-link">Register</a>
                </div>
            </div>
        </div>
    </header>

    <script>
        // Pastikan script ini dijalankan setelah dokumen dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan style langsung ke head
            var style = document.createElement('style');
            style.innerHTML = `
            .auth-link {
                display: inline-block !important;
                padding: 8px 15px !important;
                margin-left: 10px !important;
                text-decoration: none !important;
                border-radius: 4px !important;
                transition: all 0.3s ease !important;
                position: relative !important;
            }
            
            .auth-link:hover {
                background-color: rgba(255, 215, 0, 0.3) !important; /* Kotak transparan kuning */
                color: #FFD700 !important; /* Warna teks menjadi kuning */
                box-shadow: 0 0 5px rgba(255, 215, 0, 0.5) !important;
            }
        `;
            document.head.appendChild(style);
        });
    </script>

    <!-- Main Content -->
    <main class="main-content">
        <div class="bg-image-container">
            <div class="bg-image"></div>
        </div>

        <h2 class="page-title">Sistem Informasi Manajemen Inventaris Barang</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="login-card">
                        <div class="login-card-header">
                            <h2>{{ __('Login') }}</h2>
                            <p>Masuk ke Sistem Manajemen Inventaris</p>
                        </div>

                        <div class="login-card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
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
                                <div class="mb-4">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
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
                                <div class="mb-4 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-login">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Login') }}
                                    </button>
                                </div>

                                <!-- Password Reset Link -->
                                @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                </div>
                                @endif

                                <!-- Register Link -->
                                <div class="register-link text-center mt-3">
                                    <p>Belum punya akun? <a href="{{ route('register') }}">Register disini</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">Back to Page: <a href="Halaman Utama">Halaman Utama</a></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">© 2025| Nawrah Chyntia | Vivi Erlina | M.Fathurrochim.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>