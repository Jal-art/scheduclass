<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:100',
            'major_id' => 'nullable|exists:majors,major_id'
        ]);

        return Subject::create($request->all());
    }

    public function show($id)
    {
        return Subject::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        return $subject;
    }

    public function destroy($id)
    {
        return Subject::destroy($id);
    }
}
