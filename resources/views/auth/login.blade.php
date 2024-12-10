<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun - Sistem Pemesanan Tiket Bis</title>
    <link rel="icon" href="{{ asset('Images/bus-solid.svg') }}" type="image/svg+xml">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f9f9f9, #ececec);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-container {
            width: 500px; /* Sama dengan form register */
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container .logo {
            font-size: 4rem;
            color: #6a11cb;
            margin-bottom: 1rem;
        }
        .login-container h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #333333;
        }
        .form-label {
            font-weight: 500;
            color: #555555;
            text-align: left;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.3);
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(145deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(145deg, #2575fc, #6a11cb);
            box-shadow: 0 4px 10px rgba(106, 17, 203, 0.5);
        }
        .form-check-label {
            font-size: 0.9rem;
            color: #666666;
        }
        .forgot-password {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #6a11cb;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .forgot-password:hover {
            color: #2575fc;
        }
        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">🚌</div>
        <h2>Masuk</h2>
        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Alamat Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="invalid-feedback">
                    Error message for email
                </div>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                <div class="invalid-feedback">
                    Error message for password
                </div>
            </div>

            <div class="mb-3 form-check text-start">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Ingatkan Aku</label>
            </div>

            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
        <a href="#" class="forgot-password">Lupa Kata Sandi?</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
