<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dashboard()
    {
        $students = Student::count();
        $courses = Course::count();
        $enrollments = Enrollment::count();

        return view('admin.dashboard', compact('students', 'courses', 'enrollments'));
    }
}
