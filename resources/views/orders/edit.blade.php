<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Order')

@section('contents')
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="post">
        @csrf
        @method('put')

        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>
        @error('customer_id')
            <div>{{ $message }}</div>
        @enderror

        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $order->products->first()->id == $product->id ? 'selected' : '' }}>
                    {{ $product->title }}
                </option>
            @endforeach
        </select>
        @error('product_id')
            <div>{{ $message }}</div>
        @enderror

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $order->products->first()->pivot->quantity }}">
        @error('quantity')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Update Order</button>
    </form>
@endsection
