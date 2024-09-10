<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fudo | Food Delivery</title>
    <link rel="stylesheet" href="css/home.css">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            {{-- logo --}}
            <img class="mt-3" style="width:105px; height:40px; margin-left:50px;" src="img/logo.png" alt="logo Fudo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center me-4 mt-3" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2">
                    <li class="nav-item mx-4">
                        <a class="nav-link link-dark" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a id="services-link" class="nav-link link-dark" href="#services">Services</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link link-dark" href="#menus">Menu</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link link-dark" href="#contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="/customerOrder" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-cart-check"></i>
                                            MyOrders
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-in-left"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link text-danger fw-bold"><i class="bi bi-box-arrow-in-right"></i>
                                Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-lg">


        <div class="rounded-shape"></div>
        <img class="texture" src="img/naranjas.png" alt="naranjas">

        {{-- Services Section --}}
        <div>
            @yield('content')
        </div>

        {{-- Menu Section --}}

        <br>
        <br>
        <br>
        <br>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
