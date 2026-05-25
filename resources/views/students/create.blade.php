@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Add Student</h1>
            <p class="page-subtitle">Register a new student and select their program.</p>
        </div>
    </div>

    <div class="card" style="max-width: 720px; margin: 0 auto;">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <label for="student_number">Student Number</label>
            <input id="student_number" class="form-field" type="text" name="student_number" value="{{ old('student_number') }}" placeholder="Student Number" required>
            @error('student_number')<div class="alert">{{ $message }}</div>@enderror

            <label for="name">Name</label>
            <input id="name" class="form-field" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
            @error('name')<div class="alert">{{ $message }}</div>@enderror

            <label for="email">Email</label>
            <input id="email" class="form-field" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
            @error('email')<div class="alert">{{ $message }}</div>@enderror

            <label for="course">Program</label>
            <select id="course" class="form-field" name="course" required>
                <option value="">Select program</option>
                @foreach($courses as $course)
                    <option value="{{ $course->course_name }}" {{ old('course') === $course->course_name ? 'selected' : '' }}>{{ $course->course_code }} — {{ $course->course_name }}</option>
                @endforeach
            </select>
            @error('course')<div class="alert">{{ $message }}</div>@enderror

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save Student</button>
                <a class="btn btn-secondary" href="{{ route('students.index') }}">Back to Students</a>
            </div>
        </form>
    </div>
@endsection