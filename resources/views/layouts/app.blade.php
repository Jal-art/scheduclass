<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD - SMK NEGERI 1 JENANGAN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">
          <img src="https://via.placeholder.com/30x30?text=SMK" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; margin-right: 5px;">
          SIAKAD
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user mr-1"></i> 
          Admin
          <i class="fas fa-angle-down ml-1"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="https://via.placeholder.com/33x33?text=SMK" alt="SMK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIAKAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Dashboard -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              @if(auth()->user() && auth()->user()->usr_role_id == 1)
              <!-- Menu khusus untuk Admin/Kurikulum -->
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Admin</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @if(auth()->user() && auth()->user()->usr_role_id == 1)
          <!-- Master Data - Hanya untuk Admin/Kurikulum -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Lihat Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('data.jadwal') }}" class="nav-link {{ request()->routeIs('data.jadwal') ? 'active' : '' }}">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Data Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.guru') }}" class="nav-link {{ request()->routeIs('data.guru') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.kelas') }}" class="nav-link {{ request()->routeIs('data.kelas') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.siswa') }}" class="nav-link {{ request()->routeIs('data.siswa') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.mapel') }}" class="nav-link {{ request()->routeIs('data.mapel') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Data Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('data.user') }}" class="nav-link {{ request()->routeIs('data.user') ? 'active' : '' }}">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu CRUD untuk Admin -->
          <li class="nav-header">MASTER DATA</li>
          
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>Roles</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('majors.index') }}" class="nav-link {{ request()->routeIs('majors.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Majors</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('class-levels.index') }}" class="nav-link {{ request()->routeIs('class-levels.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-school"></i>
              <p>Class Levels</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('subjects.index') }}" class="nav-link {{ request()->routeIs('subjects.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>Subjects</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('teachers.index') }}" class="nav-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>Teachers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('schedules.index') }}" class="nav-link {{ request()->routeIs('schedules.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Schedules</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('notifications.index') }}" class="nav-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bell"></i>
              <p>Notifications</p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="#">SMK Negeri 1 Jenangan Ponorogo</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>