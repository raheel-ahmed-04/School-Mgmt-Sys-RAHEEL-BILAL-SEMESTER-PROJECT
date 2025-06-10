<?php

namespace App\Http\Controllers;
use App\Models\Classname;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classname::all();
        $teachers = Teacher::all();
        $std = Student::all();
        return view('admin.classname', compact('classes','teachers','std'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classnames,name',
            'teacher_id' => 'required|exists:teachers,id',
            
        ]);

        try {
            DB::table('classnames')->insert([
                'name' => $validated['name'],
                'teacher_id' => $validated['teacher_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Class added successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $errorMessage = 'The class name has already been taken.';
                return redirect()->back()->with('error', $errorMessage);
            }
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classnames,name,' . $id, 
            'teacher_id' => 'required|exists:teachers,id',
            
        ]);

        try {
            
            $class = DB::table('classnames')->where('id', $id)->first();

            DB::table('classnames')->where('id', $id)->update([
                'name' => $validated['name'],
                'teacher_id' => $validated['teacher_id'],
                
            ]);

            return redirect()->back()->with('success', 'Class updated successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $errorMessage = 'The class name has already been taken.';
                return redirect()->back()->with('error', $errorMessage);
            }
            throw $e;
        }
    }
    public function destroy($id)
    {
        $class = Classname::find($id);
        $class->delete();
        return redirect()->back()->with('success', 'Class deleted successfully!');
        
    }


}
