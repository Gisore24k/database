<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="index.html" class="logo__black"><img
                                        src="{{asset('logo/logo.png')}}" alt=""height="60" width="60"></a>
                                {{-- <a href="index.html" class="logo__white"><img
                                        src="{{asset('frontend/assets/img/logo/logo_white.png')}}" alt=""height="50" width="50"></a> --}}
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{url('/')}}">HOME</a></li>
                                    <li><a href="{{route('home.about')}}">ABOUT US</a></li>
                                    <li><a href="services-details.html">OUR OBJECT</a></li>
                                    <li class="menu-item-has-children"><a href="#">LITERATURE</a>
                                        <ul class="sub-menu">
                                            <li><a href="portfolio.html">Writings</a></li>
                                            <li><a href="portfolio-details.html">Audio Books</a></li>
                                            <li><a href="portfolio-details.html">Study Charts</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Our News</a></li>
                                            <li><a href="blog-details.html">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact us</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="contact.html" class="btn">Contact us</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img
                                        src="{{asset('logo/logo.png')}}" alt=""></a>
                                <a href="index.html" class="logo__white"><img
                                        src="{{asset('logo/logo.png')}}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
