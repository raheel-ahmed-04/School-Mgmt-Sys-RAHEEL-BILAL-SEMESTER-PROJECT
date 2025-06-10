<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'subject_expertise' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
        ]);

        try {
            DB::table('teachers')->insert([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject_expertise' => $validated['subject_expertise'],
                'contact_number' => $validated['contact_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Teacher added successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'The email has already been taken.');
            }
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id, 
            'subject_expertise' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
        ]);

        try {
            $teacher->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject_expertise' => $validated['subject_expertise'],
                'contact_number' => $validated['contact_number'],
            ]);

            return redirect()->back()->with('success', 'Teacher updated successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'The email has already been taken.');
            }
            throw $e;
        }
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'Teacher deleted successfully!');
        
    }
}
