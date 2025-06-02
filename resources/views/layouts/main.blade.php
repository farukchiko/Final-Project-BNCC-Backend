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
                <a href="/products" class="text-dark">Products</a>
                <a href="/products/create" class="text-dark">Add Product</a>
            
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-dark p-0 m-0" style="text-decoration:none;">Logout</button>
                </form>
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
        &copy; 2025 Sweet Shop | Powered by Molla Template
    </footer>

    <script src="{{ asset('molla/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('molla/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>