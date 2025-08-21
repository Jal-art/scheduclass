@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3 class="mb-0">Login</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
          @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary btn-block">Login</button>
      </form>

      <p class="mt-3 text-center">
        Belum punya akun? <a href="{{ route('register') }}">Register</a>
      </p>
    </div>
  </div>
</div>
@endsection
