@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Welcome, {{ $student->name }}</h1>
            <p class="page-subtitle">This is your student portal. Review your selected program and enrollments.</p>
        </div>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button class="btn btn-secondary" type="submit">Log out</button>
        </form>
    </div>

    <div class="card">
        <h2 style="margin-top:0;">Your profile</h2>
        <div class="card-section">
            <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Program:</strong> {{ $student->course }}</p>
        </div>
    </div>

    <div class="card card-section">
        <h2 style="margin-top:0;">Enrolled courses</h2>
        @if($student->courses->isEmpty())
            <div class="alert">You do not have any enrolled courses yet.</div>
        @else
            <ul style="padding-left: 20px; margin: 0;">
                @foreach($student->courses as $course)
                    <li style="margin-bottom: 8px;">{{ $course->course_code }} — {{ $course->course_name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
