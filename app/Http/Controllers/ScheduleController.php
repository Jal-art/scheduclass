<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return Schedule::with(['teacherSubject', 'classLevel'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_subject_id' => 'required|exists:teacher_subjects,teacher_subject_id',
            'class_level_id' => 'required|exists:class_levels,class_level_id',
            'day' => 'required|string|max:10',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time'
        ]);

        return Schedule::create($request->all());
    }

    public function show($id)
    {
        return Schedule::with(['teacherSubject', 'classLevel'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return $schedule;
    }

    public function destroy($id)
    {
        return Schedule::destroy($id);
    }
}
