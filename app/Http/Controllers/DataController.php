<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\ClassLevel;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function jadwal()
    {
        $classLevels = ClassLevel::all();
        return view('data.jadwal', compact('classLevels'));
    }

    public function guru()
    {
        $teachers = User::where('usr_role_id', 2)
                        ->with('teacherSubjects.subject')
                        ->get();
        return view('data.guru', compact('teachers'));
    }

    public function kelas()
    {
        $classLevels = ClassLevel::all();
        return view('data.kelas', compact('classLevels'));
    }

    public function siswa()
    {
        $students = User::where('usr_role_id', 3)
                       ->with(['classLevel', 'major'])
                       ->get();
        return view('data.siswa', compact('students'));
    }

    public function mapel()
    {
        $subjects = Subject::all();
        return view('data.mapel', compact('subjects'));
    }

    public function user()
    {
        $users = User::with('role')->get();
        return view('data.user', compact('users'));
    }
}