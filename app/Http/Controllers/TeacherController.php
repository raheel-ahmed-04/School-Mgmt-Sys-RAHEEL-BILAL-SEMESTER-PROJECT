<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $teachers = Teacher::with('classes')->get();
        return view('admin.teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:teachers,email',
            'expertise' => 'required',
            'contact_number' => 'required'
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->subject_expertise = $request->expertise;
        $teacher->contact_number = $request->contact_number;
        $teacher->save();
        return redirect()->back()->with('success', 'Teacher added successfully');
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'expertise' => 'required',
            'contact_number' => 'required'
        ]);
        $teacher = Teacher::find($request->id);
        if ($teacher) {
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->subject_expertise = $request->expertise;
            $teacher->contact_number = $request->contact_number;
            $teacher->save();
            return redirect()->route('admin.teacher')->with('success', 'Teacher updated successfully');
        } else {
            return redirect()->route('admin.teacher')->with('error', 'Teacher not found');
        }
    }

    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $teacher = Teacher::find($request->id);
        if ($teacher) {
            if ($teacher->classes()->count() > 0) {
                return redirect()->back()->with('error', 'Cannot delete teacher with assigned classes');
            }
            $teacher->delete();
            return redirect()->back()->with('success', 'Teacher deleted successfully');
        } else {
            return redirect()->route('admin.teacher')->with('error', 'Teacher not found');
        }
    }

    public function edit(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = $request->id;
        $teacher = Teacher::find($id);
        if ($teacher) {
            return view('admin.teacher_edit', compact('teacher'));
        } else {
            return redirect()->route('admin.teacher')->with('error', 'Teacher not found');
        }
    }
}
