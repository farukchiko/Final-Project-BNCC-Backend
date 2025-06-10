@extends('layouts.main')

@section('content')
    <h2 class="h4 mb-4">Your Cart</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($carts->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->product->name }}</td>
                    <td>
                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="d-flex">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="form-control form-control-sm w-50">
                            <button class="btn btn-sm btn-outline-primary ml-2">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Remove item?')">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Form checkout terpisah --}}
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>

    @else
        <p>Your cart is empty!</p>
    @endif
@endsection