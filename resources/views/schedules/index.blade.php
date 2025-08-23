@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Schedules</h3>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Add Schedule</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Class Level</th>
                <th>Day</th>
                <th>Time</th>
                <th>Room</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->teacher->usr_name ?? '-' }}</td>
                <td>{{ $schedule->subject->subject_name ?? '-' }}</td>
                <td>{{ $schedule->classLevel->class_level_name ?? '-' }}</td>
                <td>{{ $schedule->schedule_day }}</td>
                <td>{{ $schedule->schedule_start_time }} - {{ $schedule->schedule_end_time }}</td>
                <td>{{ $schedule->schedule_room }}</td>
                <td>
                    <a href="{{ route('schedules.edit', $schedule->schedules_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule->schedules_id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus jadwal?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
