@extends('layouts.guest')

@section('title', 'Admin Login')

@section('content')
    <h1 class="page-title">Admin Login</h1>
    <p class="page-subtitle">Enter your admin credentials to access the dashboard.</p>

    <form method="POST" action="{{ route('admin.login.submit') }}">
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

        <button class="btn" type="submit">Log in as Admin</button>
    </form>

    <div class="link-row">
        <a href="{{ route('home') }}">Back to passcode</a>
    </div>
@endsection
