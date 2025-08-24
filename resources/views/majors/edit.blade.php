@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card card-warning">
        <div class="card-header"><h3 class="card-title">Edit Major</h3></div>
        <form method="POST" action="{{ route('majors.update',$major->major_id) }}">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Major</label>
                    <input type="text" name="major_name" value="{{ $major->major_name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode Major</label>
                    <input type="text" name="major_code" value="{{ $major->major_code }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="major_description" class="form-control">{{ $major->major_description }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Update</button>
                <a href="{{ route('majors.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection