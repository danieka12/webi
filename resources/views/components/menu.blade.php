<header class="header menu_2">
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->
    <div id="logo">
        <a href="/"><img src="{{ asset('/images/webi-logo.png') }}" width="180" height="50" alt=""></a>
    </div>
    @include('components.miniComponents.top-menu')
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            <li><span><a href="/">Beranda</a></span></li>
            <li><span><a href="/tentang-peneliti">Tentang Peneliti</a></span></li>

            @if (Auth::guard('siswa')->check())
                <li><span><a href="#0">{{ Auth::guard('siswa')->user()->name }}</a></span>
                    <ul>
                        <li><a href="/">Profil Saya</a></li>
                        <li><a href={{ route('auth.logout') }}>Logout</a></li>
                    </ul>
                </li>
            @endif

        </ul>
    </nav>
</header>
<!-- /header -->
