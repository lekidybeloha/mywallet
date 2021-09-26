<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>My Wallet</title>
    <!-- loader-->
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- animate CSS-->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{ asset('css/sidebar-menu.css') }}" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{ asset('css/app-style.css') }}" rel="stylesheet"/>

</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
<div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/logo.png') }}" class="logo-icon" alt="logo icon">
                <h5 class="logo-text">My Wallet</h5>
            </a>
        </div>
        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">Main</li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

        </ul>

    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link toggle-menu" href="javascript:void();">
                        <i class="icon-menu menu-icon"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center right-nav-link">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item user-details">
                            <a href="javaScript:void();">
                                <div class="media">
                                    <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                    <div class="media-body">
                                        <h6 class="mt-2 user-title">{{ Auth::User()->name }}</h6>
                                        <p class="user-subtitle">{{ Auth::User()->email }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><i class="icon-power mr-2"></i> Se deconnecter</li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->
            @yield('content')
            <!--End Dashboard Content-->

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                Copyright © {{ date('Y') }} <a href="#">Lekidybeloha</a> - Design by Dashtreme Admin
            </div>
        </div>
    </footer>
    <!--End footer-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/app.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('js/sidebar-menu.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('js/app-script.js') }}"></script>

@yield('scripts')

</body>
</html>