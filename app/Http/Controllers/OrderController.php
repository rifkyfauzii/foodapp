<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class OrderController extends Controller
{
    public function showOrderForm($id)
    {
        $menu = Menu::findorFail($id);

        return view('order', compact('menu'));
    }

    public function saveOrder(Request $request, int $id)
    {

        $menu = Menu::findorFail($id);
        Order::create([
            'user_id' => Auth::user()->id,
            'name' => $menu->name,
            'price' => $menu->price,
            'qty' => (int)$request->input('quantity'),
            'notes' => $request->input('notes'),
            'table_number' => $request->input('table_number'),
            'total' => $menu->price * (int)$request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Menu telah di pesan!');
    }
    
    // Method untuk ke halaman DataPesanan
    public function order(Request $request)
    {
    // Pastikan hanya admin yang dapat mengakses halaman ini
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403);
    }

    // Ambil data pesanan dengan pagination
    $order = Order::orderBy('created_at', 'desc')->paginate(10);

    // Kirim data ke view
    return view('kelolaOrder', compact('order'));
    }


    // Method untuk ke halaman CustomerOrder
    public function customerOrder(Request $request)
    {

        if (!auth()->check()) {
            abort(403);
        }

        if (auth()->user()->role !== 'customer') {
            abort(403);
        }

        $order = Order::orderBy('created_at', 'desc')->where('user_id',auth()->user()->id)->paginate(5);

        return view('customerOrder')->with('order', $order);
    }

    
    public function destroy($id)
    {
        Order::where('notes', $id)->delete();
        return redirect()->to('customerOrder')->with('success', 'Pesanan berhasil dibatalkan!');
    }
}
