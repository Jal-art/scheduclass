<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
  <h3 class="text-center mb-4">Login</h3>
  
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="{{ old('email') }}"
             class="form-control @error('email') is-invalid @enderror" required>
      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password"
             class="form-control @error('password') is-invalid @enderror" required>
      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>

  <p class="mt-3 text-center">Belum punya akun?
    <a href="{{ route('register') }}">Daftar</a>
  </p>
</div>

</body>
</html>
