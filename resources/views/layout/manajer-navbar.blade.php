<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        .navbar-brand {
            margin-left: 5%;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .navbar-nav {
            margin-left: auto;
            margin-right: 5%;
        }
        .navbar-custom {
            background-color: #2244bf;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand" href="#">KaryaMan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manajer.presensi') }}" style="color: white;">Presensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manajer.karyawan') }}" style="color: white;">Karyawan</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('logout') }}" style="color: white;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
