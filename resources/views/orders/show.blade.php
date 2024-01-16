@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    
    <p>Order ID: {{ $order->id }}</p>
    <p>Customer: {{ $order->customer->name }}</p>
    <p>Total Amount: {{ $order->total_amount }}</p>
    <!-- Add other order details as needed -->
    <a href="{{ route('orders.index') }}">Back to Orders</a>
@endsection
