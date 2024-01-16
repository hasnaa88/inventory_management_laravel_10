<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('orders.create', compact('products','customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $customer = Customer::findOrFail($request->input('customer_id'));
    
        $order = $customer->orders()->create();
    
        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
    
        $order->products()->attach($product->id, ['quantity' => $quantity]);
    
        // Calculate total amount
        $totalAmount = $product->price * $quantity;
        $order->update(['total_amount' => $totalAmount]);
    
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }
    
    public function show($id)
    {
        $order = Order::with('customer')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'products', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $customer = Customer::findOrFail($request->input('customer_id'));
        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');

        $order->update(['customer_id' => $customer->id, 'total_amount' => $product->price * $quantity]);

        $order->products()->sync([$product->id => ['quantity' => $quantity]]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
