<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class StudentController extends AdminController
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|string|max:50|unique:students,student_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'course' => 'required|string|max:255',
        ]);

        Student::create($request->only(['student_number', 'name', 'email', 'course']));

        return redirect()->route('students.index')->with('status', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $courses = Course::all();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_number' => 'required|string|max:50|unique:students,student_number,' . $student->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'course' => 'required|string|max:255',
        ]);

        $student->update($request->only(['student_number', 'name', 'email', 'course']));

        return redirect()->route('students.index')->with('status', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('status', 'Student deleted successfully.');
    }
}
