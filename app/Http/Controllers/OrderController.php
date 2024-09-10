<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            'name' => $menu->name,
            'price' => $menu->price,
            'qty' => (int)$request->input('quantity'),
            'notes' => $request->input('notes'),
            'total' => $menu->price * (int)$request->input('quantity'),
            'user_id' => Auth::user()->id,
        ]);


        return redirect()->back()->with('success', 'Menu telah di pesan!');
    }
    
    // Method untuk ke halaman DataPesanan
    public function order(Request $request)
    {

        if (!auth()->check()) {
            abort(403);
        }

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $order = Order::orderBy('created_at', 'desc')->paginate(5);
        return view('kelolaOrder')->with('order', $order);
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
}
