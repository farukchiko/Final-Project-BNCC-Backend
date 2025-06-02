<h1>Edit Product</h1>

@if ($product)
<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    Name: <input type="text" name="name" value="{{ $product->name }}"><br>
    Description: <textarea name="description">{{ $product->description }}</textarea><br>
    Price: <input type="number" name="price" value="{{ $product->price }}"><br>
    Stock: <input type="number" name="stock" value="{{ $product->stock }}"><br>
    Current Image:<br>
    <img src="{{ asset('images/'.$product->image) }}" width="100"><br>
    Change Image: <input type="file" name="image"><br>

    <button type="submit">Update</button>
</form>
@else
    <p>Product not found.</p>
@endif

<a href="{{ route('products.index') }}">Back to List</a>