<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $selectedProduct = $request->query('product', '');
        return view('order', compact('selectedProduct'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'product' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string',
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'product' => $request->product,
            'quantity' => $request->quantity,
            'address' => $request->address,
        ]);

        return redirect()->route('home')->with('success', 'Pesanan Anda berhasil dikirim! Kami akan segera menghubungi Anda melalui WhatsApp.');
    }
}
