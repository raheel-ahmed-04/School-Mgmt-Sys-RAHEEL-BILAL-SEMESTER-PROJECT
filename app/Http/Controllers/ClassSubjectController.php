<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Classname;
use App\Models\Class_subject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $classes = Classname::all();
        $classsubjects = Class_subject::all();
        return view('admin.classwisesubject', compact('subjects','classes','classsubjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classnames,id',  
            'subjects' => 'required|array',  
            'subjects.*' => 'exists:subjects,id',  
        ]);

        $classId = $request->input('class_id');
        $subjectIds = $request->input('subjects');  

        foreach ($subjectIds as $subjectId) {
            Class_subject::create([
                'class_id' => $classId,
                'subject_id' => $subjectId,
            ]);
        }

        return redirect()->back()->with('success', 'Subjects assigned successfully to the class');
    }

    public function update(Request $request, $id)
    {
        
        $classwiseSubject = Class_subject::findOrFail($id);

        $classwiseSubject->class_id = $request->input('class_id');
        $classwiseSubject->subject_id = $request->input('subject_id');

        $classwiseSubject->save();

        return redirect()->back()->with('success', 'Assigned Subject to class updated successfully!');
    } 
    
    public function destroy($id)
    {
        $classsubject = Class_subject::find($id);
        $classsubject->delete();
        return redirect()->back()->with('success', 'Assigned Subject to class deleted successfully!');
    }
}
