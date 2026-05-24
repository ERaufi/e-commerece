@extends('layouts.guestLayout')

@section('content')
    <h1 class="guest-title">{{ __('Login') }}</h1>
    <p class="guest-subtitle">Sign in to continue to your store dashboard.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="guest-card">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Enter email address" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="Enter password" required>
            </div>

            <label class="remember-field" for="remember">
                <input id="remember" name="remember" type="checkbox" value="1">
                Remember me
            </label>

            <div class="form-actions">
                <a href="{{ route('register') }}" class="guest-link">Create account</a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                </button>
            </div>
        </form>
    </div>
@endsection
