<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from demos.alithemes.com/html/newsviral/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Oct 2020 07:34:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ trans('message.search') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/favicon.svg') }}">
    <!-- UltraNews CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="{{ asset('assets/imgs/loading.svg') }}" alt="">
                    <h6>{{ trans('message.now_loading') }}</h6>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
            <button class="off-canvas-close"><i class="ti-close"></i></button>
            <div class="sidebar-inner">
                <!--lastest post-->
                <div class="sidebar-widget mb-50">
                    <div class="widget-header mb-30">
                        <h5 class="widget-title">{{ trans('message.top') }}<span>{{ trans('message.trending') }}</span></h5>
                    </div>
                    <div class="post-aside-style-2">
                    </div>
                </div>
                <!--Categories-->

                <!--Ads-->
            </div>
        </aside>
        <!-- Main Header -->
        <header class="main-header header-style-2 mb-40">
            <div class="header-bottom header-sticky background-white text-center">
                <div class="scroll-progress gradient-bg-1"></div>
                <div class="mobile_menu d-lg-none d-block"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-3">
                            <div class="header-logo d-none d-lg-block">
                                <a href="index.html">
                                    <img class="logo-img d-inline" src="assets/imgs/logo.svg" alt="">
                                </a>
                            </div>
                            <div class="logo-tablet d-md-inline d-lg-none d-none">
                                <a href="index.html">
                                    <img class="logo-img d-inline" src="assets/imgs/logo.svg" alt="">
                                </a>
                            </div>
                            <div class="logo-mobile d-block d-md-none">
                                <a href="index.html">
                                    <img class="logo-img d-inline" src="assets/imgs/favicon.svg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 main-header-navigation">
                            <!-- Main-menu -->
                            <div class="main-nav text-left float-lg-left float-md-right">
                                <nav>
                                    <ul class="main-menu d-none d-lg-inline">
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('home.index') }}"><span class="mr-15">
                                                    <ion-icon name="home-outline"></ion-icon>
                                                </span>{{ trans('message.home') }}</a>
                                        </li>
                                        <li class="mega-menu-item">
                                            <a href="#">
                                                <span class="mr-15">
                                                    <ion-icon name="desktop-outline"></ion-icon>
                                                </span>{{ trans('message.category') }}
                                            </a>
                                            <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                                @foreach ($category as $item)
                                                    <ul class="col-md-2">
                                                        <li><strong>{{ $item->name }}</strong></li>
                                                        @foreach ($item->children as $child)
                                                            <li><a href="category.html">{{ $child->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </li>
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ trans('message.login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ route('register') }}">{{ trans('message.register') }}</a>
                                                </li>
                                            @endif
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }}
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-light"
                                                                type="submit">{{ trans('message.logout') }}</button>
                                                        </form>
                                                    </div>
                                                </li>
                                        @endguest
                                    </ul>
                                   {{-- Notification --}}
                                    </div>
                                </nav>
                                <!-- Search -->
                            <form action="{{ route('search') }}" method="get"
                            class="search-form d-lg-inline float-right position-relative mr-30 d-none">
                            <input type="text" class="search_field" placeholder="Search" value="" name="search">
                            <button class="search-icon" type="submit"><i class="ti-search mr-5"></i></button>
                        </form>
                        <!-- Off canvas -->
                        <div class="off-canvas-toggle-cover">
                            <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
                                <ion-icon name="grid-outline"></ion-icon>
                            </div>
                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="archive-header text-center mb-50">
                <div class="container">
                    <h2>
                    <span class="text-success">{{ trans('message.search_result_for') }} "{{ $search }}"</span>
                    </h2>
                    <div class="breadcrumb">
                        <span class="no-arrow">{{ trans('message.we_found') }} {{ $posts->count() }} {{ trans('message.articles_for_you') }}</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                        <!-- Widget Weather -->
                        <!-- Widget Categories -->
                        <div class="sidebar-widget widget_categories_2 border-radius-10 bg-white mb-30">
                            @foreach ($category as $item)
                                <ul class="font-small text-muted">
                                    <li class="cat-item cat-item-2 active"><a href="{{ route('filterCategory', [$item->id]) }}">
                                        <span class="mr-10">
                                            <ion-icon name="earth-outline"></ion-icon>
                                        </span>{{ $item->name }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <!-- Widget Categories -->
                        <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                            <div class="widget-header position-relative mb-15">
                                <h5 class="widget-title"><strong>{{ trans('message.category') }}</strong></h5>
                            </div>
                            @foreach ($category as $item)
                                <ul class="font-small text-muted">
                                   @foreach ($item->children as $child)
                                        <li class="cat-item cat-item-2"><a href="#">{{ $child->name }}</a></li>
                                   @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row mb-50">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="loop-list-style-1">
                                        @foreach ($posts as $post)
                                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                                <div class="d-md-flex d-block">
                                                    <div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img class="border-radius-15" src="{{ asset(config('image_user.image') .'/'. $post->image) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="category.html"><span class="post-in text-danger font-x-small">{{ $post->category->name }}</span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                            <span class="post-format-icon">
                                                                <ion-icon name="videocam-outline"></ion-icon>
                                                            </span>
                                                            <a href="{{ route('posts.show', [$post->id]) }}">{{ $post->title }}</a></h5>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">{{ $post->author->name }}</a></span>
                                                            <span class="post-on">{{ date('M d ,Y', strtotime($post->created_at)) }} {{ trans('message.at') }} {{ date('g:ia', strtotime($post->created_at)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- Paginate --}}
                            </div>
                            <div class="sidebar-widget">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">
                                        {{ trans('message.top') }}<span>{{ trans('message.trending') }}</span></h5>
                                </div>
                                <div class="post-aside-style-2">
                                    <ul class="list-post">
                                        <li class="mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">{{ trans('message.title') }}</a></h6>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">{{ trans('message.by') }}<a
                                                                href="author.html">{{ trans('message.author') }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">{{ trans('message.title') }}</a></h6>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">{{ trans('message.by') }}<a
                                                                href="author.html">{{ trans('message.author') }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row"><a
                                                            href="single.html">{{ trans('message.title') }}</a></h6>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">{{ trans('message.by') }}<a
                                                                href="author.html">{{ trans('message.author') }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer Start-->
        <footer>

            <!-- footer-bottom aera -->
            <div class="footer-bottom-area bg-white text-muted">
                <div class="container">
                    <div class="footer-border pt-20 pb-20">
                        <div class="row d-flex mb-15">
                            <div class="col-12">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-12">
                                <div class="footer-copy-right">
                                    <p class="font-small text-muted">© 2020, NewsViral | All rights reserved | Design by <a href="https://alithemes.com/" target="_blank">AliThemes</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </footer>
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
     <!-- Vendor JS-->
     <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.slicknav.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/wow.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/animated.headline.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.ticker.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.vticker-min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.scrollUp.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.sticky.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/perfect-scrollbar.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.counterup.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.theia.sticky.js') }}"></script>
     <script src="{{ asset('../../../unpkg.com/ionicons%405.0.0/dist/ionicons.js') }}"></script>
     <!-- UltraNews JS -->
     <script src="{{ asset('assets/js/main2.js') }}"></script>
</body>


<!-- Mirrored from demos.alithemes.com/html/newsviral/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Oct 2020 07:34:57 GMT -->
</html>
