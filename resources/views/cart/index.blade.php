<table class="table">
    <thead>
        <tr>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Catatan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item->menu->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->notes }}</td>
                <td>Rp {{ number_format($item->menu->price * $item->quantity, 0, ',', '.') }}</td>
                <td>
                    <!-- Form untuk menghapus item dari keranjang -->
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach

        <div class="d-grid">
            <form action="{{ route('order.submit') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Selesaikan Pesanan</button>
            </form>
        </div>
    </tbody>
</table>
