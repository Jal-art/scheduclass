@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header"><h3 class="card-title">Edit User</h3></div>
        <form method="POST" action="{{ route('users.update',$user->usr_id) }}">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="usr_name" value="{{ $user->usr_name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="usr_email" value="{{ $user->usr_email }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password (isi jika ingin ubah)</label>
                    <input type="password" name="usr_password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="usr_role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->rl_id }}" {{ $user->usr_role_id==$role->rl_id?'selected':'' }}>
                                {{ $role->rl_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
