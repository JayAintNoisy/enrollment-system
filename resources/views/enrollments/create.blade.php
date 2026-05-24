@extends('layouts.student')

@section('title', 'New Enrollment')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Enroll Student</h1>
            <p class="page-subtitle">Select a student and a course to create a new enrollment.</p>
        </div>
    </div>

    <div class="card" style="max-width: 700px; margin: 0 auto;">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <label for="student_id">Student</label>
            <select id="student_id" class="form-field" name="student_id" required>
                <option value="">Select a student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->student_number }})</option>
                @endforeach
            </select>
            @error('student_id')<div class="alert">{{ $message }}</div>@enderror

            <label for="course_id">Course</label>
            <select id="course_id" class="form-field" name="course_id" required>
                <option value="">Select a course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->course_code }} — {{ $course->course_name }}</option>
                @endforeach
            </select>
            @error('course_id')<div class="alert">{{ $message }}</div>@enderror

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Enroll Student</button>
                <a class="btn btn-secondary" href="{{ route('enrollments.index') }}">Back to Enrollments</a>
            </div>
        </form>
    </div>
@endsection