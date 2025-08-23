@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Schedule</h3>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Teacher</label>
            <select name="schedule_user_id" class="form-control">
                @foreach($teachers as $t)
                    <option value="{{ $t->usr_id }}">{{ $t->usr_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Subject</label>
            <select name="schedule_subject_id" class="form-control">
                @foreach($subjects as $s)
                    <option value="{{ $s->subject_id }}">{{ $s->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Class Level</label>
            <select name="schedule_class_level_id" class="form-control">
                @foreach($classLevels as $c)
                    <option value="{{ $c->class_level_id }}">{{ $c->class_level_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Day</label>
            <input type="text" name="schedule_day" class="form-control">
        </div>

        <div class="form-group">
            <label>Start Time</label>
            <input type="time" name="schedule_start_time" class="form-control">
        </div>

        <div class="form-group">
            <label>End Time</label>
            <input type="time" name="schedule_end_time" class="form-control">
        </div>

        <div class="form-group">
            <label>Room</label>
            <input type="text" name="schedule_room" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
