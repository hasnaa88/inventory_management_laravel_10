@extends('layouts.app')

@section('title', 'Edit Customer')

@section('contents')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>

        <!-- Add other input fields as needed -->

        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
@endsection
