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
<head>
    <meta charset="UTF-8">
    <style>
    .navbar {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 10;
    }

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
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 50px);
            flex-direction: column;
            text-align: center;
            margin-top: 60px;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 5px solid #a8d1e7;
            padding: 20px;
            border-radius: 5px;
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 700px;
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
        }

        .card p {
            margin: 0;
            font-size: 1em;
            color: #555;
        }

    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 50px);
        flex-direction: column;
        text-align: center;
        margin-top: 60px;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        border: 5px solid #a8d1e7;
        padding: 20px;
        border-radius: 5px;
        font-size: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .card {
        background-color: white;
        backdrop-filter: blur(7px);
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 700px;
    }

    .card h3 {
        margin: 0 0 10px 0;
        font-size: 1.2em;
    }

    .card p {
        margin: 0;
        font-size: 1em;
        color: #555;
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
