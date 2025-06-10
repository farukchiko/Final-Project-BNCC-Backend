@extends('layouts.main')

@section('content')
    <h2 class="h4 mb-4">Order History</h2>

    @if ($orders->count() > 0)
        @foreach ($orders as $order)
        <div class="card mb-4 p-3 border-primary">
            <h5 class="mb-2 text-primary">Order ID: {{ $order->id }}</h5>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>

            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price/Item</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    @else
        <p class="text-muted">Belum ada order yang tercatat.</p>
    @endif
@endsection