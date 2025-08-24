<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\ClassLevel;
use App\Models\Major;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Statistik untuk dashboard
        $stats = [
            'schedules' => Schedule::count(),
            'teachers' => User::where('usr_role_id', 2)->count(), // Role Teacher
            'students' => User::where('usr_role_id', 3)->count(), // Role Student  
            'subjects' => Subject::count(),
            'classLevels' => ClassLevel::count(),
            'majors' => Major::count(),
            'users' => User::count(),
        ];

        // Cek role user untuk menentukan dashboard mana yang ditampilkan
        if ($user->usr_role_id == 1) { // Role Kurikulum/Admin
            return view('dashboard.admin', compact('user', 'stats'));
        } else { // Role Teacher atau Student
            // Ambil jadwal untuk guru/siswa
            $schedules = [];
            if ($user->usr_role_id == 2) { // Teacher
                $schedules = Schedule::with(['subject', 'classLevel'])
                    ->where('schedule_user_id', $user->usr_id)
                    ->orderBy('schedule_day')
                    ->orderBy('schedule_start_time')
                    ->get();
            } elseif ($user->usr_role_id == 3) { // Student
                $schedules = Schedule::with(['teacher', 'subject'])
                    ->where('schedule_class_level_id', $user->usr_class_level_id)
                    ->orderBy('schedule_day')
                    ->orderBy('schedule_start_time')
                    ->get();
            }
            
            return view('dashboard.main', compact('user', 'stats', 'schedules'));
        }
    }
}