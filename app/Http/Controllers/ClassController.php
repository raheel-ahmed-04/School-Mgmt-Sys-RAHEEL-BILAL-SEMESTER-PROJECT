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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $classes = Classname::all();
        $teachers = Teacher::all();
        return view('admin.class', compact('classes', 'teachers'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);
        // Manual check for teacher assignment
        if ($request->teacher_id) {
            $alreadyAssigned = Classname::where('teacher_id', $request->teacher_id)->exists();
            if ($alreadyAssigned) {
                return redirect()->back()->with('error', 'This teacher is already assigned to another class.');
            }
        }
        $class = new Classname();
        $class->name = $request->name;
        $class->teacher_id = $request->teacher_id;
        $class->save();
        return redirect()->back()->with('success', 'Class created successfully');
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'teacher_id' => 'nullable|exists:teachers,id',
        ]);
        // Manual check for teacher assignment (excluding current class)
        if ($request->teacher_id) {
            $alreadyAssigned = Classname::where('teacher_id', $request->teacher_id)
                ->where('id', '!=', $request->id)
                ->exists();
            if ($alreadyAssigned) {
                return redirect()->route('admin.class')->with('error', 'This teacher is already assigned to another class.');
            }
        }
        $class = Classname::find($request->id);
        if ($class) {
            $class->name = $request->name;
            $class->teacher_id = $request->teacher_id;
            $class->save();
            return redirect()->route('admin.class')->with('success', 'Class updated successfully');
        } else {
            return redirect()->route('admin.class')->with('error', 'Class not found');
        }
    }

    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $class = Classname::find($request->id);
        if ($class) {
            $class->delete();
            return redirect()->back()->with('success', 'Class deleted successfully');
        } else {
            return redirect()->route('admin.class')->with('error', 'Class not found');
        }
    }

    public function edit(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = $request->id;
        $class = Classname::find($id);
        $teachers = Teacher::all();
        if ($class) {
            return view('admin.class_edit', compact('class', 'teachers'));
        } else {
            return redirect()->route('admin.class')->with('error', 'Class not found');
        }
    }
}
