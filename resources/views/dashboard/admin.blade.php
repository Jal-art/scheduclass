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
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jadwal</span>
                            <span class="info-box-number">{{ $stats['schedules'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Guru</span>
                            <span class="info-box-number">{{ $stats['teachers'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Siswa</span>
                            <span class="info-box-number">{{ $stats['students'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Mapel</span>
                            <span class="info-box-number">{{ $stats['subjects'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kelas</span>
                            <span class="info-box-number">{{ $stats['classLevels'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">User Registrations</span>
                            <span class="info-box-number">{{ $stats['users'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Pengumuman
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="alert alert-info">
                                    <h5><i class="icon fas fa-info"></i> Pengumuman!</h5>
                                    Sistem SIAKAD siap digunakan untuk mengelola data akademik sekolah.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Right col -->
                <section class="col-lg-5 connectedSortable">
                    <!-- Map card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-info mr-1"></i>
                                Keterangan :
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-success" style="width: 20px; height: 15px; margin-right: 10px;"></div>
                                        <span class="text-white">: Hadir</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-info" style="width: 20px; height: 15px; margin-right: 10px;"></div>
                                        <span class="text-white">: Izin</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-warning" style="width: 20px; height: 15px; margin-right: 10px;"></div>
                                        <span class="text-white">: Bertugas Keluar</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-danger" style="width: 20px; height: 15px; margin-right: 10px;"></div>
                                        <span class="text-white">: Sakit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Guru -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Guru</h3>
                            <div class="card-tools">
                                <span class="badge badge-success">↑ {{ $stats['teachers'] }}</span>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-info">
                                        <span class="text-primary">Laki-laki</span>
                                        <span class="text-primary">Perempuan</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Data Siswa -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Siswa</h3>
                            <div class="card-tools">
                                <span class="badge badge-success">↑ {{ $stats['students'] }}</span>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-info">
                                        <span class="text-primary">Laki-laki</span>
                                        <span class="text-primary">Perempuan</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection