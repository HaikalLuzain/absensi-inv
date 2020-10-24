@php
$route = explode('.', Route::currentRouteName())[0];
$role = Auth::user()->role;
if($role == 'admin'){
$dash = 'dashboard.admin';
$level = 'Admin';
}else if($role == 'user'){
$dash = 'user.attendance';
$level = 'User';
}

$auth = Auth::user();
@endphp
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route($dash) }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-clipboard"></i>
            {{-- <img src="{{ asset('assets/img/main-logo.png') }}" alt="" class="img-fluid" width="50"> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Absensi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if ($level === 'Admin')
    <li class="nav-item {{ ($route == 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route($dash) }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Content
    </div>

    <li class="nav-item {{ ($route == 'attendance') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('attendance.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Attendances</span></a>
    </li>

    <li class="nav-item {{ ($route == 'absence') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('absence.index') }}">
            <i class="fas fa-list-alt"></i>
            <span>Absences</span></a>
    </li>

    <li class="nav-item {{ ($route == 'user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.create') }}">
            <i class="fas fa-user"></i>
            <span>Create User</span></a>
    </li>

    @elseif ($level === 'User')
    <li class="nav-item {{ ($route == 'user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.attendance') }}">
            <i class="fas fa-list-alt"></i>
            <span>Attendances</span></a>
    </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>