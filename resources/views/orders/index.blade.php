@extends('layouts.app')

@section('title', 'List Order')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Order</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Orders</a>
    </div>

    <hr />

    @if($orders->count() > 0)
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->products->first()->title }}</td>
                    <td>{{ $order->products->first()->pivot->quantity }}</td>
                    <td>${{ $order->total_amount }}</td>
                        <!-- Add more table cells with order information -->
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-danger">Delete</a>
                            <!-- Add delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders available.</p>
    @endif
@endsection
