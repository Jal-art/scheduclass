@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Tambah User</h3></div>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="usr_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="usr_email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="usr_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="usr_role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->rl_id }}">{{ $role->rl_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
