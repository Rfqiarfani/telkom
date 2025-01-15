<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plasa Telkom Landasan Ulin | Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/svg/favicon.ico" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <style>
        body {
            background-image: url('{{ asset('img/bg-18.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Selamat Datang!</h1>
            <p class="sign-up__subtitle">Masukan NIK dan Password Untuk Lanjut</p>

            <!-- Menampilkan pesan kesalahan -->
            @if ($errors->any())
                <div class="alert">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <!-- Menampilkan pesan selamat datang -->
            @if (session('message'))
                <div class="success">
                    {{ session('message') }}
                </div>
            @endif

            <form class="sign-up-form form" action="{{ route('login.process') }}" method="POST">
                @csrf
                <label class="form-label-wrapper">
                    <p class="form-label">NIK</p>
                    <input class="form-input" name="nik" type="text" placeholder="Masukan NIK" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" name="password" type="password" placeholder="Masukan Password" required>
                </label>
                </br>
                <button class="form-btn primary-default-btn transparent-btn" type="submit">Login</button>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>
