<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fudo | Food Delivery</title>
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .container-lg {
            height: 100vh;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            margin-top: 120px;
        }

        /* Group Shape */
        .texture {
            opacity: 0.3;
            border-radius: 50%;
            position: absolute;
            width: 450px;
            height: 450px;
            left: 750px;
            top: 160px;
        }

        .rounded-shape {
            opacity: 1;
            border-radius: 50%;
            background: #FF0000;
            position: absolute;
            width: 450px;
            height: 450px;
            left: 750px;
            top: 160px;
        }



        /* Hero Typograph */
        .container-lg .hero-text p {
            line-height: 50px;
            text-align: left;
            font-family: "Poppins", sans-serif;
            font-size: 72px;
            font-weight: 700;
            font-style: normal;
        }

        .hero-text p span {
            color: red;
        }

        .subtext {
            margin-top: 50px;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 18px;
        }


        /* Navbar */
        .nav-link {
            color: black;
            border-bottom: 2px solid transparent;
            transition: all 0.5s ease;
        }

        .nav-link:hover {
            color: red;
            border-bottom: 2px solid red;
        }
    </style>

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
            <div class="collapse navbar-collapse justify-content-center mt-3" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2" style="margin-right: 60px;">
                    <li class="nav-item mx-3">
                        <a class="nav-link link-dark" href="/">Why Fudo?</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link link-dark" href="/services">Services</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link link-dark" href="/menus">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-dark" href="#">Contact</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 me-4">
                    <li class="nav-item">
                        <button type="button" href="#" class="btn btn-danger">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-lg">

        <div class="hero-section">
            <div class="hero-text">
                <p>Be The Fastest</p>
                <p>In Delivering</p>
                <p>Your <span>Food</span></p>
            </div>


            <p class="subtext">Our job is to filling your tummy with delicious food <br> and with fast and free delivery
            </p>

            {{-- Get Started --}}
            <button type="button" href="#" class=" mt-3 btn btn-danger">Get Started</button>
        </div>


        <div class="rounded-shape"></div>
        <img class="texture" src="img/naranjas.png" alt="naranjas">



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
