@extends('layouts.main')

@section('content')
    <h2 class="text-2xl mb-4">Product Catalog</h2>

    <form method="GET" action="{{ route('products.index') }}" class="row mb-4 align-items-center">
        <div class="col-md-4 mb-2">
            <input type="text" name="search" placeholder="Search Product..." class="form-control">
        </div>
        <div class="col-md-2 mb-2">
            <input type="number" name="min_price" placeholder="Min Price" class="form-control">
        </div>
        <div class="col-md-2 mb-2">
            <input type="number" name="max_price" placeholder="Max Price" class="form-control">
        </div>
        <div class="col-md-3 mb-4">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" style="height: 230px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 60) }}</p>
                        <p class="card-text font-weight-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection