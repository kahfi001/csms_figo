<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a href={{ route('dashboard') }}
    class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>HOME</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>PROFILE</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>PRAKUALIFIKASI</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>SERTIFIKAT</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->