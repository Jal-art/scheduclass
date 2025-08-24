@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Tambah Role</h3></div>
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Role</label>
                    <input type="text" name="rl_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="rl_description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection