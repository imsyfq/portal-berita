<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header">
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img alt="" src="{{ asset('images/banner-logo.png') }}" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <!-- <div class="col-xl-9 col-lg-9 col-md-9">
                               <div class="header-banner f-right">
                                   <img src="{{ asset('template') }}/assets/img/hero/header_card.jpg" alt="" />
                               </div>
                           </div> -->
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html">
                                    <img src="{{ asset('images/banner-logo.png') }}" class="img-fluid"
                                        style="max-height: 80px" />
                                </a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ route('public.posts') }}">Semua Berita</a></li>
                                        <li><a href="{{ route('public.category') }}">Kategori</a></li>
                                        <li><a href="{{ url('/about-us') }}">Tentang Kami</a></li>
                                        {{-- <li><a href="contact.html">Contact</a></li> --}}
                                        {{-- <li>
                                            <a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="details.html">Categori Details</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="{{ request()->url() }}">
                                        <input type="text" placeholder="Search" name="q"
                                            value="{{ request('q') }}" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
