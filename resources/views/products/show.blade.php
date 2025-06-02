<h1>Product Detail</h1>

@if ($product)
    <h2>{{ $product->name }}</h2>
    <img src="{{ asset('images/'.$product->image) }}" width="200">
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> Rp {{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
@else
    <p>Product not found.</p>
@endif

<a href="{{ route('products.index') }}">Back to List</a>