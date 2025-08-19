@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Total User -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Users</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>

        <!-- Total Jadwal -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalSchedules }}</h3>
                    <p>Total Jadwal</p>
                </div>
                <div class="icon"><i class="fas fa-calendar"></i></div>
            </div>
        </div>

        <!-- Total Mapel -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalSubjects }}</h3>
                    <p>Total Mapel</p>
                </div>
                <div class="icon"><i class="fas fa-book"></i></div>
            </div>
        </div>

        <!-- Total Jurusan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalMajors }}</h3>
                    <p>Total Jurusan</p>
                </div>
                <div class="icon"><i class="fas fa-graduation-cap"></i></div>
            </div>
        </div>
    </div>
</div>
@endsection
