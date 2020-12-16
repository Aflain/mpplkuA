<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> SIMARSIP - @yield('page-name')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('light/assets/images/favicon.ico')}}">
        <!-- CSS -->
        @include('includes.user-light.light-activation-css')
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.components.user-left-sidebar')

            <div class="content-page">
                 <!-- Topbar Start -->
                 <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                       <!-- Account dropdown -->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset(Auth::user()->foto_profil)}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                {{Auth::user()->nama}}<i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a href="{{route('user-logout')}}" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>  <span>Keluar</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- Breadcrumb left -->
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title-main">@yield('page-name')</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">SIMARSIP</a></li>
                                <li class="breadcrumb-item active">@yield('page-name')</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                <!-- Content Start Here -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- JS -->
        @include('includes.user-light.light-activation-js')
    </body>
</html>