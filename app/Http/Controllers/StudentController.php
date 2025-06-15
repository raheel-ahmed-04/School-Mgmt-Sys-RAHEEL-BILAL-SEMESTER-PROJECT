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
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $students = Student::with('class')->get();
        $classes = Classname::all();
        return view('admin.student', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required',
            'roll_number' => 'required|unique:students',
            'class_id' => 'required',
            'date_of_birth' => 'required|date',
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

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required',
            'roll_number' => 'required|unique:students,roll_number,' . $id,
            'class_id' => 'required|exists:classnames,id',
            'date_of_birth' => 'required|date',
            'parent_contact' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->roll_number = $request->roll_number;
        $student->class_id = $request->class_id;
        $student->date_of_birth = $request->date_of_birth;
        $student->parent_contact = $request->parent_contact;
        $student->save();

        return redirect()->route('admin.student')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $student = Student::findOrFail($id);
        $classes = Classname::all();
        return view('admin.student_edit', compact('student', 'classes'));
    }
}
