<h1>Product List</h1>
<a href="{{ route('products.create') }}">Add Product</a>

@foreach ($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <img src="{{ asset('images/'.$product->image) }}" width="100">
        <p>{{ $product->description }}</p>
        <p>Price: Rp {{ $product->price }}</p>
        <a href="{{ route('products.show', $product->id) }}">Detail</a>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach