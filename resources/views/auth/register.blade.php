@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">
    <div class="card p-5 shadow" style="width: 400px;">
        <h4 class="text-center mb-4 text-primary">Create Your Account 📝</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" required autofocus class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <div class="mb-4">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <p class="text-center mt-3 mb-0">Sudah punya akun?  
                <a href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection