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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
    @yield('styles')

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href={{ route('approver.index') }}>
                    <img src={{ asset('img/logo-white.png') }} alt="Radappoint Logo" class="navbar-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNavDropdown">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('approver.patient.index') }}>Patients Table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('approver.appointment.index') }}>Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('assignment.index') }}>Assignments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('services.index') }}>Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('slots.index') }}>Manage Slots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('room.index') }}>Rooms</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('approver.logout') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <a class="nav-link" href="{{ route('approver.logout') }}"
                                    onclick="event.preventDefault();
                            this.closest('form').submit();">Logout</a>
                            </form>
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

    @yield('scripts')
</body>

</html>
