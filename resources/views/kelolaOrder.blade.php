<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fudo | Admin Page</title>
    <link rel="stylesheet" href="css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>


<body class="bg-light">
    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #C7253E;">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand ms-3" href="#">
                <img src="img/logo.png" alt="Fudo Logo" class="d-inline-block align-text-top" style="width: 120px;">
            </a>

            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left Links -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-white" href="{{ url('admin') }}">Kelola Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-white" href="{{ url('manageOrder') }}">Data Pesanan</a>
                    </li>
                </ul>

                <!-- Right Links -->
                <ul class="navbar-nav ms-auto">
                    <!-- Admin Greeting -->
                    <li class="nav-item me-3">
                        <span class="navbar-text text-light">
                            Halo, Admin!
                        </span>
                    </li>
                    <!-- Logout Button -->
                    <li class="nav-item">
                        <form action="/logout" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- Navbar End --}}
    <main class="container">

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            <h1>Data Pesanan</h1>

            <br>
            <br>

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">Customer</th>
                        <th class="col-md-2">Menu</th>
                        <th class="col-md-1">Harga</th>
                        <th class="col-md-1">Quantity</th>
                        <th class="col-md-2">Pesan</th>
                        <th class="col-md-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $order->firstItem(); ?>
                    @foreach ($order as $items)
                        <tr class="text-center">
                            <td>{{ $i }}</td>
                            <td>{{ $items->user->name }}</td>
                            <td>{{ $items->name }}</td>
                            <td>Rp {{ number_format($items->price, 0, ',', '.') }}</td>
                            <td>{{ $items->qty }}</td>
                            <td class="text-left">{{ $items->notes }}</td>
                            <td>Rp {{ number_format($items->total, 0, ',', '.') }}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            {{ $order->links() }}
        </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
