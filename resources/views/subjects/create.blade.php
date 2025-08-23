@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Tambah Mata Pelajaran</h3></div>
        <form method="POST" action="{{ route('subjects.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="subject_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="subject_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="subject_description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
