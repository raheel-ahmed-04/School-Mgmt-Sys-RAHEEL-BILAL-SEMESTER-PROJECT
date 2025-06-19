<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $teachers = Teacher::with('classes')->get();
        return view('admin.teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
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
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate([
            'id' => 'required|exists:teachers,id',
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $request->id,
            'expertise' => 'required',
            'contact_number' => 'required'
        ]);
        $teacher = Teacher::findOrFail($request->id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->subject_expertise = $request->expertise;
        $teacher->contact_number = $request->contact_number;
        $teacher->save();
        return redirect()->route('admin.teacher')->with('success', 'Teacher updated successfully');
    }

    public function destroy(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $request->validate(['id' => 'required|exists:teachers,id']);
        $teacher = Teacher::findOrFail($request->id);
        if ($teacher->classes()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete teacher with assigned classes');
        }
        $teacher->delete();
        return redirect()->back()->with('success', 'Teacher deleted successfully');
    }

    public function edit(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $id = $request->id;
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher_edit', compact('teacher'));
    }
}
