@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Students</h1>
            <p class="page-subtitle">Manage student records and assign each student to a program.</p>
        </div>
        <div class="form-actions">
            <a class="btn btn-primary" href="{{ route('students.create') }}">Add Student</a>
            <a class="btn btn-secondary" href="{{ route('enrollments.create') }}">Enroll Student</a>
        </div>
    </div>

    <div class="card">
        @if($students->isEmpty())
            <div class="alert">No student records found yet. Start by adding a new student.</div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Program</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course }}</td>
                            <td style="text-align: center;">
                                <div style="display: flex; gap: 8px; justify-content: center;">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn" style="background: #3b82f6; color: white; padding: 6px 12px; font-size: 0.85rem; border-radius: 8px; text-decoration: none;">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this student?');" style="background: #ef4444; color: white; padding: 6px 12px; font-size: 0.85rem; border-radius: 8px; border: none; cursor: pointer;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection