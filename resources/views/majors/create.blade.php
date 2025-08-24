@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Tambah Major</h3></div>
        <form method="POST" action="{{ route('majors.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Major</label>
                    <input type="text" name="major_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode Major</label>
                    <input type="text" name="major_code" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="major_description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('majors.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection