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


    {{-- Alert Success --}}
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    {{-- Navbar End --}}
    <main class="container">

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            <h1>Kelola Menu</h1>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3 text-end me-3 mt-3 mb-3">
                <a href='{{ url('admin/create') }}' class="btn btn-primary">+ Tambah Menu</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">Nama</th>
                        <th class="col-md-4">Harga</th>
                        <th class="col-md-2">Gambar</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $menu->firstItem(); ?>
                    @foreach ($menu as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->image)
                                    <img style="width:60px; height:60px;" src="{{ asset('storage/' . $item->image) }}">
                                @endif
                            </td>
                            <td>
                                <a href='{{ url('admin/' . $item->name . '/edit') }}'
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm ('Apakah Yakin ingin menghapus menu?')" class="d-inline"
                                    action="{{ url('admin/' . $item->name) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            {{ $menu->links() }}

        </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
