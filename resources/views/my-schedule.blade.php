@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Saya</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal Saya</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        @if(auth()->user()->usr_role_id == 2)
                            Jadwal Mengajar
                        @else
                            Jadwal Pelajaran
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    @if($schedules->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Mata Pelajaran</th>
                                        @if(auth()->user()->usr_role_id == 2)
                                            <th>Kelas</th>
                                        @else
                                            <th>Guru</th>
                                        @endif
                                        <th>Jam</th>
                                        <th>Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->schedule_day }}</td>
                                            <td>{{ $schedule->subject?->subject_name ?? '-' }}</td>
                                            @if(auth()->user()->usr_role_id == 2)
                                                <td>{{ $schedule->classLevel?->class_level_name ?? '-' }}</td>
                                            @else
                                                <td>{{ $schedule->teacher?->usr_name ?? '-' }}</td>
                                            @endif
                                            <td>{{ $schedule->schedule_start_time }} - {{ $schedule->schedule_end_time }}</td>
                                            <td>{{ $schedule->schedule_room }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle mr-2"></i>
                            @if(auth()->user()->usr_role_id == 2)
                                Belum ada jadwal mengajar yang ditetapkan.
                            @else
                                Belum ada jadwal pelajaran yang tersedia.
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection