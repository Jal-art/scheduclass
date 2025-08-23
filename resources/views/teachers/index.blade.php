@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->usr_name }}</td>
                    <td>{{ $teacher->usr_email }}</td>
                    <td>
                        @foreach($teacher->teacherSubjects as $ts)
                            <span class="badge bg-success">{{ $ts->subject->subject_name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->usr_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->usr_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus guru ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
