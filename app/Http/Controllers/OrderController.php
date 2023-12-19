<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderMenu;

class OrderController extends Controller
{

    // app/Http/Controllers/OrderController.php
    public function show($id)
    {
        $order = Order::findOrFail($id);
        // Add any logic to retrieve and display order details
        return view('orders.show', compact('order'));
    }

public function index()
{
    $orders = Order::all();
    return view('orders.index', compact('orders'));
}

    public function order()
    {
        $orders = Order::all();
        $menus = Menu::all();
        return view('order', compact('orders', 'menus'));
    }
    public function createOrder(Request $request)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'menu_ids' => 'required|array',
            'menu_ids.*' => 'exists:menus,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // Simpan data order baru
        $order = Order::create([
            'status' => $request->input('status'),
        ]);

        // Attach menu ke order dengan menyimpan jumlahnya
        for ($i = 0; $i < count($request->input('menu_ids')); $i++) {
            OrderMenu::create([
                'order_id' => $order->id,
                'menu_id' => $request->input('menu_ids')[$i],
                'quantity' => $request->input('quantities')[$i],
            ]);
        }

        return redirect()->route('index')->with('success', 'Order berhasil ditambahkan.');
    }

}
