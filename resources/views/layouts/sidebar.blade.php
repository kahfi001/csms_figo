
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <a href={{ route('dashboard') }}
    class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img class="img-fluid"
                    src="{{asset ('sb-admin/img/logo.png') }}">
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>HOME</span></a>
    </li>
    <li class="nav-item {{ Route::is('profile.edit') ? 'active' : '' }} ">
        <a class="nav-link " href={{ route('profile.edit') }}>
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


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>