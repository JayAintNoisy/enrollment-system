@extends('layouts.app')

@section('title', 'Enrollments')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Enrollments</h1>
            <p class="page-subtitle">Track which students are enrolled in each course.</p>
        </div>
        <div class="form-actions">
            <a class="btn btn-primary" href="{{ route('enrollments.create') }}">New Enrollment</a>
        </div>
    </div>

    <div class="card">
        @if($enrollments->isEmpty())
            <div class="alert">No enrollments yet. Create a new enrollment to assign a student to a course.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Enrolled At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->student->name }}</td>
                            <td>{{ $enrollment->course->course_name }}</td>
                            <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection