<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $students = Student::all();
        $classes = Classname::all();
        return view('admin.student', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required',
            'roll_number' => 'required',
            'class_id' => 'required',
            'date_of_birth' => 'required',
            'parent_contact' => 'required'
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->roll_number = $request->roll_number;
        $student->class_id = $request->class_id;
        $student->date_of_birth = $request->date_of_birth;
        $student->parent_contact = $request->parent_contact;
        $student->save();
        return redirect()->back()->with('success', 'Student added successfully');
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'roll_number' => 'required',
            'class_id' => 'required',
            'date_of_birth' => 'required',
            'parent_contact' => 'required'
        ]);
        $student = Student::find($request->id);
        if ($student) {
            $student->name = $request->name;
            $student->roll_number = $request->roll_number;
            $student->class_id = $request->class_id;
            $student->date_of_birth = $request->date_of_birth;
            $student->parent_contact = $request->parent_contact;
            $student->save();
            return redirect()->route('admin.student')->with('success', 'Student updated successfully');
        } else {
            return redirect()->route('admin.student')->with('error', 'Student not found');
        }
    }

    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $student = Student::find($request->id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully');
        } else {
            return redirect()->route('admin.student')->with('error', 'Student not found');
        }
    }

    public function edit(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = $request->id;
        $student = Student::find($id);
        $classes = Classname::all();
        if ($student) {
            return view('admin.student_edit', compact('student', 'classes'));
        } else {
            return redirect()->route('admin.student')->with('error', 'Student not found');
        }
    }
}
