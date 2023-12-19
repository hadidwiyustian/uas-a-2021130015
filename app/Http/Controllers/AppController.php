<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalMenus = Menu::count();
        return view('index', compact('totalOrders', 'totalMenus'));
    }

    public function about()
    {
        return view('about');
    }

    // Fungsi-fungsi lain sesuai kebutuhan
}
