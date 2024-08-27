<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fudo | Admin Page</title>
    <link rel="stylesheet" href="css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                    <li class="nav-item">
                        <button type="button" href="#" class="btn btn-light text-danger">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Errors Success --}}
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    {{-- Navbar End --}}
    <main class="container">

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            <h1>Kelola Menu</h1>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3 text-end me-3 mt-3 mb-3">
                <a href='{{ url('admin/create') }}' class="btn btn-primary">+ Tambah Data</a>
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
                            <td>{{ $item->price }}</td>
                            <td>
                                @if ($item->image)
                                    <img style="width:150px; height:auto;"
                                        src="{{ url('images-upload') . '/' . $item->image }}">
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
