@extends('layouts.auth')

@section('content')
<div class="register-box">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <h3 class="mb-0">Register</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="usr_name" value="{{ old('usr_name') }}"
                 class="form-control @error('usr_name') is-invalid @enderror" required>
          @error('usr_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="usr_email" value="{{ old('usr_email') }}"
                 class="form-control @error('usr_email') is-invalid @enderror" required>
          @error('usr_email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
          <div class="form-group col-md-6">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="usr_role_id" class="form-control @error('usr_role_id') is-invalid @enderror" required>
            @foreach($roles as $r)
              <option value="{{ $r->rl_id }}">{{ $r->rl_name }}</option>
            @endforeach
          </select>
          @error('usr_role_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-success btn-block">Daftar</button>
        <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
      </form>
    </div>
  </div>
</div>
@endsection
