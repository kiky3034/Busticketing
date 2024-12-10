<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sistem Pemesanan Tiket Bus</title>

    <!-- Favicon SVG -->
    <link rel="icon" href="{{ asset('Images/bus-solid.svg') }}" type="image/svg+xml">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menggunakan CDN Font Awesome terbaru -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="display-4">Selamat Datang di Sistem Pemesanan Tiket Bus</h1>
        <p class="lead">Pesan tiket bus Anda dengan mudah dan cepat.</p>

        <div class="mt-4">
            <!-- Tombol Login -->
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>

            <!-- Tombol Register -->
            <a href="{{ route('register') }}" class="btn btn-success btn-lg mx-2">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </div>

        <div class="mt-5">
            <p class="lead">Kami adalah platform pemesanan tiket bus yang terpercaya. Dengan sistem yang mudah digunakan, jadwal terkini, dan pembayaran yang aman, Anda dapat memesan tiket bus untuk perjalanan Anda dengan nyaman dan tanpa khawatir. Bergabunglah dengan kami untuk pengalaman perjalanan yang lebih baik.</p>
        </div>
    </div>

    <!-- Script JS untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
