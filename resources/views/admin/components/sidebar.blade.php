<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('guru.dashboard') }}"><img src={{ asset('images/admin/logo.png') }}
            data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('guru.dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                <a class="nav-link" href={{ route('guru.course') }}>
                    <i class="fa fa-fw fa-archive"></i>
                    <span class="nav-link-text">Materi</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                <a class="nav-link" href={{ route('guru.confirmStudent') }}>
                    <i class="fa fa-fw fa-check"></i>
                    <span class="nav-link-text">Konfirmasi Siswa
                        @if ($sizeConfirm > 0)
                            <span class="badge badge-pill badge-primary">{{ $sizeConfirm }} Baru</span>
                        @endif

                    </span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
                <a class="nav-link" href={{ route('guru.addCourse') }}>
                    <i class="fa fa-fw fa-plus-circle"></i>
                    <span class="nav-link-text">Tambah Materi</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile"
                    data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-graduation-cap"></i>
                    <span class="nav-link-text">Guru</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseProfile">
                    <li>
                        <a href={{ route('guru.teacher') }}>Profil Guru</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
