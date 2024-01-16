@extends('layouts.app')

@section('title', 'Categories List')

@section('contents')
  
    <hr />

    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No categories available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
