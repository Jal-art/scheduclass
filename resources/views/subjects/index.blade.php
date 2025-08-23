@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Mata Pelajaran</h3>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm float-right">Tambah</a>
        </div>
        <div class="card-body">
            @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subjects as $s)
                    <tr>
                        <td>{{ $s->subject_name }}</td>
                        <td>{{ $s->subject_code }}</td>
                        <td>{{ $s->subject_description }}</td>
                        <td>
                            <a href="{{ route('subjects.edit',$s->subject_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('subjects.destroy',$s->subject_id) }}" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
