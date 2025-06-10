<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subject', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name',
            'code' => 'required|string|max:50|unique:subjects,code',
            'credit_hours' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string|max:1000',
            
        ]);

        try {
            DB::table('subjects')->insert([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'credit_hours' => $validated['credit_hours'],
                'description' => $validated['description'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Subject added successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { // Handle unique constraint violations
                return redirect()->back()->with('error', 'The name or code has already been taken.');
            }
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id, 
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id, 
            'credit_hours' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string|max:1000',
        ]);

        try {
            $subject->update([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'credit_hours' => $validated['credit_hours'],
                'description' => $validated['description'],
            ]);

            return redirect()->back()->with('success', 'Subject updated successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) { 
                return redirect()->back()->with('error', 'The name or code has already been taken.');
            }
            throw $e;
        }
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);  
        $subject->delete();
        return redirect()->back()->with('success', 'Subject deleted successfully!');
        
    }
}
