@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h3>Dashboard Kurikulum (Admin)</h3>
  <p>Selamat datang, {{ $user->name }}!</p>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $stats['users'] }}</h3>
          <p>Users</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $stats['teachers'] }}</h3>
          <p>Teachers</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $stats['subjects'] }}</h3>
          <p>Subjects</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $stats['schedules'] }}</h3>
          <p>Schedules</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
