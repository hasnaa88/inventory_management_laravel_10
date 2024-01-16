@extends('layouts.app')

@section('title', 'Customer Details')

@section('contents')
    <h1>Customer Details</h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $customer->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $customer->email }}</td>
        </tr>
        <!-- Add other details as needed -->
    </table>

    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit Customer</a>
    <!-- In the customer show.blade.php -->
<a href="{{ route('customers.showOrders', $customer->id) }}" class="btn btn-primary">View Orders</a>
    <!-- Add other actions or links as needed -->
@endsection
