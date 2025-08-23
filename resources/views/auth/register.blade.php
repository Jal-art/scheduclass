<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
  <h3 class="text-center mb-4">Register</h3>

  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="usr_name" value="{{ old('usr_name') }}"
             class="form-control @error('usr_name') is-invalid @enderror" required>
      @error('usr_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="usr_email" value="{{ old('usr_email') }}"
             class="form-control @error('usr_email') is-invalid @enderror" required>
      @error('usr_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password"
               class="form-control @error('password') is-invalid @enderror" required>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="usr_role_id" class="form-control @error('usr_role_id') is-invalid @enderror" required>
        @foreach($roles as $r)
          <option value="{{ $r->rl_id }}">{{ $r->rl_name }}</option>
        @endforeach
      </select>
      @error('usr_role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-success w-100">Daftar</button>
  </form>

  <p class="mt-3 text-center">Sudah punya akun?
    <a href="{{ route('login') }}">Login</a>
  </p>
</div>

</body>
</html>
