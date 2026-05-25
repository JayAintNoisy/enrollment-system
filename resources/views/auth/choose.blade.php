@extends('layouts.guest')

@section('title', 'Enrollment Portal')

@section('content')
    <h1 class="page-title">Access Granted</h1>
    <p class="page-subtitle">You have entered the assigned classroom passcode. Please choose your portal.</p>

    <div style="display: grid; gap: 16px;">
        <a href="{{ route('login') }}" class="btn" style="background: #2563eb; text-align: center; display: block;">Student Login</a>
        <a href="{{ route('register') }}" class="btn" style="background: #10b981; text-align: center; display: block;">Student Sign Up</a>
        <a href="{{ route('admin.login') }}" class="btn" style="background: #7c3aed; text-align: center; display: block;">Admin Login</a>
    </div>

    <div class="link-row" style="margin-top: 18px;">
        <a href="{{ route('home') }}">Enter a different passcode</a>
    </div>
@endsection
