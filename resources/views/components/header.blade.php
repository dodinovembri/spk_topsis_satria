<header class="site-header default-header-style style-one intro-element">
    <div class="navigation-area" style="background-color: #c9b204;">
        <div class="container-fluid">
            <div class="row justify-content-left align-items-center">
                <div class="col-lg-3 justify-content-star">

                    <div class="header-logo-area">
                        <div class="container-wapper">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-3 d-lg-none pd-0">
                                    <a href="#" class="search-bar"><i class="fas fa-search"></i></a>
                                </div>
                                <div class="col-6 col-lg-12">
                                    <div class="site-branding">
                                        <a href="{{ url('/') }}">
                                            <img src="{{ asset('logo/logo.png') }}" width="80px" alt="Studio Foto Prewedding" />
                                        </a>
                                    </div><!-- /.site-branding -->
                                </div>
                                <div class="col-3 d-lg-none pd-0">
                                    <div class="header-right-area">
                                        <div class="hamburger-menus">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.header-logo-area -->
                </div>
                <div class="col-lg-2"></div>
                <div class="col-md-7 justify-content-end">
                    <div class="site-navigation">
                        <div class="navigation-area">
                            <div class="site-navigation">
                                <nav class="navigation">
                                    <div class="menu-wrapper">
                                        <div class="menu-content">
                                            <div class="mainmenu d-flex align-items-center">
                                                <ul class="nav">
                                                    <li class="nav-home nav-current"><a href="{{ url('/') }}">Halaman Utama</a></li>
                                                    <li class="nav-tags"><a href="{{ url('recomendation/all') }}">Rekomendasi</a></li>
                                                    <li class="nav-authors"><a href="{{ url('recomendation') }}">Daftar Studio</a></li>
                                                    <li class="nav-membership"><a href="{{ url('contact') }}">Kontak</a></li>
                                                </ul>

                                            </div>
                                        </div> <!-- /.hours-content-->
                                    </div><!-- /.menu-wrapper -->
                                </nav>
                            </div><!-- /.site-navigation -->
                        </div><!-- /.navigation-area -->

                        <!--~~./ end site header ~~-->
                        <!--~~~ Sticky Header ~~~-->
                        <div id="sticky-header" class="active"></div>
                        <!--~./ end sticky header ~-->
                    </div><!-- /.site-navigation -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.navigation-area -->

    <div class="mobile-sidebar-menu sidebar-menu">
        <div class="overlaybg"></div>
    </div>
</header>