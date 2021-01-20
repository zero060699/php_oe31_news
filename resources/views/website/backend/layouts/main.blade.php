<!DOCTYPE html>
<html lang="en">

@include('website.backend.layouts.head')

<body class="nav-md">
    @include('sweetalert::alert')
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i>
                            <span>{{ trans('message.admin') }}</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <!-- sidebar menu -->
                    @include('website.backend.layouts.sidebar')
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" >
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ trans('message.login')}}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ trans('message.register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset(config('image_user.image') . '/' . Auth::user()->image) }}" alt=""
                                            class="avatar_user">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="logout_btn">{{ trans('message.logout') }}</button>
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            </li>
                            <li class="nav-item dropdown language-menu">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ trans('message.language') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right language-li" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('change-languages', ['language' => 'en']) }}" class="btn btn-primary">{{ trans('message.en') }}</a>
                                    <br>
                                    <a href="{{ route('change-languages', ['language' => 'vi']) }}" class="btn btn-primary">{{ trans('message.vi') }}</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
    @include('website.backend.layouts.foot')
</body>

</html>
