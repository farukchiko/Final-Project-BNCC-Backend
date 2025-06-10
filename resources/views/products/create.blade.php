@extends('layouts.main')

@section('content')
<div class="card p-4 mb-5 shadow-sm max-w-2xl mx-auto">
    <h2 class="h4 mb-4">Add New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Price (Rp)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="form-group mb-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
    </form>
</div>
@endsection