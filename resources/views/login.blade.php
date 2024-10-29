<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/bg-login.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(3px);
            border: none;
            color: #fff;
            border-radius: 5px;
            height: 45px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            box-shadow: none;
            border: none;
        }

        h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .form-check-label, .forgot-password {
            color: white;
        }

        .login-box img {
            display: block;
            margin: 0 auto 20px;
            max-width: 70%;
            height: auto;
        }

        .btn-primary {
            background-color: #fff;
            color: #1C3D5A;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #1C3D5A;
            color: #fff;
            border: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box col-md-4">
            <img src="{{ asset('/img/logo.png') }}" alt="Logo">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
