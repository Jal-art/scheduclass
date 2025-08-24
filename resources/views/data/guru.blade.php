@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Guru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Guru</li>
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
                        <i class="fas fa-chalkboard-teacher mr-1"></i>
                        Data Guru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('teachers.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Guru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teachers as $index => $teacher)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $teacher->usr_name }}</td>
                                        <td>{{ $teacher->usr_email }}</td>
                                        <td>
                                            @forelse($teacher->teacherSubjects as $ts)
                                                <span class="badge badge-success mr-1">{{ $ts->subject->subject_name }}</span>
                                            @empty
                                                <span class="text-muted">Belum ada mata pelajaran</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('teachers.edit', $teacher->usr_id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('teachers.destroy', $teacher->usr_id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus guru ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data guru</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection