<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <a href={{ route('dashboard') }} class="sidebar-brand d-flex align-items-center justify-content-center"
        href="index.html">
        <img class="img-fluid" src="{{ asset('sb-admin/img/logo.png') }}">
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }} ">
        <a class="nav-link" href={{ route('dashboard') }}>
            <span>HOME</span></a>
    </li>
    @if (auth()->user()->role == 'vendor')
        <li class="nav-item {{ Route::is('perusahaan') ? 'active' : '' }} ">
            <a class="nav-link " href={{ route('perusahaan') }}>
                <span>PROFILE</span></a>
        </li>
    @else
        <li class="nav-item {{ Route::is('profile.edit') ? 'active' : '' }} ">
            <a class="nav-link " href={{ route('profile.edit') }}>
                <span>PROFILE</span></a>
        </li>
    @endif
    @if (auth()->user()->role == 'vendor' || auth()->user()->role == 'hse')
        <li class="nav-item {{ Route::is('prakualifikasi') ? 'active' : '' }}">
            <a class="nav-link" href={{ route('prakualifikasi') }}>
                <span>PRAKUALIFIKASI</span></a>
        </li>
    @endif
    @if (auth()->user()->role != 'admin')
        <li class="nav-item {{ Route::is('berita-acara') ? 'active' : '' }}">
            <a class="nav-link" href={{ route('berita-acara') }}>
                <span>BERITA ACARA</span></a>
        </li>
    @endif
    <li class="nav-item {{ Route::is('sertifikat') ? 'active' : '' }} ">
        <a class="nav-link" href={{ route('sertifikat') }}>
            <span>SERTIFIKAT</span></a>
    </li>
    @if (auth()->user()->role == 'admin')
        <li class="nav-item {{ Route::is('user') ? 'active' : '' }} ">
            <a class="nav-link" href={{ route('users') }}>
                <span>USER</span></a>
        </li>
    @endif


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
