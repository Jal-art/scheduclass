@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Class Levels</h3>
            <a href="{{ route('class-levels.create') }}" class="btn btn-primary btn-sm float-right">Tambah Class Level</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Class Level</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($classLevels ?? [] as $cl)
                    <tr>
                        <td>{{ $cl->class_level_name }}</td>
                        <td>{{ $cl->class_level_description ?? '-' }}</td>
                        <td>
                            <a href="{{ route('class-levels.edit',$cl->class_level_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('class-levels.destroy',$cl->class_level_id) }}" style="display:inline">
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