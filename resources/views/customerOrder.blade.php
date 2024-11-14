<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fudo | Admin Page</title>
    <link rel="stylesheet" href="css/home.css">

    {{-- Framework Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body class="bg-light">


    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #C7253E">
        <div class="container-fluid">
            <img class="mt-1" style="width:105px; height:40px; margin-left:30px;" src="img/logo.png" alt="logo Fudo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav ms-auto mt-3 mb-2 me-4">
                    <a class="nav-link me-4 text-light" href="#" id="navbarDropdown" role="button"
                        aria-expanded="false">
                        Halo, {{ auth()->user()->name }}
                    </a>
                </ul>

                {{-- Kembali ke halaman Utama --}}
                <a href="{{ url('/') }}" class=" btn btn-secondary m-1"><i
                        class="bi bi-chevron-bar-left"></i>Kembali</a>
            </div>
        </div>
    </nav>

    {{-- Navbar End --}}
    <main class="container">
        {{-- Alert Success --}}
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            <h1>Data Pesanan Saya</h1>

            <br>
            <br>

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col-md-1">No</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Harga</th>
                        <th class="col-md-1">Quantity</th>
                        <th class="col-md-3">Varian</th>
                        <th class="col-md-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $order->firstItem(); ?>
                    @foreach ($order as $item)
                        <tr class="text-center">
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->qty }}</td>
                            <td class="text-left">{{ $item->notes }}</td>
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
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
