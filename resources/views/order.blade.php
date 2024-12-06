<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Notifikasi Success -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-danger text-white text-center">
                        <h4>FUDO | Menu Order</h4>
                        <!-- Tombol kembali -->
                        <a href="{{ url('/') }}" class="btn btn-secondary m-1">
                            <i class="bi bi-chevron-bar-left"></i> Kembali
                        </a>
                    </div>

                    <div class="card-body">
                        <!-- Gambar Menu -->
                        <div class="text-center">
                            <img class="food" src="{{ asset('storage/' . $menu->image) }}" alt="menus"
                                style="width:180px; height: 180px; object-fit: cover;">
                        </div>

                        <!-- Form untuk Masukkan Keranjang -->
                        <form action="{{ route('cart.add', ['menu' => $menu->id]) }}" method="POST" class="mt-3">
                            @csrf
                            <!-- Nama Menu -->
                            <div class="mb-3">
                                <label for="orderName" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control border-danger" id="orderName" name="name"
                                    value="{{ $menu->name }}" readonly>
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control border-danger" id="harga" name="price"
                                    value="{{ $menu->price }}" readonly>
                            </div>

                            <!-- Jumlah Pesanan -->
                            <div class="mb-3">
                                <label for="jumlahPesanan" class="form-label">Jumlah Pesanan</label>
                                <input type="number" class="form-control border-danger" id="jumlahPesanan"
                                    name="quantity" placeholder="Jumlah Pesanan" min="1" max="20" required>
                            </div>

                            <!-- Catatan Pengiriman -->
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Catatan Pengiriman</label>
                                <textarea class="form-control border-danger" id="pesan" name="notes" rows="3"
                                    placeholder="Variant, Ukuran, Topping.."></textarea>
                            </div>

                            <!-- Tombol -->

                            <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-warning flex-fill">Masukkan
                                    Keranjang</button>
                                <button type="submit" class="btn btn-danger flex-fill">Submit Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
