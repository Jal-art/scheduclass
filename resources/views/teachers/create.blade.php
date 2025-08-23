@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Guru</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="usr_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="usr_email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="usr_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="subjects[]" class="form-control" multiple>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
