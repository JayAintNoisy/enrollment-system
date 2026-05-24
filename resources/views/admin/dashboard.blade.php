@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Admin Dashboard</h1>
            <p class="page-subtitle">Overview of students, courses, and enrollments.</p>
        </div>
        <div class="form-actions">
            <a class="btn btn-primary" href="{{ route('students.create') }}">Add Student</a>
            <a class="btn btn-secondary" href="{{ route('courses.create') }}">Add Course</a>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <strong>{{ $students }}</strong>
            Total Students
        </div>
        <div class="stat-card">
            <strong>{{ $courses }}</strong>
            Total Courses
        </div>
        <div class="stat-card">
            <strong>{{ $enrollments }}</strong>
            Total Enrollments
        </div>
    </div>

    <div class="card card-section">
        <h2 style="margin-top: 0;">Quick Actions</h2>
        <div class="form-actions" style="justify-content: flex-start;">
            <a class="btn btn-primary" href="{{ route('enrollments.create') }}">Enroll Student</a>
            <a class="btn btn-secondary" href="{{ route('students.index') }}">Manage Students</a>
        </div>
    </div>
@endsection
