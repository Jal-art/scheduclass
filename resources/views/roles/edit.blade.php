@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header"><h3 class="card-title">Edit Role</h3></div>
        <form method="POST" action="{{ route('roles.update',$role->rl_id) }}">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Role</label>
                    <input type="text" name="rl_name" value="{{ $role->rl_name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="rl_description" class="form-control">{{ $role->rl_description }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Update</button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection