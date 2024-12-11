<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Saya</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container my-5">
        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Judul Halaman -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-danger"><i class="bi bi-cart3"></i> Keranjang Anda</h1>
        </div>

        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="bi bi-chevron-bar-left"></i>Kembali ke Beranda
            </a>
        </div>

        <!-- Tabel Keranjang -->
        <div class="card shadow">
            <div class="card-body">

                <table class="table table-striped table-bordered">
                    <thead class="table-danger text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalPrice = 0; @endphp
                        @foreach ($cartItems as $cart)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cart->menu->name }}</td>
                                <td>{{ $cart->qty }}</td>
                                <td>{{ $cart->notes }}</td>
                                <td>{{ $cart->price }}</td>
                                <td>Rp {{ number_format($cart->total, 0, ',', '.') }}</td>
                            </tr>
                            @php $totalPrice += $cart->total * $cart->qty; @endphp
                        @endforeach
                    </tbody>
                </table>
                {{ $cartItems->links() }}

                <!-- Tombol Checkout -->
                @if ($cartItems->count() > 0)
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-box-arrow-right"></i> Checkout
                        </button>
                    </form>
                @endif

                <div class="text-end mt-3">
                    <h4 class="text-danger">Total Keseluruhan: Rp {{ number_format($totalPrice, 0, ',', '.') }}
                    </h4>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
