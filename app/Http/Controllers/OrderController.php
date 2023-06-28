<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use App\Models\Order;
use Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByRaw("CASE WHEN status = 'Selesai' THEN 1 ELSE 0 END")
            ->get();

        return view('order.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'food_id' => 'required|array',
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:0',
            'table_number' => 'required', // Add the validation for the table number
        ]);

        $tableNumber = $data['table_number'];

        foreach ($data['food_id'] as $index => $foodId) {
            $food = Makanan::find($foodId);

            if ($food) {
                $foodName = $food->nama_makanan;
                $quantity = $data['quantity'][$index];
                $price = $food->harga_makanan;

                if ($quantity > 0) {
                    Order::create([
                        'food_name' => $foodName,
                        'quantity' => $quantity,
                        'price' => $price,
                        'table_number' => $tableNumber, // Provide a default value of 0 if $tableNumber is not set
                    ]);
                }
            }
        }

        // Redirect or perform any other actions
        // ...

        return view('success_page')->with([
            'foodName' => $foodName,
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }
    public function update(Request $request, Order $order)
    {
        // Update the status of the order to 'Selesai'
        $order->status = 'Selesai';
        $order->save();

        // Retrieve the updated list of orders, with completed order moved to the bottom
        $orders = Order::orderBy('status', 'asc')->get();

        return view('order.index', compact('orders'))->with('success', 'Order status updated successfully.');
    }
    public function reset(Request $request)
    {
        // Reset orders logic here

        // For example, you can delete all orders
        Order::truncate();

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Orders have been reset successfully.');
    }
}
