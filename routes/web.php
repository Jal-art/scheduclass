<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassLevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes untuk semua tabel
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('majors', MajorController::class);
Route::resource('class-levels', ClassLevelController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('notifications', NotificationController::class);
