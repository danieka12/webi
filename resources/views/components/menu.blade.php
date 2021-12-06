<header class="header menu_2">
    <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
    <div id="logo">
        <a href="/"><img src={{ asset("images/logo.png") }} width="149" height="42" alt=""></a>
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
            @isset($courseLabel)
                <li><span><a href="#0">Materi</a></span>
                    <ul>
                        @foreach ($courseLabel as $label)
                        <li><a href={{ $label['href'] }}>{{ $label['title'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endisset
            <li><span><a href="/">Tentang Peneliti</a></span></li>
        </ul>
    </nav>
</header>
<!-- /header -->