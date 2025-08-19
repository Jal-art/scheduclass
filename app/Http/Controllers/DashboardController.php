<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
            'active_users' => User::whereNotNull('email_verified_at')->count(),
            'recent_users' => User::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}