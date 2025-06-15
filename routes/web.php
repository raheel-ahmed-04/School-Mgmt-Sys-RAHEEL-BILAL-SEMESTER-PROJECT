<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Student Management
Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

// Teacher Management
Route::get('/admin/teacher', [TeacherController::class, 'index'])->name('admin.teacher');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::put('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

// Class Management
Route::get('/admin/class', [ClassController::class, 'index'])->name('admin.class');
Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::post('/class/store', [ClassController::class, 'store'])->name('class.store');
Route::put('/class/update/{id}', [ClassController::class, 'update'])->name('class.update');
Route::delete('/class/destroy/{id}', [ClassController::class, 'destroy'])->name('class.destroy');
Route::post('/class/assign-student/{class_id}', [ClassController::class, 'assignStudent'])->name('class.assignStudent');

// Auth routes (handled by AdminController)
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
Route::post('/register', [AdminController::class, 'register']);
