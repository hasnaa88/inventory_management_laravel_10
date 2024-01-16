@extends('layouts.app')

@section('title', 'Create Customer')

@section('contents')


    <form action="{{ route('customers.store') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror


        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <!-- Add other fields as needed -->

        <button type="submit">Create Customer</button>
    </form>
@endsection
