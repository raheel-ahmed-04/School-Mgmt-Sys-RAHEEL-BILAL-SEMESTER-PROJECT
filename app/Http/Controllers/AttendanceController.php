<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'attendances' => 'required|array',
            'attendances.*.student_id' => 'required|exists:students,id',
            'attendances.*.status' => 'required|boolean',
        ]);

        foreach ($data['attendances'] as $attendance) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $attendance['student_id'],
                    'date' => $data['date'],
                ],
                ['status' => $attendance['status']]
            );
        }

        return redirect()->back()->with('success', 'Attendance marked successfully.');
    }

    public function history($classId)
    {
        $attendances = Attendance::whereHas('student', function ($query) use ($classId) {
            $query->where('class_id', $classId);
        })
        ->whereMonth('date', now()->month)
        ->with(['student.class'])
        ->get();

        return view('teacher.attendancehistory', compact('attendances'));
    }

}
