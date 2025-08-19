<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Register</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="usr_name" class="form-control" placeholder="Masukkan nama" value="{{ old('usr_name') }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="usr_email" class="form-control" placeholder="Masukkan email" value="{{ old('usr_email') }}" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="usr_password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="usr_password_confirmation" class="form-control" placeholder="Ulangi password" required>
            </div>

            <div class="mb-3">
                <label>Pilih Role</label>
                <select name="usr_role_id" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="2" {{ old('usr_role_id') == 2 ? 'selected' : '' }}>Siswa</option>
                    <option value="3" {{ old('usr_role_id') == 3 ? 'selected' : '' }}>Guru</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>
