<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassLevel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['teacher', 'subject', 'classLevel'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $teachers = User::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        return view('schedules.create', compact('teachers', 'subjects', 'classLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_user_id' => 'required',
            'schedule_subject_id' => 'required',
            'schedule_class_level_id' => 'required',
            'schedule_day' => 'required',
            'schedule_start_time' => 'required',
            'schedule_end_time' => 'required',
            'schedule_room' => 'required',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $teachers = User::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        return view('schedules.edit', compact('schedule', 'teachers', 'subjects', 'classLevels'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }
    public function show($id)
{
    $schedule = Schedule::with(['teacher', 'subject', 'classLevel'])->findOrFail($id);
    return view('schedules.show', compact('schedule'));
}


    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
