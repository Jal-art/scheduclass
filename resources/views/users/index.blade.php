@extends('layouts.app') {{-- layout AdminLTE kamu --}}
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Tambah User</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{ $u->usr_name }}</td>
                        <td>{{ $u->usr_email }}</td>
                        <td>{{ $u->role->rl_name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('users.edit',$u->usr_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="POST" action="{{ route('users.destroy',$u->usr_id) }}" style="display:inline">
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
