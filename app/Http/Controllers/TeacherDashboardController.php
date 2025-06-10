<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\timetable;
use App\Models\Slot;
use App\Models\Classname;
use App\Models\Student;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $teachers = Teacher::all();
        $teacher = Teacher::where('email', $user->email)->first();
        $isTeacher = $teachers->contains('email', $user->email);
        return view('teacher.dashboard',compact('user','teacher','isTeacher')); 
    }
    public function timetable()
    {
        $timetables = Timetable::all();
        $slots = Slot::all();
        return view('teacher.timetable', compact('timetables', 'slots')); 
    }
    
    public function mytimetable($teacherId) 
    {
        $teacher = Teacher::find($teacherId); 
        $timetables = Timetable::where('teacher_id', $teacherId)->get(); 
        $slots = Slot::all(); 
        return view('teacher.mytimetable', compact('teacher', 'timetables', 'slots'));
    }

    public function assignclass($teacherId)
    {
        $classes = Classname::where('teacher_id', $teacherId)->get(); 
        $std = Student::all();
        return view('teacher.assignclass', compact('classes','std'));
    }

    public function attendance($teacherId)
    {
        $classes = Classname::where('teacher_id', $teacherId)->get(); 
        $std = Student::all();
        return view('teacher.attendance', compact('classes','std'));
    }


}
