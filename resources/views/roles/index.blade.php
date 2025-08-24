@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles</h3>
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Tambah Role</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Role</th>
                        <th>Deskripsi</th>
                        <th>Jumlah User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles ?? [] as $r)
                    <tr>
                        <td>{{ $r->rl_name }}</td>
                        <td>{{ $r->rl_description ?? '-' }}</td>
                        <td>{{ $r->users->count() }} user</td>
                        <td>
                            <a href="{{ route('roles.edit',$r->rl_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('roles.destroy',$r->rl_id) }}" style="display:inline">
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