@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Add Course</h1>
            <p class="page-subtitle">Create a new course program for students to enroll into.</p>
        </div>
    </div>

    <div class="card" style="max-width: 700px; margin: 0 auto;">
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <label for="course_code">Course Code</label>
            <input id="course_code" class="form-field" type="text" name="course_code" value="{{ old('course_code') }}" placeholder="BSIT" required>
            @error('course_code')<div class="alert">{{ $message }}</div>@enderror

            <label for="course_name">Course Name</label>
            <input id="course_name" class="form-field" type="text" name="course_name" value="{{ old('course_name') }}" placeholder="Bachelor of Science in Information Technology" required>
            @error('course_name')<div class="alert">{{ $message }}</div>@enderror

            <label for="units">Units</label>
            <input id="units" class="form-field" type="number" name="units" value="{{ old('units') }}" placeholder="Units" min="1" required>
            @error('units')<div class="alert">{{ $message }}</div>@enderror

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save Course</button>
                <a class="btn btn-secondary" href="{{ route('courses.index') }}">Back to Courses</a>
            </div>
        </form>
    </div>
@endsection