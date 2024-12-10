<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Sistem Pemesanan Tiket Bis</title>
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
        .register-container {
            width: 500px;
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .register-container .logo {
            font-size: 4rem;
            color: #6a11cb;
            margin-bottom: 1rem;
        }
        .register-container h2 {
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
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #333333;
            background: #e0e0e0;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #d6d6d6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">🚌</div>
        <h2>Pendaftaran</h2>
        <form method="POST" action="/register">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3 text-start">
                <label for="name" class="form-label">Nama</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <div class="invalid-feedback">
                    Error message for name
                </div>
            </div>

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Alamat Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                <div class="invalid-feedback">
                    Error message for email
                </div>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                <div class="invalid-feedback">
                    Error message for password
                </div>
            </div>

            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="mb-3 text-start">
                <label for="role" class="form-label">Hak Akses</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <div class="invalid-feedback">
                    Error message for role
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        <!-- Login Button -->
        <a href="/login" class="btn btn-secondary">Masuk</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
