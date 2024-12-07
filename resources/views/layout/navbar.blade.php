<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            margin-top: 5%;
        }
        .navbar-brand {
            margin-left: 5%;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            color: white;
            position: relative;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0px;
            left: 0;
            width: 0;
            height: 3px;
            background-color: white;
            transition: width 0.3s ease;
        }
        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }
        .navbar-nav .nav-link:hover {
            color: #fff;
        }
        .navbar-nav .active::after {
            width: 100%;
        }
        .navbar-custom {
            background-color: #0f64d4;
        }
        form {
            margin-bottom: 10%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="#">KaryaMan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('karyawan.index') ? 'active' : '' }}" href="{{ route('karyawan.index') }}">Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jabatan.index') ? 'active' : '' }}" href="{{ route('jabatan.index') }}">Jabatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('divisi.index') ? 'active' : '' }}" href="{{ route('divisi.index') }}">Divisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('presensi.index') ? 'active' : '' }}" href="{{ route('presensi.index') }}">Presensi</a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
