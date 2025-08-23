@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <h3>Dashboard Utama</h3>
  <p>Selamat datang, {{ $user->name }}! (Siswa/Guru)</p>
</div>
@endsection
