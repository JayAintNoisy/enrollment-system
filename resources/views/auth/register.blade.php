@extends('layouts.guest')

@section('title', 'Student Sign Up')

@section('content')
    <h1 class="page-title">Student Sign Up</h1>
    <p class="page-subtitle">Create your student account to access enrollments and course details.</p>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <label for="student_number">Student Number</label>
        <input id="student_number" class="form-field" type="text" name="student_number" value="{{ old('student_number') }}" placeholder="Student Number" required>
        @error('student_number')<div class="alert">{{ $message }}</div>@enderror

        <label for="name">Name</label>
        <input id="name" class="form-field" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
        @error('name')<div class="alert">{{ $message }}</div>@enderror

        <label for="email">Email</label>
        <input id="email" class="form-field" type="email" name="email" value="{{ old('email') }}" placeholder="Email address" required>
        @error('email')<div class="alert">{{ $message }}</div>@enderror

        <label for="course">Course</label>
        <input id="course" class="form-field" type="text" name="course" value="{{ old('course') }}" placeholder="Course name" required>
        @error('course')<div class="alert">{{ $message }}</div>@enderror

        <label for="password">Password</label>
        <input id="password" class="form-field" type="password" name="password" placeholder="Password" required>
        @error('password')<div class="alert">{{ $message }}</div>@enderror

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" class="form-field" type="password" name="password_confirmation" placeholder="Confirm password" required>

        <button class="btn" type="submit">Create Account</button>
    </form>

    <div class="link-row">
        <span>Already have an account?</span>
        <a href="{{ route('login') }}">Log in</a>
    </div>
@endsection
