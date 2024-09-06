<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'notes' => $request->input('notes'),
            'qty' => (int)$request->input('quantity'),
            'name' => $menu->name,
            'price' => $menu->price,
            'total' => $menu->price * (int)$request->input('quantity'),
            'user_id' => Auth::user()->id,

        ]);

        return back()->with('loginError', 'Login Failed');
    }
}
