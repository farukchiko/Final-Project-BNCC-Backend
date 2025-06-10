@extends('layouts.main')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow p-4">
        <h3 class="text-center text-primary mb-4">👤 My Profile</h3>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">
            </div>

            <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea name="bio" rows="3" class="form-control" placeholder="Tulis bio singkat...">{{ old('bio', auth()->user()->bio) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Alamat</label>
                <input name="address" type="text" class="form-control" value="{{ old('address', auth()->user()->address) }}" placeholder="Alamat lengkap">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">← Back</a>
                <button type="submit" class="btn btn-primary">💾 Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection