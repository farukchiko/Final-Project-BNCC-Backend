<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sweet Shop</title>
    <link rel="stylesheet" href="{{ asset('molla/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('molla/assets/css/style.css') }}">
</head>
<body>

    <header class="header">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <a href="/products" class="logo h3 mb-0">Sweet Shop</a>
            <nav class="nav d-flex align-items-center" style="gap: 24px;">
                @if(Auth::guard('admin')->check())
                    <a href="{{ route('admin.products.index') }}" class="text-dark">Products</a>
                    <a href="{{ route('admin.products.create') }}" class="text-dark">Add Product</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-dark p-0 m-0" style="text-decoration:none;">Logout</button>
                    </form>
                @elseif(Auth::check())
                    <a href="{{ route('order.history') }}" class="text-dark">Order History</a>
                    <a href="{{ route('user.products.index') }}" class="text-dark">Products</a>
                    <a href="{{ route('cart.index') }}" class="text-dark">Cart</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-dark p-0 m-0" style="text-decoration:none;">Logout</button>
                    </form>
                @endif
            </nav>
        </div>
    </header>

    <main class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer text-center py-4 border-top">
        &copy; 2025 Sweet Shop | Powered by TrioMaut Group
    </footer>

    <script src="{{ asset('molla/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('molla/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>