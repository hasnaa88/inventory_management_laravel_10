@extends('layouts.app')

@section('title', 'Add Category')

@section('contents')
    
    <hr />

    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection
