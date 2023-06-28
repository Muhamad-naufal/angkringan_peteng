<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        // Hitung total pengeluaran dan pemasukan
        $totalExpenses = $orders->sum('price');
        $totalRevenue = $orders->sum(function ($order) {
            return $order->price * $order->quantity;
        });

        return view('reports.index', compact('orders', 'totalExpenses', 'totalRevenue'));
    }
}
