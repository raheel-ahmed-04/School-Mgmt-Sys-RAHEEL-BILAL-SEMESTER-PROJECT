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

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,'.$id,
            'expertise' => 'required',
            'contact_number' => 'required'
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->subject_expertise = $request->expertise;
        $teacher->contact_number = $request->contact_number;
        $teacher->save();

        return redirect()->route('admin.teacher')->with('success', 'Teacher updated successfully');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }

        $teacher = Teacher::findOrFail($id);
        
        // Check if teacher has assigned classes
        if ($teacher->classes()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete teacher with assigned classes');
        }

        $teacher->delete();
        return redirect()->back()->with('success', 'Teacher deleted successfully');
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login');
        }
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher_edit', compact('teacher'));
    }
}
