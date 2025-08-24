<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassLevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;

Route::get('/', fn () => redirect()->route('login'));

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Routes untuk Lihat Data (hanya untuk Admin/Kurikulum)
Route::middleware(['auth'])->group(function () {
    Route::get('/data/jadwal', [DataController::class, 'jadwal'])->name('data.jadwal');
    Route::get('/data/guru', [DataController::class, 'guru'])->name('data.guru');
    Route::get('/data/kelas', [DataController::class, 'kelas'])->name('data.kelas');
    Route::get('/data/siswa', [DataController::class, 'siswa'])->name('data.siswa');
    Route::get('/data/mapel', [DataController::class, 'mapel'])->name('data.mapel');
    Route::get('/data/user', [DataController::class, 'user'])->name('data.user');
});

// Resource CRUD (pakai middleware auth dan role check untuk admin)
Route::middleware(['auth'])->group(function () {
    
    // Routes yang hanya bisa diakses Admin/Kurikulum (usr_role_id = 1)
    Route::middleware(function ($request, $next) {
        if (auth()->user() && auth()->user()->usr_role_id == 1) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
    })->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('majors', MajorController::class);
        Route::resource('class-levels', ClassLevelController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('notifications', NotificationController::class);
    });
    
    // Routes yang bisa diakses semua user yang login (untuk melihat jadwal mereka sendiri)
    Route::get('/my-schedule', function() {
        $user = auth()->user();
        $schedules = [];
        
        if ($user->usr_role_id == 2) { // Teacher
            $schedules = App\Models\Schedule::with(['subject', 'classLevel'])
                ->where('schedule_user_id', $user->usr_id)
                ->get();
        } elseif ($user->usr_role_id == 3) { // Student
            $schedules = App\Models\Schedule::with(['teacher', 'subject'])
                ->where('schedule_class_level_id', $user->usr_class_level_id)
                ->get();
        }
        
        return view('my-schedule', compact('schedules'));
    })->name('my.schedule');
});