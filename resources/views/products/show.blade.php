@extends('layouts.main')

@section('content')
<div class="card p-4 mb-5 shadow-sm max-w-2xl mx-auto">
    <h2 class="h4 mb-4">Product Details</h2>

    <div class="mb-3">
        <img src="{{ asset('images/'.$product->image) }}" class="img-thumbnail w-100" style="max-height: 300px; object-fit:cover;">
    </div>

    <h3 class="h5">{{ $product->name }}</h3>
    <p class="text-muted">{{ $product->description }}</p>
    <p class="font-weight-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <p class="text-muted">Stock: {{ $product->stock }}</p>

    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">← Back to Product List</a>
</div>
@endsection