<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('user/assets/img/logo/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('welcome') }}"><img src="{{ asset('user/assets/img/logo/logo.png') }}"
                                                                  alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{ route('welcome') }}">Trang chủ</a></li>
                                        <li><a href="{{ route('job-list') }}">Việc làm </a></li>
{{--                                        <li><a href="about.html">Về chung tối</a></li>--}}
{{--                                        <li><a href="#">Page</a>--}}
{{--                                            <ul class="submenu">--}}
{{--                                                <li><a href="blog.html">Blog</a></li>--}}
{{--                                                <li><a href="single-blog.html">Blog Details</a></li>--}}
{{--                                                <li><a href="elements.html">Elements</a></li>--}}
{{--                                                <li><a href="job_details.html">job Details</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="contact.html">Contact</a></li>--}}
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       class="btn head-btn2">Đăng xuất</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                @else
                                    <a href="{{ route('register') }}" class="btn head-btn1">Đăng ký </a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Đăng nhập</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    @yield('content')

</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>About Us</h4>
                                <div class="footer-pera">
                                    <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so
                                        behold.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>
                                    <p>Address :Your address goes
                                        here, your demo address.</p>
                                </li>
                                <li><a href="#">Phone : +8880 44338899</a></li>
                                <li><a href="#">Email : info@colorlib.com</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Important Link</h4>
                            <ul>
                                <li><a href="#"> View Project</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Proparties</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <div class="footer-pera footer-pera2">
                                <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                            </div>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <form target="_blank"
                                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                          method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email"
                                               placeholder="Email Address"
                                               class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                    src="assets/img/icon/form.png" alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>451</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>568</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                    aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('user/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('user/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('user/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('user/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('user/assets/js/price_rangs.js') }}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('user/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('user/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('user/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('user/assets/js/contact.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('user/assets/js/mail-script.js') }}"></script>
<script src="{{ asset('user/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('user/assets/js/plugins.js') }}"></script>
<script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>
</html>
