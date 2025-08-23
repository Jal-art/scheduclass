@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>
    <form action="{{ route('teachers.update', $teacher->usr_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="usr_name" value="{{ $teacher->usr_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="usr_email" value="{{ $teacher->usr_email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="subjects[]" class="form-control" multiple>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->subject_id }}"
                        {{ in_array($subject->subject_id, $selectedSubjects) ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
