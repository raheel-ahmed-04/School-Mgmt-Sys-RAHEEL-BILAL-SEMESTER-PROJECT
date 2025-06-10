<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Classname;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classes = Classname::all();
        return view('admin.student', compact('students','classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|string|max:255|unique:students,roll_number',
            'class_id' => 'required|exists:classnames,id',
            'dob' => 'required|date',
            'parentContact' => 'required|string|max:15',

        ]);

        try {
            DB::table('students')->insert([
                'name' => $validated['name'],
                'roll_number' => $validated['roll'],
                'class_id' => $validated['class_id'],
                'date_of_birth' => $validated['dob'],
                'parent_contact' => $validated['parentContact'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Student added successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'The roll number has already been taken.');
            }
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
       
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'roll' => 'required|string|max:255|unique:students,roll_number,' . $student->id, 
            'class_id' => 'required|exists:classnames,id',
            'dob' => 'required|date',
            'parentContact' => 'required|string|max:15',
        ]);

        try {
            $student->update([
                'name' => $validated['name'],
                'roll_number' => $validated['roll'],
                'class_id' => $validated['class_id'],
                'date_of_birth' => $validated['dob'],
                'parent_contact' => $validated['parentContact'],
            ]);

            return redirect()->back()->with('success', 'Student updated successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'The roll number has already been taken.');
            }
            throw $e;
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('success', 'Student deleted successfully!');
       
    }


}
