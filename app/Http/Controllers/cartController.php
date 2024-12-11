<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    // Menambahkan item ke keranjang
    public function add(Request $request, $menuId)
    {
    // Validasi data masukan
    $request->validate([
        'quantity' => 'required|integer|min:1|max:20',
        'notes' => 'nullable|string|max:255',
    ]);

    // Pastikan pengguna sudah login
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan item ke keranjang.');
    }

    // Ambil data menu
    $menu = Menu::findOrFail($menuId);

    // Transaksi database
    DB::transaction(function () use ($menu, $request, $menuId) {
        // Cek apakah item sudah ada di keranjang
        $existingCartItem = Cart::where('user_id', Auth::id())
                                ->where('menu_id', $menuId)
                                ->first();

        if ($existingCartItem) {
            // Update quantity dan total harga
            $existingCartItem->qty += $request->input('quantity');
            $existingCartItem->total = $menu->price * $existingCartItem->qty;
            $existingCartItem->save();
        } else {
            // Tambahkan item baru ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'menu_id' => $menuId,
                'qty' => $request->input('quantity'),
                'notes' => $request->input('notes'),
                'price' => $menu->price,
                'total' => $menu->price * $request->input('quantity'),
            ]);
        }
    });

    // Redirect ke halaman keranjang dengan notifikasi sukses
    return redirect()->route('cart.index')->with('success', $menu->name . ' telah berhasil ditambahkan ke keranjang!');
}


    // Menampilkan isi keranjang
    public function index()
{
    // Ambil semua item dari keranjang pengguna yang sedang login
    $cartItems = Cart::with('menu')->where('user_id', Auth::id())->paginate(5);
    
    // Hitung total harga untuk semua item di keranjang
    $totalPrice = $cartItems->sum('total');

    // Kirim $cartItems dan $totalPrice ke view
    return view('cart.index', compact('cartItems', 'totalPrice'));
}

public function checkout()
{
    $carts = Cart::where('user_id', Auth::id())->get();


    if ($carts->isEmpty()) {
        return redirect()->back()->with('error', 'Keranjang Anda kosong!');
    }

    // Pindahkan data dari `carts` ke `orders`
    foreach ($carts as $cart) {

        
       $order = Order::create([
            'user_id' => Auth::id(), // Tambahkan user_id
            'name' => $cart->menu->name,
            'qty' => $cart->qty,
            'notes' => $cart->notes,
            'price' => $cart->price,
            'total' => $cart->total,
        ]);
    }

        Cart::truncate();
        
        return redirect()->back()->with('success', 'Checkout berhasil!');
}

}