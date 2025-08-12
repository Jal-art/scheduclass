<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::with(['teacher', 'subject'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,subject_id'
        ]);

        return Teacher::create($request->all());
    }

    public function show($id)
    {
        return Teacher::with(['teacher', 'subject'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $teacherSubject = Teacher::findOrFail($id);
        $teacherSubject->update($request->all());
        return $teacherSubject;
    }

    public function destroy($id)
    {
        return Teacher::destroy($id);
    }
}
