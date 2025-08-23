@extends('layouts.app') {{-- ganti sesuai layout utama kamu --}}

@section('title', 'Edit Schedule')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Schedule</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('schedules.update', $schedule->schedules_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Teacher --}}
                <div class="form-group mb-3">
                    <label for="schedule_user_id">Teacher</label>
                    <select name="schedule_user_id" id="schedule_user_id" class="form-control">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->usr_id }}" {{ $schedule->schedule_user_id == $teacher->usr_id ? 'selected' : '' }}>
                                {{ $teacher->usr_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Subject --}}
                <div class="form-group mb-3">
                    <label for="schedule_subject_id">Subject</label>
                    <select name="schedule_subject_id" id="schedule_subject_id" class="form-control">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->subject_id }}" {{ $schedule->schedule_subject_id == $subject->subject_id ? 'selected' : '' }}>
                                {{ $subject->subject_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Class Level --}}
                <div class="form-group mb-3">
                    <label for="schedule_class_level_id">Class Level</label>
                    <select name="schedule_class_level_id" id="schedule_class_level_id" class="form-control">
                        @foreach($classLevels as $classLevel)
                            <option value="{{ $classLevel->class_level_id }}" {{ $schedule->schedule_class_level_id == $classLevel->class_level_id ? 'selected' : '' }}>
                                {{ $classLevel->class_level_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Day --}}
                <div class="form-group mb-3">
                    <label for="schedule_day">Day</label>
                    <input type="text" name="schedule_day" id="schedule_day" class="form-control" value="{{ $schedule->schedule_day }}" required>
                </div>

                {{-- Start Time --}}
                <div class="form-group mb-3">
                    <label for="schedule_start_time">Start Time</label>
                    <input type="time" name="schedule_start_time" id="schedule_start_time" class="form-control" value="{{ $schedule->schedule_start_time }}" required>
                </div>

                {{-- End Time --}}
                <div class="form-group mb-3">
                    <label for="schedule_end_time">End Time</label>
                    <input type="time" name="schedule_end_time" id="schedule_end_time" class="form-control" value="{{ $schedule->schedule_end_time }}" required>
                </div>

                {{-- Room --}}
                <div class="form-group mb-3">
                    <label for="schedule_room">Room</label>
                    <input type="text" name="schedule_room" id="schedule_room" class="form-control" value="{{ $schedule->schedule_room }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Update Schedule</button>
                </div>
