@extends('layouts.main')

@section('content')
<div class="max-w-md mx-auto card p-4 shadow-sm">
    <h2 class="h4 mb-4 text-center">Admin Login</h2>

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-4">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection