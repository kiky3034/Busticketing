<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Tiket Bis</title>
    <link rel="icon" href="{{ asset('Images/bus-solid.svg') }}" type="image/svg+xml">
    <!-- Add CSS Libraries (e.g. Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #fdfbfb, #ebedee);
            color: #343a40;
        }
        .navbar {
            background: linear-gradient(120deg, #007bff, #0056b3);
        }
        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.7rem;
        }
        .navbar .navbar-brand i {
            margin-right: 10px;
        }
        .navbar .nav-link {
            color: #fff;
            transition: color 0.3s;
        }
        .navbar .nav-link:hover {
            color: #ffdd57;
        }
        .navbar-toggler-icon {
            filter: invert(1);
        }
        .py-4 {
            padding: 2rem;
        }
        .btn-custom {
            background-color: #ffdd57;
            color: #fff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-bus"></i> Sistem Pemesanan Tiket Bis
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-phone-alt"></i> Kontak
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-info-circle"></i> Tentang Kami
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user-circle"></i> Akun
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <!-- Logout form -->
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link" style="color: #fff; text-decoration: none;">
                                        <i class="fas fa-sign-out-alt"></i> Keluar
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> Masuk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i> Daftar
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>

    <!-- Add JS Libraries (e.g. Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
