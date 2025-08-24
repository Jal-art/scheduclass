<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SCHEDUCLASS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">SCHEDUCLASS</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users</a></li>
          <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link">Roles</a></li>
          <li class="nav-item"><a href="{{ route('majors.index') }}" class="nav-link">Majors</a></li>
          <li class="nav-item"><a href="{{ route('class-levels.index') }}" class="nav-link">Class Levels</a></li>
          <li class="nav-item"><a href="{{ route('subjects.index') }}" class="nav-link">Subjects</a></li>
          <li class="nav-item"><a href="{{ route('teachers.index') }}" class="nav-link">Teachers</a></li>
          <li class="nav-item"><a href="{{ route('schedules.index') }}" class="nav-link">Schedules</a></li>
          <li class="nav-item"><a href="{{ route('notifications.index') }}" class="nav-link">Notifications</a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content p-3">
      @yield('content')
    </section>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
