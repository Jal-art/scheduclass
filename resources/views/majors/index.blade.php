@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Majors</h3>
            <a href="{{ route('majors.create') }}" class="btn btn-primary btn-sm float-right">Tambah Major</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Major</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($majors ?? [] as $m)
                    <tr>
                        <td>{{ $m->major_name }}</td>
                        <td>{{ $m->major_code ?? '-' }}</td>
                        <td>{{ $m->major_description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('majors.edit',$m->major_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('majors.destroy',$m->major_id) }}" style="display:inline">
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