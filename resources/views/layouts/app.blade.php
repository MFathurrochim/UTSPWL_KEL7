<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Manajemen Inventory</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Styles & Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Reset & Base */
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-image: url('https://garuda.industry.co.id/uploads/berita/detail/49702.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        main::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(75, 64, 64, 0.85);
            z-index: 0;
        }

        main .container {
            position: relative;
            z-index: 1;
        }


        .navbar {
            background-color: #d90429;
            padding: 8px 0;
            /* Reduced padding for a more compact navbar */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: white !important;
            font-size: 20px;
            /* Slightly smaller font */
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: white !important;
            font-size: 14px;
            /* Smaller font size */
            font-weight: 600;
            padding: 4px 12px !important;
            /* Reduced padding */
            margin: 0 3px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #ffb703 !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Profile Image in Navbar */
        .profile-image {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.1);
            border-color: #ffb703;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown-toggle::after {
            display: none;
            /* Remove dropdown arrow */
        }

        /* Footer Styling */
        footer {
            background: #222;
            color: white;
            padding: 15px 0;
            margin-top: auto;
        }

        footer p {
            margin-bottom: 5px;
            font-size: 14px;
        }

        footer a {
            color: #ffb703;
            font-weight: 600;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffdd00;
            text-decoration: underline;
        }

        /* Login Page Styling - Full Screen Background */
        .login-page {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .login-container {
            background-image: url('https://images.unsplash.com/photo-1566041510639-8d95a2490bfb?q=80&w=1974&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            position: relative;
        }

        .login-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(3px);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .login-card-header {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-align: center;
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-card-header h2 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .login-card-header p {
            margin: 10px 0 0;
            opacity: 0.8;
            font-size: 16px;
        }

        .login-card-body {
            padding: 30px;
            color: white;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        /* Perubahan pada form-control untuk memperbaiki masalah visibilitas text */
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            /* Ubah background menjadi lebih opaque */
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #333;
            /* Ubah warna teks menjadi gelap */
            padding: 12px 15px;
            height: auto;
            font-size: 15px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 1);
            /* Background putih solid saat focus */
            box-shadow: 0 0 0 0.25rem rgba(217, 4, 41, 0.25);
            /* Tambah outline merah saat focus */
            border-color: rgba(217, 4, 41, 0.5);
            color: #333;
            /* Tetap gelap */
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
            /* Placeholder warna gelap transparan */
        }

        /* Untuk form input di luar login page */
        main .form-control {
            background: #fff;
            color: #333;
            border: 1px solid #ced4da;
        }

        main .form-control:focus {
            border-color: #d90429;
            box-shadow: 0 0 0 0.25rem rgba(217, 4, 41, 0.25);
        }

        main .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            color: #333;
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-check-input:checked {
            background-color: #ff416c;
            border-color: #ff416c;
        }

        .form-check-label {
            font-weight: 500;
        }

        .btn-login {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #ff4b2b, #ff416c);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 75, 43, 0.4);
        }

        .forgot-password {
            color: #ffb703;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
        }

        .forgot-password:hover {
            color: #ffdd00;
            text-decoration: underline;
        }

        .register-link {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .register-link p {
            font-size: 15px;
        }

        .register-link a {
            color: #ffb703;
            font-weight: 700;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #ffdd00;
            text-decoration: underline;
        }

        main h3 {
            color: white;
            animation: gerak 3s infinite;
        }

        @keyframes gerak {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(20px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar - Compact Version with Profile Image -->
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">Sistem Manajemen Inventory</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                        @else
                        @canany(['create-role', 'edit-role', 'delete-role'])
                        <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Kelola Roles</a></li>
                        @endcanany

                        @canany(['create-user', 'edit-user', 'delete-user'])
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Kelola Users</a></li>
                        @endcanany

                        @canany(['create-product', 'edit-product', 'delete-product'])
                        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Kelola Produk</a></li>
                        @endcanany

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="profile-image">
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="Profile">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <div class="dropdown-item text-center fw-bold mb-2">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            <div class="container">
                <h3 class="text-center mt-3 mb-3">Sistem Informasi Manajemen Inventory Produk</h3>
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div>
                        <p>Kembali ke : <a href="{{ url('/') }}"><strong>Halaman Awal</strong></a></p>
                    </div>
                    <div class="text-end">
                        © {{ date('Y') }} <a href="#"><strong>Kelompok 7</strong></a> Nawrah Chyntia | Vivi Erlina | M.Fathurrochim.
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>