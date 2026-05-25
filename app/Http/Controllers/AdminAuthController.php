<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    protected function ensureAccessGranted(Request $request)
    {
        if (! $request->session()->get('access_granted')) {
            return redirect()->route('home')->with('status', 'Enter the assigned passcode to continue.');
        }

        return null;
    }

    public function showLoginForm(Request $request)
    {
        if ($redirect = $this->ensureAccessGranted($request)) {
            return $redirect;
        }

        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        if ($redirect = $this->ensureAccessGranted($request)) {
            return $redirect;
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! $user->isAdmin() || ! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our admin records.'])->withInput();
        }

        $request->session()->forget('student_id');
        session(['admin_id' => $user->id]);

        return redirect()->route('admin.dashboard')->with('status', 'Welcome back, ' . $user->name . '!');
    }

    public function dashboard(Request $request)
    {
        if ($redirect = $this->ensureAccessGranted($request)) {
            return $redirect;
        }

        $students = \App\Models\Student::count();
        $courses = \App\Models\Course::count();
        $enrollments = \App\Models\Enrollment::count();

        return view('admin.dashboard', compact('students', 'courses', 'enrollments'));
    }
}
