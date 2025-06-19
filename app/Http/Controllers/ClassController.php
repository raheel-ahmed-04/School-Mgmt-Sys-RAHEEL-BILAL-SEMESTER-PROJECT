<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $classes = Classname::with(['teacher', 'students'])->get();
        $teachers = Teacher::all();
        return view('admin.class', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required|unique:classnames',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);
        $class = new Classname();
        $class->name = $request->name;
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return redirect()->back()->with('success', 'Class created successfully');
    }

    public function update(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate([
            'id' => 'required|exists:classnames,id',
            'name' => 'required|unique:classnames,name,' . $request->id,
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);
        $class = Classname::findOrFail($request->id);
        $class->name = $request->name;
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return redirect()->route('admin.class')->with('success', 'Class updated successfully');
    }

    public function destroy(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate(['id' => 'required|exists:classnames,id']);
        $class = Classname::findOrFail($request->id);
        // Optionally, unassign students from this class
        \App\Models\Student::where('class_id', $request->id)->update(['class_id' => null]);
        $class->delete();
        return redirect()->back()->with('success', 'Class deleted successfully');
    }

    public function assignStudent(Request $request, $class_id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);
        $student = Student::findOrFail($request->student_id);
        $student->class_id = $class_id;
        $student->save();
        return redirect()->back()->with('success', 'Student assigned to class');
    }

    public function edit(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $id = $request->id;
        $class = Classname::findOrFail($id);
        $teachers = Teacher::all();
        return view('admin.class_edit', compact('class', 'teachers'));
    }
}
