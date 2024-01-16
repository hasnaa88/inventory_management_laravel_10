<!-- invoices/customer_orders.blade.php -->

@extends('layouts.app')

@section('title', 'Customer Orders')

@section('contents')
    <div style="margin-bottom: 20px;">
        <h2 style="font-size: 24px;">Customer Details</h2>
        <p style="margin: 0;">Name: {{ $customer->name }}</p>
        <p style="margin: 0;">Email: {{ $customer->email }}</p>
    </div>

    <div style="margin-bottom: 20px;">
        <h2 style="font-size: 24px;">Orders</h2>

        @if($orders->isEmpty())
            <p>No orders found for this customer.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Order ID</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Total Amount</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Products</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $order->id }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">${{ $order->total_amount }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">
                                <ul style="list-style: none; margin: 0; padding: 0;">
                                    @foreach($order->products as $product)
                                        <li style="margin-bottom: 5px;">{{ $product->title }} - Quantity: {{ $product->pivot->quantity }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 15px;">
                <a href="{{ route('invoices.print', $customer->id) }}" target="_blank" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; display: inline-block;">Print Invoice</a>
            </div>
        @endif
    </div>
@endsection
