<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RadAppoint</title>
    <link rel="icon" type="images/x-icon" href={{ asset('img/smaller-logo.png') }} />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    @yield('styles')

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-5">
                <a class="navbar-brand" href={{ route('guest.home') }}>
                    <img src={{ asset('img/logo-white.png') }} alt="Radappoint Logo" class="navbar-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNavDropdown">
                    <ul class="navbar-nav gap-lg-4 d-flex align-items-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href={{ route('guest.home') }}>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('patient.login') }}>Book now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('patient.register') }}>New patient</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container">
            @if (session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('contents')
        </main>
    </div>

</body>

</html>
