<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $totalUsers    = User::count();
        $totalRevenue  = Order::where('payment_status', 'paid')->sum('total_amount');
        $recentOrders  = Order::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalProducts', 'totalOrders', 'totalUsers', 'totalRevenue', 'recentOrders'
        ));
    }
}
