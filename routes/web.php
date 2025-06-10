<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

    Route::get('/admin/subject', [SubjectController::class, 'index'])->name('teasubjectchers.index');
    Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::put('/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

    Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::put('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    Route::get('/admin/class', [ClassController::class, 'index'])->name('class.index');
    Route::post('/class/store', [ClassController::class, 'store'])->name('class.store');
    Route::put('/class/update/{id}', [ClassController::class, 'update'])->name('class.update');
    Route::delete('/class/{id}', [ClassController::class, 'destroy'])->name('class.destroy');

    Route::get('/admin/classwisesubject', [ClassSubjectController::class, 'index'])->name('classwise.subject.index');
    Route::post('/classwisesubject/store', [ClassSubjectController::class, 'store'])->name('classwise.subject.store');
    Route::put('/classwisesubject/update/{classId}', [ClassSubjectController::class, 'update'])->name('classwise.subject.update');
    Route::delete('/classwise-subject/destroy/{id}', [ClassSubjectController::class, 'destroy'])->name('classwise.subject.destroy');

    Route::get('/admin/timetable', [TimetableController::class, 'index'])->name('timetable.index');
    Route::post('/timetable/store', [TimetableController::class, 'store'])->name('timetable.store');
    Route::put('/timetable/update/{id}', [TimetableController::class, 'update'])->name('timetable.update');
    Route::delete('/timetable/destroy/{id}', [TimetableController::class, 'destroy'])->name('timetable.destroy');

});

Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/teacher/timetable', [TeacherDashboardController::class, 'timetable'])->name('dashboard.timetable');
    Route::get('/teacher/timetable/{teacherId}', [TeacherDashboardController::class, 'mytimetable'])->name('teacher.mytimetable');
    Route::get('/teacher/{teacherId}/assignclass', [TeacherDashboardController::class, 'assignclass'])->name('teacher.assignclass');
    Route::get('/teacher/{teacherId}/attendance', [TeacherDashboardController::class, 'attendance'])->name('teacher.attendance');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::put('/attendance/update/{class}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::get('/attendance/history/{classId}', [AttendanceController::class, 'history'])->name('attendance.history');

});
