<h1>Add Product</h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name"><br>
    Description: <textarea name="description"></textarea><br>
    Price: <input type="number" name="price"><br>
    Stock: <input type="number" name="stock"><br>
    Image: <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>