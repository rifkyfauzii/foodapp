<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-danger text-white text-center">
                        <h4>FUDO | Menu Order</h4>

                        <a href="{{ url('/') }}" class=" btn btn-secondary m-1"><i
                                class="bi bi-chevron-bar-left"></i>Kembali</a>
                    </div>
                    <div class="card-body">
                        {{-- Gambar Menu --}}
                        <img class="food" src="{{ asset('storage/' . $menu->image) }}" alt="menus"
                            style=" width:120px; height: 120px; object-fit: cover;">

                        <form action="/order/{{ $menu->id }}" method="post">
                            @csrf
                            <!-- Nama Menu -->
                            <div class="mb-3">
                                <label for="orderName" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control border-danger" id="orderName" name="name"
                                    value="{{ $menu->name }}" disabled>
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control border-danger" id="harga" name="price"
                                    value="{{ $menu->price }}" disabled>
                            </div>

                            <!-- Jumlah Pesanan -->
                            <div class="mb-3">
                                <label for="jumlahPesanan" class="form-label">Jumlah Pesanan</label>
                                <input type="number" class="form-control border-danger" id="jumlahPesanan"
                                    name="quantity" placeholder="Jumlah Pesanan" required>
                            </div>

                            <!-- Pesan -->
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Catatan Pengiriman</label>
                                <textarea class="form-control border-danger" id="pesan" name="notes" rows="3"
                                    placeholder="Variant,Ukuran,topping.."></textarea>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Submit Order</button>
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
