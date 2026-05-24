<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', [AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin', [AuthController::class, 'dashboard'])->name('admin.dashboard.alt');

Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('courses', CourseController::class)->only(['index', 'create', 'store']);
Route::resource('enrollments', EnrollmentController::class)->only(['index', 'create', 'store']);