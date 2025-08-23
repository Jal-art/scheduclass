<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('usr_role_id', 2)
                        ->with('teacherSubjects.subject')
                        ->get();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usr_name' => 'required|string|max:255',
            'usr_email' => 'required|email|unique:users,usr_email',
            'usr_password' => 'required|min:8',
            'subjects' => 'array',
        ]);

        // Buat user baru role guru
        $teacher = User::create([
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
            'usr_password' => bcrypt($request->usr_password),
            'usr_role_id' => 2, // Guru
        ]);

        // Simpan relasi ke subject
        if ($request->subjects) {
            foreach ($request->subjects as $subject_id) {
                TeacherSubject::create([
                    'ts_teacher_id' => $teacher->usr_id,
                    'ts_subject_id' => $subject_id,
                ]);
            }
        }

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $teacher = User::with('teacherSubjects')->findOrFail($id);
        $subjects = Subject::all();
        $selectedSubjects = $teacher->teacherSubjects->pluck('ts_subject_id')->toArray();

        return view('teachers.edit', compact('teacher', 'subjects', 'selectedSubjects'));
    }

    public function update(Request $request, $id)
    {
        $teacher = User::findOrFail($id);

        $request->validate([
            'usr_name' => 'required|string|max:255',
            'usr_email' => 'required|email|unique:users,usr_email,' . $teacher->usr_id . ',usr_id',
            'subjects' => 'array',
        ]);

        $teacher->update([
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
        ]);

        // Update subjects
        TeacherSubject::where('ts_teacher_id', $teacher->usr_id)->delete();
        if ($request->subjects) {
            foreach ($request->subjects as $subject_id) {
                TeacherSubject::create([
                    'ts_teacher_id' => $teacher->usr_id,
                    'ts_subject_id' => $subject_id,
                ]);
            }
        }

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus.');
    }
}
