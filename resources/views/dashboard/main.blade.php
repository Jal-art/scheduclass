@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Welcome Message -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user mr-2"></i>
                                Selamat Datang, {{ $user->usr_name }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                                <strong>Role:</strong> {{ optional($user->role)->rl_name ?? '-' }}
                                @if($user->usr_role_id == 3 && $user->classLevel)
                                    | <strong>Kelas:</strong> {{ $user->classLevel->class_level_name }}
                                @endif
                                @if($user->major)
                                    | <strong>Jurusan:</strong> {{ $user->major->major_name }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->usr_role_id == 2)
            <!-- Dashboard untuk Guru -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                Jadwal Mengajar Saya
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
                                                <th>Kelas</th>
                                                <th>Jam</th>
                                                <th>Ruangan</th>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Belum ada jadwal mengajar yang ditetapkan.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($user->usr_role_id == 3)
            <!-- Dashboard untuk Siswa -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                Jadwal Pelajaran Saya
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
                                                <th>Guru</th>
                                                <th>Jam</th>
                                                <th>Ruangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedules as $schedule)
                                                <tr>
                                                    <td>{{ $schedule->schedule_day }}</td>
                                                    <td>{{ $schedule->subject?->subject_name ?? '-' }}</td>
                                                    <td>{{ $schedule->teacher?->usr_name ?? '-' }}</td>
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
                                    Belum ada jadwal pelajaran yang tersedia untuk kelas Anda.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Info Cards for all users -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $stats['schedules'] }}</h3>
                            <p>Total Jadwal</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $stats['teachers'] }}</h3>
                            <p>Total Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $stats['students'] }}</h3>
                            <p>Total Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $stats['subjects'] }}</h3>
                            <p>Mata Pelajaran</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection