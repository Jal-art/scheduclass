@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <h4 class="mb-3">Selamat datang, {{ $user->usr_name }}</h4>
  <p class="text-muted">Role: {{ optional($user->role)->rl_name ?? '-' }}</p>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $stats['users'] }}</h3>
          <p>Users</p>
        </div>
        <div class="icon"><i class="fas fa-users"></i></div>
        <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $stats['teachers'] }}</h3>
          <p>Teachers</p>
        </div>
        <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
        <a href="{{ route('teachers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $stats['subjects'] }}</h3>
          <p>Subjects</p>
        </div>
        <div class="icon"><i class="fas fa-book"></i></div>
        <a href="{{ route('subjects.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $stats['schedules'] }}</h3>
          <p>Schedules</p>
        </div>
        <div class="icon"><i class="fas fa-calendar-alt"></i></div>
        <a href="{{ route('schedules.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
@endsection
