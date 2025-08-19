<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\MajorController;
// use App\Http\Controllers\ClassLevelController;
// use App\Http\Controllers\SubjectController;
// use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\ScheduleController;
// use App\Http\Controllers\NotificationController;


// Resource routes untuk semua tabel
// Route::resource('roles', RoleController::class);
// Route::resource('users', UserController::class);
// Route::resource('majors', MajorController::class);
// Route::resource('class-levels', ClassLevelController::class);
// Route::resource('subjects', SubjectController::class);
// Route::resource('teachers', TeacherController::class);
// Route::resource('schedules', ScheduleController::class);
// Route::resource('notifications', NotificationController::class);



use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin')->middleware('auth');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
