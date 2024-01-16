<!-- resources/views/invoices/print.blade.php -->

@extends('layouts.app')

@section('title', 'Print Invoice')

@section('contents')
    <div class="container mt-4">
        <h1 class="mb-4">Invoice for Order {{ $order->id }}</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Customer Details</h2>
                <p><strong>Name:</strong> {{ $order->customer->name }}</p>
                <p><strong>Email:</strong> {{ $order->customer->email }}</p>
            </div>
            <div class="col-md-6">
                <h2>Order Details</h2>
                <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
                <p><strong>Date:</strong> {{ $order->created_a}}</p>
            </div>
        </div>

        <h2 class="mt-4">Products</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>${{ $product->price * $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
        </div>
    </div>
@endsection
