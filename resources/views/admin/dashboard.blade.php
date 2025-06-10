@extends('layouts.main')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Admin Dashboard</h2>
    <p>Welcome, Admin! 🎉</p>
    <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection