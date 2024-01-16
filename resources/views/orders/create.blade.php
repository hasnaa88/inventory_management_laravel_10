@extends('layouts.app')

@section('title', 'Create Order')

@section('contents')


    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>

        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->title }}</option>
            @endforeach
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" value="1" required>

        <button type="submit">Create Order</button>
    </form>
@endsection
