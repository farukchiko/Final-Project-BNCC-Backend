@extends('layouts.main')

@section('content')
<div class="card p-4 mb-5 shadow-sm max-w-2xl mx-auto">
    <h2 class="h4 mb-4">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Price (Rp)</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('images/'.$product->image) }}" class="img-thumbnail mb-2" width="200">
        </div>

        <div class="form-group mb-4">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning text-white">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-light">Cancel</a>
    </form>
</div>
@endsection