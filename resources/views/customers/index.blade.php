@extends('layouts.app')

@section('title', 'Customer List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Order</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
    </div>

    <hr />

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .actions a, .actions button {
            text-decoration: none;
            padding: 5px 10px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f8f8f8;
            color: #333;
        }

        .actions button {
            background-color: #dc3545;
            color: #fff;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Add other columns as needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <!-- Add other columns as needed -->
                    <td class="actions">
                        <a href="{{ route('customers.show', $customer->id) }}">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
