<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $stats = [
            'users'     => User::count(),
            'teachers'  => class_exists(Teacher::class) ? Teacher::count() : 0,
            'subjects'  => class_exists(Subject::class) ? Subject::count() : 0,
            'schedules' => class_exists(Schedule::class) ? Schedule::count() : 0,
        ];

        return view('dashboard', compact('user','stats'));
    }
}
