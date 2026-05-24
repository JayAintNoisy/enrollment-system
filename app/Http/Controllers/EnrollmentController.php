<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends AdminController
{
    public function index()
    {
        $enrollments = Enrollment::with('student', 'course')->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        if ($courses->isEmpty()) {
            $courses = $this->seedDefaultCourses();
        }

        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::firstOrCreate([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('enrollments.index');
    }

    protected function seedDefaultCourses()
    {
        $defaultCourses = [
            ['course_code' => 'BSIT', 'course_name' => 'Bachelor of Science in Information Technology', 'units' => 12],
            ['course_code' => 'BEED', 'course_name' => 'Bachelor of Elementary Education', 'units' => 18],
            ['course_code' => 'BSHM', 'course_name' => 'Bachelor of Science in Hospitality Management', 'units' => 15],
            ['course_code' => 'BSED', 'course_name' => 'Bachelor of Secondary Education', 'units' => 18],
        ];

        foreach ($defaultCourses as $course) {
            Course::firstOrCreate(
                ['course_code' => $course['course_code']],
                ['course_name' => $course['course_name'], 'units' => $course['units']]
            );
        }

        return Course::all();
    }
}