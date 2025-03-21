<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        /* Background Gambar */
        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            background: url('https://tse2.mm.bing.net/th?id=OIP.4RtMlByWfvzhrfTMfdKGAgHaEI&pid=Api&P=0&h=180') no-repeat center center/cover;
            position: relative;
        }

        /* Overlay Transparan */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);

        }

        /* Kotak Utama */
        .container {
            position: relative;
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            text-align: center;
        }

        /* Animasi Teks */
        .title {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .subtitle {
            color: #ddd;
            font-size: 18px;
            margin-bottom: 25px;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tombol */
        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 16px;
            border: none;
            outline: none;
        }

        a:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Selamat Datang di Sistem Inventory Management</div>
        <div class="subtitle">Kelola stok barang dengan mudah & efisien.</div>

        @if (Route::has('login'))
        @auth
        <a href="{{ route('home') }}">Dashboard</a>
        @else
        <a href="{{ route('login') }}">Log in</a>
        <a href="{{ route('register') }}">Register</a>
        @endauth
        @endif
    </div>
</body>

</html>