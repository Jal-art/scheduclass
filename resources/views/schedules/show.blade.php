@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Schedule Detail</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Teacher:</strong> {{ $schedule->teacher?->usr_name ?? '-' }}</p>
            <p><strong>Subject:</strong> {{ $schedule->subject?->subject_name ?? '-' }}</p>
            <p><strong>Class Level:</strong> {{ $schedule->classLevel?->class_level_name ?? '-' }}</p>
            <p><strong>Day:</strong> {{ $schedule->schedule_day }}</p>
            <p><strong>Start Time:</strong> {{ $schedule->schedule_start_time }}</p>
            <p><strong>End Time:</strong> {{ $schedule->schedule_end_time }}</p>
            <p><strong>Room:</strong> {{ $schedule->schedule_room }}</p>
            <p><strong>Created At:</strong> {{ $schedule->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $schedule->updated_at->format('d-m-Y H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('schedules.edit', $schedule->schedules_id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
