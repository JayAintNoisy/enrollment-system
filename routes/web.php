<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', [StudentAuthController::class, 'showPasscodeForm'])->name('home');
Route::post('access', [StudentAuthController::class, 'checkPasscode'])->name('access.submit');

Route::get('admin/login', fn () => redirect()->route('home'))->name('admin.login');
Route::post('admin/login', fn () => redirect()->route('home'))->name('admin.login.submit');

Route::get('admin', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(\App\Http\Middleware\EnsurePasscode::class);
Route::get('admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard.alt')->middleware(\App\Http\Middleware\EnsurePasscode::class);

Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout');

Route::middleware(\App\Http\Middleware\EnsurePasscode::class)->group(function () {
    Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('courses', CourseController::class)->only(['index', 'create', 'store']);
    Route::resource('enrollments', EnrollmentController::class)->only(['index', 'create', 'store']);
});