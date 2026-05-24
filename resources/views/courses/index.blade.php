@extends('layouts.student')

@section('title', 'Courses')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Courses</h1>
            <p class="page-subtitle">Manage course offerings for the enrollment system.</p>
        </div>
        <div class="form-actions">
            <a class="btn btn-primary" href="{{ route('courses.create') }}">Add Course</a>
        </div>
    </div>

    <div class="card">
        @if($courses->isEmpty())
            <div class="alert">No courses available yet. Add a course to let students enroll.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Units</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->units }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection