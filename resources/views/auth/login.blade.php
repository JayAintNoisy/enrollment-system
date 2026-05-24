@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <div class="card" style="max-width: 500px; margin: 0 auto;">
        <div class="page-header" style="flex-direction: column; align-items: flex-start; gap: 8px; margin-bottom: 20px;">
            <div>
                <h1 class="page-title">Admin Login</h1>
                <p class="page-subtitle">Sign in to manage students, courses, and enrollments.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <label for="email">Email</label>
            <input id="email" class="form-field" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="alert">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" class="form-field" type="password" name="password" required>
            @error('password')
                <div class="alert">{{ $message }}</div>
            @enderror

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Log in</button>
            </div>
        </form>
    </div>
@endsection
