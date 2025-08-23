@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header"><h3 class="card-title">Edit Mata Pelajaran</h3></div>
        <form method="POST" action="{{ route('subjects.update',$subject->subject_id) }}">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="subject_name" value="{{ $subject->subject_name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="subject_code" value="{{ $subject->subject_code }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="subject_description" class="form-control">{{ $subject->subject_description }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Update</button>
                <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
