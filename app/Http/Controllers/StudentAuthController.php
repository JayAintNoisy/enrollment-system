<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    public function showPasscodeForm(Request $request)
    {
        if ($request->session()->get('access_granted')) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.passcode');
    }

    public function checkPasscode(Request $request)
    {
        $request->validate([
            'passcode' => 'required|string',
        ]);

        $expected = config('access.passcode');

        if ($request->passcode !== $expected) {
            return back()->withErrors(['passcode' => 'The passcode is incorrect. Please ask your school administrator for the assigned classroom code.'])->withInput();
        }

        $request->session()->put('access_granted', true);

        return redirect()->route('admin.dashboard')->with('status', 'Access granted. Welcome to the admin dashboard.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['student_id', 'admin_id', 'access_granted']);

        return redirect()->route('home')->with('status', 'You have been logged out.');
    }
}
