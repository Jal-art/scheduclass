@extends('adminlte::page')

@section('title', 'Dashboard Guru')

@section('content_header')
    <h1>Dashboard Guru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Jadwal Mengajar Saya</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->schedule_day }}</td>
                        <td>{{ $schedule->subject?->subject_name ?? '-' }}</td>
                        <td>{{ $schedule->classLevel?->class_level_name ?? '-' }}</td>
                        <td>{{ $schedule->schedule_start_time }} - {{ $schedule->schedule_end_time }}</td>
                        <td>{{ $schedule->schedule_room }}</td>
                        <td>
                            <a href="{{ route('schedules.show', $schedule->schedules_id) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
