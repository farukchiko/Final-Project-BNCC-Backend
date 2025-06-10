@extends('layouts.main')

@section('content')
<div class="text-center mt-5">
    <h2 class="text-primary mb-4">Welcome to Sweet Shop, {{ Auth::user()->name }}! 🤩🎉</h2>

    <p class="lead text-muted">Nikmati Promo & Showcase Kami Di Bawah Ini!</p>

    {{-- Video Embed --}}
    <div class="rounded shadow mt-4 overflow-hidden" style="border-radius: 10px; max-width: 100%; margin: 0 auto; position: relative; height: 0; padding-bottom: 56.25%; overflow: hidden;">
        <iframe src="https://www.youtube.com/embed/a2g7Q8n9Li8?autoplay=1&mute=1&rel=0&loop=1&playlist=a2g7Q8n9Li8"
                allow="autoplay; encrypted-media"
                allowfullscreen
                style="position: absolute; top: 0; left: 0; width: 120%; height: 120%; border: none; transform: scale(1.15); transform-origin: center;">
        </iframe>
    </div>

    {{-- Tombol navigasi --}}
    <div class="d-flex justify-content-center gap-3 mt-5 flex-wrap">
        <a href="{{ route('user.products.index') }}" class="btn btn-primary btn-lg px-5">🛍️ Product Catalog</a>
        <a href="{{ route('cart.index') }}" class="btn btn-outline-primary btn-lg px-5">🛒 My Cart</a>
        <a href="{{ route('order.history') }}" class="btn btn-outline-success btn-lg px-5">📜 Order History</a>
        <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark btn-lg px-5">👤 Profile</a>
    </div>
</div>
@endsection