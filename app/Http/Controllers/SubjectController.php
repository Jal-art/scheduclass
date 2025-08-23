<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects,subject_code',
        ]);

        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'subject_description' => $request->subject_description,
            'subject_created_by' => auth()->id() ?? 1,
        ]);

        return redirect()->route('subjects.index')->with('success','Subject created successfully.');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects,subject_code,'.$subject->subject_id.',subject_id',
        ]);

        $subject->update([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'subject_description' => $request->subject_description,
            'subject_updated_by' => auth()->id() ?? 1,
        ]);

        return redirect()->route('subjects.index')->with('success','Subject updated successfully.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update(['subject_deleted_by' => auth()->id() ?? 1]);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success','Subject deleted successfully.');
    }
}
