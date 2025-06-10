@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card p-5 shadow" style="width: 400px;">
        <h4 class="text-center mb-4 text-primary">Welcome Back 👋</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required autofocus class="form-control">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <p class="text-center mt-3 mb-0">Belum punya akun?  
                <a href="{{ route('register') }}">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection