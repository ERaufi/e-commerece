@extends('layouts.guestLayout')

@section('content')
    <h1 class="guest-title">{{ __('Create Account') }}</h1>
    <p class="guest-subtitle">Register a new user for the store.</p>

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
        <form method="POST" action="{{ URL('/register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}"
                    placeholder="Enter user name" required autofocus>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control"
                    placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                    placeholder="Confirm password" required>
            </div>

            <div class="form-actions">
                <a href="{{ URL('/login') }}" class="guest-link">Already registered?</a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Register
                </button>
            </div>
        </form>
    </div>
@endsection
