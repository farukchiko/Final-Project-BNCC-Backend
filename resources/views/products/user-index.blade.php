@extends('layouts.main')

@section('content')
    <h2 class="h4 mb-4 text-primary">Sweet Shop Product Catalog</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-primary shadow-sm">
                <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" style="height: 200px; object-fit:cover;">
                <div class="card-body bg-light">
                    <h5 class="card-title text-primary">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 50) }}</p>
                    <p class="text-success font-weight-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                    <form action="{{ route('cart.store', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary w-100">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection