<?php

namespace App\Http\Controllers;
use App\Models\Class_subject;
use App\Models\Teacher;
use App\Models\Slot;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $slots = Slot::all();
        $teachers = Teacher::all();
        $classSubjects = Class_subject::all();
        $timetables = Timetable::all();
        return view('admin.timetable', compact('slots','teachers','classSubjects','timetables'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class_subject_id' => 'required|exists:class_subjects,id', 
            'teacher_id' => 'required|exists:teachers,id', 
            'slot_id' => 'required|exists:slots,id', 
            'room_number' => 'nullable|string|max:255', 
        ]);

        try {
            $timetable = new Timetable();
            $timetable->class_subject_id = $validatedData['class_subject_id'];
            $timetable->teacher_id = $validatedData['teacher_id'];
            $timetable->slot_id = $validatedData['slot_id'];
            $timetable->room_number = $validatedData['room_number']; 
            $timetable->save();

            return redirect()->back()->with('success', 'Timetable entry created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create timetable entry. ' . $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class_subject_id' => 'required|exists:class_subjects,id', 
            'teacher_id' => 'required|exists:teachers,id', 
            'slot_id' => 'required|exists:slots,id', 
            'room_number' => 'nullable|string|max:255', 
        ]);

        try {
            $timetable = Timetable::findOrFail($id);
            $timetable->class_subject_id = $validatedData['class_subject_id'];
            $timetable->teacher_id = $validatedData['teacher_id'];
            $timetable->slot_id = $validatedData['slot_id'];
            $timetable->room_number = $validatedData['room_number'];
            $timetable->save();

            return redirect()->back()->with('success', 'Timetable entry updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update timetable entry. ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $timetable = Timetable::find($id);
        $timetable->delete();
        return redirect()->back()->with('success', 'Timetable entry deleted successfully!');
        
    }


    
}
