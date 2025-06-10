@extends('layouts.main')

@section('content')
    <h2 class="text-2xl mb-4">Product Catalog</h2>

    <form method="GET" action="{{ route('admin.products.index') }}" class="row mb-4 align-items-center">
        <div class="col-md-4 mb-2">
            <input type="text" name="search" placeholder="Search Product..." class="form-control" value="{{ request('search') }}">
        </div>
        <div class="col-md-2 mb-2">
            <input type="number" name="min_price" placeholder="Min Price" class="form-control" value="{{ request('min_price') }}">
        </div>
        <div class="col-md-2 mb-2">
            <input type="number" name="max_price" placeholder="Max Price" class="form-control" value="{{ request('max_price') }}">
        </div>
        <div class="col-md-3 mb-4">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" style="height: 230px; object-fit: cover;" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 60) }}</p>
                        <p class="card-text fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        
                        <div class="mt-auto">
                            @auth('admin')
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Add Product</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin?')">Delete</button>
                            </form>     
                            <form action="{{ route('cart.store', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-success">Add to Cart</button>
                            </form>                       
                            @else
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No products found.
                </div>
            </div>
        @endforelse
    </div>
@endsection